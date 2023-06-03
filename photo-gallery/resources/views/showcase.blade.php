<x-base-layout title="showcase">
    <x-scroll-top />
    <x-side-menu :categories="$categories" />
    <x-frontend-layout :category="null" :categories="$categories">
        <section id="showcase">
            <div class="owl-carousel">
                @foreach($showcases as $showcase)
                    <img src="{{'/showcase/'.$showcase->photo}}" alt="{{$showcase->title}}" class="h-96" id="{{$loop->index}}"/>
                @endforeach
            </div>
        </section>
        
    </x-frontend-layout>
</x-base-layout>