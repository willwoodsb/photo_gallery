
<x-layout :category="$category">

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
            {{ucwords($posts[0]->subCategory->name)}}
        @else
            All
        @endif
    </h1>
    <x-post-grid :posts="$posts"/>

    <div class="mt-6">
        {{$posts->links()}}
    </div>
    
</x-layout>