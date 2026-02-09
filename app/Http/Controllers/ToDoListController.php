<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use App\Models\Category;
use App\Models\Label;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Auth::user()->todolists();

        $data_category = Category::get();

        if ($request->status) {
            $query->where('status', $request->status);
        }

        // Filter Category
        if ($request->id_category) {
            $query->where('id_category', $request->id_category);
        }

        // Search Title
        if ($request->search) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }

        $data_todolist = $query->latest()->get();
        return view('todolist.show', compact('data_category', 'data_todolist'));
        // dd($query->toSql(), $query->getBindings());
        // dd($request->all());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::get();
        // $label = Label::where();
        return view('todolist.add', [
            'data_category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:4',
            'id_category' => 'required',
            'dateline' => 'required|after:now',
            'description' => 'required'
        ],[
            'title.min' => 'Atleast 4 characters!',
        ]);

        try {
            ToDoList::create([
                'title' => $request->title,
                'id_category' => $request->id_category,
                'id_user' => Auth::id(),
                'dateline' => $request->dateline,
                'description' => $request->description,
            ]);

            return redirect('/todolist')
                ->with('message', 'To Do List added Successfully');

        } catch (\Exception $e) {

            return redirect('/todolist/create')
                ->with('message', 'Failed to add To Do List');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_todolist = Auth::user()
            ->todolists()
            ->where('id_todolist', $id)
            ->firstOrFail();
        $data_category = Category::get();

        return view('todolist.edit',compact('data_todolist','data_category' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|min:4',
            'id_category' => 'required',
            'dateline' => 'required|after:now',
            'description' => 'required'
        ],[
            'title.min' => 'Atleast 4 characters!',
        ]);

        $todolist = Auth::user()
            ->todolists()
            ->where('id_todolist', $id)
            ->firstOrFail();

        $todolist->update([
            'title' => $request->title,
            'id_category' => $request->id_category,
            'dateline' => $request->dateline,
            'description' => $request->description,
        ]);

        return redirect('/todolist')
            ->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        Auth::user()
        ->todolists()
        ->where('id_todolist', $id)
        ->delete();

    return redirect('/todolist')
        ->with('message', 'Deleted Successfully');
    }

    public function status(string $id)
    {
        $todolist = Auth::user()
            ->todolists()
            ->where('id_todolist', $id)
            ->firstOrFail();

        if($todolist->status == 'pending')
        {
            $todolist->update([
                'status' => 'done'
            ]);
        }else
        {
            $todolist->update([
                'status' => 'pending'
            ]);
        }

        return redirect('/todolist')
            ->with('message', 'Updated Successfully');
    }
}
