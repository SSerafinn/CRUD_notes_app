@extends('layout')

@section('title', 'Add a Note')

@section('content')
    <h1>Add a Note</h1>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title') }}">

        <label>Body</label>
        <textarea name="body" rows="5">{{ old('body') }}</textarea>

        <button type="submit">Save Note</button>
    </form>

    <p><a href="{{ route('notes.index') }}">Back to notes</a></p>
@endsection
