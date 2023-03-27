<x-base-layout title="{{ucwords($category->name)}}">
    <x-side-menu :categories="$categories" />
    <x-frontend-layout :category="$category" :categories="$categories">

        <h1 class=" mb-6 text-md font-medium">
            @if (request('sub-cat'))
            <a href="/category/{{$category->slug}}" class="text-indigo-300 hover:underline">
            @endif
                {{ ucwords($category->name) }}
            @if (request('sub-cat'))
            </a> 
            @endif
            >
            @if (request('sub-cat'))
                {{ucwords(str_replace('-', ' ', request('sub-cat')))}}
            @else
                All
            @endif
        </h1>
        <x-post-grid :posts="$posts"/>

        <div class="mt-6">
            {{$posts->links()}}
        </div>
        
    </x-frontend-layout>
</x-base-layout>
