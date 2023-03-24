

<x-base-layout title="Home">
    <x-side-menu :categories="$categories" />
    <header class="border-bottom">
        <x-header-bar />
        <nav class="flex flex-row justify-center mx-auto pt-4 width lg-menu">
            @foreach($categories as $cat)
                <div class="nav-item nav-item-home text-center text-midnight px-1 
                {{isset($category->id) ? ($cat->id == $category->id ? 'active' : '') : ''}}">
                
                    <a href="/category/{{ $cat->slug }}" class="flex flex-col justify-center h-16 py-2 nav-link" style="width: full;">

                        <div class="p-2 uppercase text-sm">
                            {{ ucwords($cat->name) }}
                        </div>
                    </a>
                    
                    <div class="dropdown px-3 w-full bg-gray-100">
                        @foreach($cat->subCategories as $sub)
                            <p class="py-2 hover:underline text-sm">
                                <a href="/category/{{$cat->slug}}?sub-cat={{$sub->slug}}" >
                                    {{ ucwords($sub->name) }}
                                </a>
                            </p>
                        @endforeach

                    </div>
                </div>
            @endforeach
        </nav>
    </header>

    <section class="">
        <div class="">
            <div class="featured">
                @foreach ($posts as $post)
                    <div class="featured-item {{$loop->first ? 'featured-item-active': ''}}" id="{{$loop->index}}">
                        <img src="<?php 
                            if (str_contains($post->photo, 'https://picsum.photos')) {
                                echo $post->photo;
                            } else {
                                echo asset('photos/'.$post->photo); 
                            } ?>" alt="{{$post->title}}"
                        />
                        <div class="cat-link flex flex-col">
                            @php
                                $id = $loop->index + 1;
                            @endphp
                            @foreach ($categories as $category)
                                @if ($category->id == $id)
                                    <a href="/category/{{$category->slug}}">{{$category->name}}</a>
                                @endif
                            @endforeach
                            <div class="h-px bg-white my-auto cat-line"></div>
                        </div>
                        
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-base-layout>