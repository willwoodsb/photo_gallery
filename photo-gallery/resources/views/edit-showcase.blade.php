<x-base-layout title="Edit Photo | Admin">
    <x-admin.layout title="Edit Photo: {{ucwords($showcase->title)}}">
        <x-layout-card class="w-full">
            <form class="flex flex-col" 
                action="/admin/showcase/edit/{{$showcase->slug}}" 
                method="POST" 
                enctype="multipart/form-data"
            >
                @csrf
                @method('PATCH')
                <x-form.input name="title" :value="old('title', $showcase->title)"/>
                <x-form.input type="file" name="photo" required=""/>
                <x-form.input name="rotate" required=""/>
                <img src="{{'/showcase/'.$showcase->photo}}" alt="{{$showcase->title}}" class="mb-4"/>

                <div>
                    <x-form.button>Update</x-form.button>
                </div>
                
            </form>
        </x-layout-card>
    </x-admin.layout>
</x-base-layout>