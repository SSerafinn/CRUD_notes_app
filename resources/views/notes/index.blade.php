<x-layout title="My Notes">
    
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">My Notes</h1>
            <p><a href="{{ route('notes.create') }}"
                class="bg-blue-400 text-white px-4 py-2 rounded-lg hover:bg-blue-500">
                + Add a note</a></p>
    </div>

    @forelse ($notes as $note)
        <x-note-card :note=$note />
    @empty
        <p>No notes yet. Add your first one!</p>
    @endforelse 
</x-layout>
