<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note; //Importamos el modelo
use Illuminate\Cache\RedisTagSet;
use App\Http\Requests\NoteRequest;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::all();
        return view('index', compact('notes'));
    }

    public function create(){
        return view('note');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteRequest $request)
    {
        Note::create($request->all());
        return redirect()->route('index')->with('success', 'Nota creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
    return view('show', compact('note'));
    }

    public function edit(Note $note){
        return view('edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $note->update($request->all());
        return redirect()->route('index')->with('success', 'Nota actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Note $note)
    {
        $note->delete($request->all());
        return redirect()->route('index')->with('danger', 'Nota eliminada con éxito');
    }
}
