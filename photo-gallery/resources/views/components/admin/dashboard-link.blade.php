@props(['href', 'text'])

<a href="{{ $href }}" class="flex flex-row justify-between w-full my-px hover:bg-gray-200 px-2 py-px rounded-xl">
    <p class="">{{$text}}</p>
    <div class=" h-px w-32 md:w-4 my-auto{{ request()->getPathInfo() == $href ? ' bg-black' : ''}}"></div>
</a>


