@props(['posts'])

<div class="sm:grid sm:grid-cols-2 md:grid-cols-3 gap-2">
    @foreach($posts as $post)
        <div class="col-span-1">
            <img src="{{$post->photo}}" alt="{{$post->title}}" class=""/>
            <div class="hidden">
                <p class="text-gray-200 text-sm text-center">{{$post->title}}</p>
            </div>
        </div>
        
    @endforeach
</div>