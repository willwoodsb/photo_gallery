@props(['href'])

<p class="py-2 hover:underline text-sm">
    <a href="{{$href}}" >
        {{$slot}}
    </a>
</p>