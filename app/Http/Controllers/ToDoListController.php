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

        $todolist = ToDoList::get();
        return view('todolist.show', [
            'data_todolist' => $todolist
        ]);
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

        ToDoList::create([
            'title' => $request->title,
            'id_category' => $request->id_category,
            'dateline' => $request->dateline,
            'description' => $request->description
        ]);

        return redirect('/todolist')->with('message', 'Success');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
