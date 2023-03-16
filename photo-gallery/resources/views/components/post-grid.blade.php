@props(['posts'])

<div class="sm:grid sm:grid-cols-2 md:grid-cols-3 gap-5">
    @foreach($posts as $post)
        <div class="col-span-1">
            <img src="{{$post->photo}}" alt="{{$post->title}}" class="rounded-sm"/>
            <div class="flex justify-center mt-2">
                <p>{{$post->title}}</p>
            </div>
        </div>
        
    @endforeach
</div>