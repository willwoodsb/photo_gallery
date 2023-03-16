
<x-layout :category="$category">

    <h1 class=" mb-6 text-md">{{ ucwords($category->name) }} > Other thing</h1>
    
    <x-post-grid :posts="$posts"/>

    <div class="mt-6">
        {{$posts->links()}}
    </div>
    
</x-layout>