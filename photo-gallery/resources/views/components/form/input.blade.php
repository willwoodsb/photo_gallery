@props(['name', 'type' => 'text'])

<div class="mb-4 flex flex-col">
    <label class="uppercase font-semibold text-xs mb-3"
        for="{{ $name }}">{{ $name }}</label>

    <input class="mb-1 border px-3 py-2 text-sm"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes(['value' => old($name)]) }}
    >

    @error($name)
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
