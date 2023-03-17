@props(['posts'])

<div class="grid gap-2 grid-cols-6">
    @foreach($posts as $post)
        <div class="<?php
            if ($posts->count() == 3) {
                if ($loop->first) {
                    echo 'col-span-6';
                } else {
                    echo 'col-span-3';
                }
            } else if ($posts->count() == 2 || $posts->count() == 1) {
                echo 'col-span-3';
            } else if ($posts->count() % 3 == 2) {
                if ($loop->first || $loop->index == 1) {
                    echo 'col-span-3';
                } else {
                    echo 'col-span-2';
                }
            } else if ($posts->count() % 3 == 1) {
                if ($loop->first) {
                    echo 'col-span-6';
                } else {
                    echo 'col-span-2';
                }
            } else {
                echo 'col-span-2';
            } ?>">
            <img src="{{$post->photo}}" alt="{{$post->title}}" class=""/>
            <div class="hidden">
                <p class="text-gray-200 text-sm text-center">{{$post->title}}</p>
            </div>
        </div>
        
    @endforeach
</div>

