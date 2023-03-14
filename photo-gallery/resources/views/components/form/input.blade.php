@props(['name', 'type' => 'text'])

<label class="uppercase font-semibold text-xs mb-3"
    for="{{ $name }}">{{ $name }}</label>

<input class="mb-3 border px-3 py-2 text-sm"
    type="{{ $type }}"
    name="photo"
    id="id"
    required
>