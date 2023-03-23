@props(['posts'])

<div class="grid gap-2 grid-cols-1 sm:grid-cols-6">
    @foreach($posts as $post)
        <div class="image-container<?php
            if ($posts->count() == 3) {
                if ($loop->first) {
                    echo ' sm:col-span-6';
                } else {
                    echo ' sm:col-span-3';
                }
            } else if ($posts->count() == 2 || $posts->count() == 1) {
                echo ' sm:col-span-6';
            } else if ($posts->count() % 3 == 2) {
                if ($loop->first || $loop->index == 1) {
                    echo ' sm:col-span-3';
                } else {
                    echo ' sm:col-span-2';
                }
            } else if ($posts->count() % 3 == 1) {
                if ($loop->first) {
                    echo ' sm:col-span-6';
                } else {
                    echo ' sm:col-span-2';
                }
            } else {
                echo ' sm:col-span-2';
            } ?>">
            <img src="<?php 
            if (str_contains($post->photo, 'https://picsum.photos')) {
                echo $post->photo;
            } else {
                echo asset('photos/'.$post->photo); 
            } ?>" alt="{{$post->title}}" class="" id="{{$loop->index}}"/>

            <div class="title-overlay">
                <i class="fa-solid fa-plus top-right"></i>
                <div class="title-overlay__inner">  
                    <p class="text-gray-200 text-sm text-center">{{ucwords($post->title)}}</p>
                </div>
                
            </div>
        </div>
        
    @endforeach
</div>

<div id="slide-overlay">
    <div class="owl-carousel">
        @foreach ($posts as $post)
            <div id="img-{{$loop->index}}">
                <img src="<?php 
            if (str_contains($post->photo, 'https://picsum.photos')) {
                echo $post->photo;
            } else {
                echo asset('photos/'.$post->photo); 
            } ?>" alt="{{$post->title}}"/>
                <p class="title-text text-center text-white pt-4 font-thin">{{ucwords($post->title)}}</p>
            </div>
            
        @endforeach
    </div>

    @unless ($posts->count() < 2)
    <div class="arrow">
        <i class="fa-solid fa-chevron-left arrow-left"></i>
        <i class="fa-solid fa-chevron-right arrow-right"></i>
    </div>
    @endunless
    
</div>

