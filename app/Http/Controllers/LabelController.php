<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('labels.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'label_name' => 'required'
        ]);

        $user = Auth::user();

        $user->labels()->create([
            'label_name' => $request->label_name,
        ]);

        return redirect('/profile')
                ->with('message', 'Label added Successfully');
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
         $data_label = Auth::user()
            ->labels()
            ->where('id_label', $id)
            ->firstOrFail();

        return view('labels.edit', compact('data_label'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'label_name' => 'required'
        ]);

        $label = Auth::user()
        ->labels()
        ->where('id_label', $id)
        ->firstOrFail();

        $label->update([
            'label_name' => $request->label_name
        ]);

        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Label::where('id_label', $id)
        ->where('id_user', Auth::id())
        ->delete();

        return redirect('/profile');
    }
}
