@extends('layout')

@section('title', 'My Notes')

@section('content')
    <h1>My Notes</h1>
    <p><a href="{{ route('notes.create') }}">+ Add a note</a></p>

    @forelse ($notes as $note)
        <div>
            <h3>{{ $note->title }}</h3>
            <p>{{ $note->body }}</p>

            <a href="{{ route('notes.edit', $note) }}">Edit</a>

            <form action="{{ route('notes.destroy', $note) }}" method="POST"
                  onsubmit="return confirm('Delete this note?')">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @empty
        <p>No notes yet. Add your first one!</p>
    @endforelse
@endsection
