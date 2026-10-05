<x-layout title="Add a Note">
    <h1 class="text-2xl font-bold mb-4">Add a Note</h1>
 
    <form action="{{ route('notes.store') }}" method="POST"
          class="bg-white border border-gray-200 rounded-lg p-6">
        @csrf
 
        <x-input-field label="Title" name="title" />
        <x-input-field label="Body" name="body" type="textarea" />
 
        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Save Note</button>
    </form>
</x-layout>

 