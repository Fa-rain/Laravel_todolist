<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use App\Models\Category;
use App\Models\Label;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->keyword;

        $data_category = Category::get();
        $data_todolist = ToDoList::all();
        return view('todolist.show', compact('data_category', 'data_todolist'));
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

        // ToDoList::create([
        //     'title' => $request->title,
        //     'id_category' => $request->id_category,
        //     'dateline' => $request->dateline,
        //     'description' => $request->description
        // ]);

        $todolist = new ToDoList();
        $todolist->title = $request->title;
        $todolist->id_category = $request->id_category;
        $todolist->dateline = $request->dateline;
        $todolist->description = $request->description;

        if($todolist->save()){
            return redirect('/todolist')->with('message', 'To Do List added Successfully');
        }

        return redirect('/todolist/create')->with('message', 'Failed to add To Do List');

        // return redirect('/todolist')->with('message', 'Success');
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
        $data_todolist = ToDoList::findOrFail($id);
        $category = Category::get();

        return view('todolist.edit', [
            'data_todolist' => $data_todolist,
            'data_category' => $category
        ]);
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

        ToDoList::where('id_todolist', $id)->update([
            'title' => $request->title,
            'id_category' => $request->id_category,
            'dateline' => $request->dateline,
            'description' => $request->description
        ]);

        return redirect('/todolist')->with('message', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        ToDoList::findOrFail($id)->delete();

        return redirect('/todolist')->with('pesan', 'Deleted successfully');
    }
}
