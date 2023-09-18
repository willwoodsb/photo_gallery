@props(['posts'])

<ul class="masonry-grid image-grid grid grid-cols-1 md:grid-cols-3">
    @if (isset($posts[0]))
        <li class="grid-sizer"></li>
        @foreach($posts as $post)
            <li class="masonry-grid-item image-grid-item col-span-1" id="masonry-grid-item-{{$loop->index}}">
                <img data-src="{{'/photos/'.$post->photo}}" src="/img/placeholder.png" alt="{{$post->title}}" class="lazyload" id="{{$loop->index}}"/>

                <div class="title-overlay">
                    <i class="fa-solid fa-plus top-right"></i>
                    <div class="title-overlay__inner">  
                        <p class="text-gray-200 text-sm text-center">{{ucwords($post->title)}}</p>
                    </div>
                    
                </div>
            </li>
            
        @endforeach
</ul>

    <div id="slide-overlay">
        <div class="slides">
            @foreach ($posts as $post)
                <div id="img-{{$loop->index}}" class="flex flex-col justify-center slide-container">
                    <img src="{{'/photos/'.$post->photo}}" alt="{{$post->title}}"/>
                    <p class="title-text text-center text-white pt-4 font-thin">{{ucwords($post->title)}}</p>
                </div>
            @endforeach
        </div>
        <i class="fa-solid fa-x absolute right-0 p-8 text-2xl text-white cursor-pointer" id="X"></i>
        @unless ($posts->count() < 2)
        <div class="arrow">
            <i class="fa-solid fa-chevron-left arrow-left"></i>
            <i class="fa-solid fa-chevron-right arrow-right"></i>
        </div>
        @endunless
        </div>
@else
</div>
<div class="flex flex-row justify-center" style="margin-top: 30vh">No photos to display</div>
@endif

