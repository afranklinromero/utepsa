<?php

namespace App\Http\Controllers;

use App\Models\Notas;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index()
    {
        $notes = Notas::all();
        return view('notes', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Notas::create($request->all());
        return redirect()->route('notes.index');
    }

    public function show(Notas $note)
    {
        return view('notes.show', compact('note'));
    }

    public function edit(Notas $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Notas $note)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $note->update($request->all());
        return redirect()->route('notes.index');
    }

    public function destroy(Notas $note)
    {
        $note->delete();
        return redirect()->route('notes.index');
    }
}
