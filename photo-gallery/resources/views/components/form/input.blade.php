@props(['name', 'type' => 'text', 'required' => 'required', 'multiple' => '', 'label' => null])

<div class="mb-4 flex flex-col">
    <label class="uppercase font-semibold text-xs mb-3"
        for="{{ $name }}">{{ isset($label) ? $label : $name }}</label>

    <input class="mb-1 border px-3 py-2 text-sm"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes(['value' => old($name)]) }}
        {{$required}}
        {{$multiple}}
    >
    <p class="error text-red-500 text-xs mt-1">Please enter {{$name == 'subject' ? 'a' : 'your'}} {{ isset($label) ? $label : $name }}</p>
    @error($name)
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
