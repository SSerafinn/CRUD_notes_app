<x-layout title="Edit Note">
    <h1 class="text-2xl font-bold mb-4">Edit Note</h1>
 
    <form action="{{ route('notes.update', $note) }}" method="POST"
        class="bg-white border border-gray-200 rounded-lg p-6">
        @csrf
        @method('PUT')
 
        <x-input-field label="Title" name="title" :value="$note->title" />
        <x-input-field label="Body" name="body" type="textarea" :value="$note->body" />
 
    <button type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Update Note</button>
    </form>
</x-layout>
