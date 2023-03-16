
<x-layout :category="$category">
    <x-post-grid :posts="$posts"/>

    <div class="mt-6">
        {{$posts->links()}}
    </div>
    
</x-layout>