<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index() {
        $notes = Nota::with('user')->get();
        return view('notes.index', compact('notes'));
    }

    public function create() {
        return view('notes.create');
    }

    public function store(Request $request) {
              $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Nota::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    public function show($id) {
        $note = Nota::findOrFail($id);
        return view('notes.show', compact('note'));
    }

    public function edit($id) {
        $note = Nota::findOrFail($id);
        return view('notes.edit', compact('note')); 
    }

    public function update(Request $request, $id) {
         $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note = Nota::findOrFail($id);
        $note->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

     public function destroy($id) {
        $note = Nota::findOrFail($id);
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }
}
