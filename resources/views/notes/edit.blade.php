@extends('layout')

@section('title', 'Edit Note')

@section('content')
    <h1>Edit Note</h1>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('notes.update', $note) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title', $note->title) }}">

        <label>Body</label>
        <textarea name="body" rows="5">{{ old('body', $note->body) }}</textarea>

        <button type="submit">Update Note</button>
    </form>

    <p><a href="{{ route('notes.index') }}">Back to notes</a></p>
@endsection
