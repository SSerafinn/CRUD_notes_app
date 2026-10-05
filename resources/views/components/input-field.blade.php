@props(['label', 'name', 'value' => '', 'type' => 'text'])
 
<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium mb-1">{{ $label }}</label>
 
    @if ($type === 'textarea')
        <textarea id="{{ $name }}" name="{{ $name }}" rows="5"
            {{ $attributes->merge(['class' => 'w-full border border-gray-300 rounded-lg p-2']) }}>{{ old($name, $value) }}</textarea>
    @else
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}"
            {{ $attributes->merge(['class' => 'w-full border border-gray-300 rounded-lg p-2']) }}>
    @endif
 
    @error($name)
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>
 