@props(['note'])
<div class="bg-white border border-gray-200 rounded-lg p-4 mb-3">
    <h3 class="font-semibold text-lg">{{ $note->title }}</h3>
    <p class="text-gray-600 mt-1">{{ $note->body }}</p>
    <div class="flex items-center gap-3 mt-3">
        <a href="{{ route('notes.edit', $note) }}" class="text-sm text-blue-600">Edit</a>
        <form action="{{ route('notes.destroy', $note) }}" method="POST"
            onsubmit="return confirm('Delete this note?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-sm text-red-600">Delete</button>
        </form>
    </div>
</div>          