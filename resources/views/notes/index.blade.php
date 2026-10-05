<x-layout title="My Notes">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">All Notes</h1>
        <a href="{{ route('notes.create') }}"
        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">+ Add Note</a>
    </div>
 
    @forelse ($notes as $note)
        <x-note-card :note="$note" />
    @empty
        <p class="text-gray-500">No notes yet. Add your first one!</p>
    @endforelse
</x-layout>
