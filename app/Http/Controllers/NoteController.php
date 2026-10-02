<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // READ — show all notes
    public function index()
    {
        $notes = Note::latest()->get();

        return view('notes.index', ['notes' => $notes]);
    }

    // CREATE — show the form
    public function create()
    {
        return view('notes.create');
    }

    // CREATE — validate and save
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'body'  => 'required',
            
        ]);

        Note::create($validated);

        return redirect()->route('notes.index')->with('success', 'Note added.');
    }

    // UPDATE — show the form, pre-filled
    public function edit(Note $note)
    {
        return view('notes.edit', ['note' => $note]);
    }

    // UPDATE — validate and save changes
    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'body'  => 'required',
        ]);

        $note->update($validated);

        return redirect()->route('notes.index')->with('success', 'Note updated.');
    }

    // DELETE — remove the note
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted.');
    }
}
