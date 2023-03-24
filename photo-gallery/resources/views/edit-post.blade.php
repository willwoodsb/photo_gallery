<x-base-layout title="Edit Post | Admin">
    <x-admin.layout title="Edit Post: {{ucwords($post->title)}}">
        <x-layout-card class="w-full">
            <form class="flex flex-col" 
                action="/admin/photos/edit/{{$post->slug}}" 
                method="POST" 
                enctype="multipart/form-data"
            >
                @csrf
                @method('PATCH')
                <x-form.input name="title" :value="old('title', $post->title)"/>
                <x-form.input type="file" name="Replace Photo" required=""/>
                <img class="mb-4" src="<?php 
                    if (str_contains($post->photo, 'https://picsum.photos')) {
                        echo $post->photo;
                    } else {
                        echo asset('photos/'.$post->photo); 
                    } ?>" alt="{{$post->title}}"/>

                <label class="uppercase font-semibold text-xs mb-3"
                    for="sub_category_id">Category</label>
                <select 
                    id="sub_category_id" 
                    class="mb-3 border px-3 py-2 text-sm" 
                    name="sub_category_id"
                    required
                >
                    @foreach ($categories as $cat)
                        <optgroup label="{{ucwords($cat->name)}}">
                            @foreach ($subCategories as $subCat)
                                @if ($subCat->category_id == $cat->id)
                                    <option 
                                        value="{{$subCat->id}}"
                                        {{ old('sub_category_id', $post->sub_category_id) == $subCat->id ? 'selected' : ''}}
                                    >{{ucwords($subCat->name)}}
                                    </option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>

                <div>
                    <x-form.button>Update</x-form.button>
                </div>
                
            </form>
        </x-layout-card>
    </x-admin.layout>
</x-base-layout>