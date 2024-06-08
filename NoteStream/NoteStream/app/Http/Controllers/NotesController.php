<?php

namespace App\Http\Controllers;

use App\Models\Notas;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index()
    {
        $notes = Notas::where('IDUsuario', auth()->id())->get();
        return view('notes', compact('notes'));
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $note = Notas::create([
            'Titulo' => $request->title,
            'Contenido' => $request->body,
            'IDUsuario' => auth()->id(),
        ]);

        return response()->json($note);
    }



    public function show($id)
    {
        try {
        $note = Notas::findOrFail($id);
        return response()->json($note);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }


    public function update(Request $request, Notas $note)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

       /*  $note = Notas::findOrFail($id); */
        $note->update([
            'Titulo' => $request->title,
            'Contenido' => $request->body,
        ]);

        return response()->json($note);
    }

    public function destroy($id)
    {
        $note = Notas::findOrFail($id);
        $note->delete();

        return response()->json(['success' => true]);
    }
}
