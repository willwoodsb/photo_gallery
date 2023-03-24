@props(['href'])

<a href="{{$href}}" class="flex flex-col justify-center text-center text-midnight h-16 py-2 nav-link" style="width: 115px;">
    <div class="uppercase p-2 text-sm">
        {{$slot}}
    </div>
</a>