@props(['href', 'category'])

@dd($category)
<a href="{{ $href }}" class="flex flex-col justify-center w-32 uppercase font-semibold text-sm text-center text-white hover:bg-gray-100 hover:text-black h-16 py-2 nav-item">
    <div class="">
        {{ $slot }}
    </div>
    <div class="dropdown">
        
    </div>
</a>

