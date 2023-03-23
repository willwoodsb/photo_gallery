<x-base-layout title="Edit Sub Category | Admin">
    <x-admin.layout title="Edit Sub Category: {{ucwords($subCategory->name)}}">
        <x-layout-card class="w-full">
            <form class="flex flex-col" 
                action="/admin/subcategories/edit/{{$subCategory->slug}}" 
                method="POST" 
            >
                @csrf
                @method('PATCH')
                <x-form.input name="name" :value="old('name', $subCategory->name)"/>
                
                <label class="uppercase font-semibold text-xs mb-3"
                    for="category_id">Category</label>
                <select id="category_id" class="mb-3 border px-3 py-2 text-sm" name="category_id" required>
                    @foreach ($categories as $cat)
                        <option 
                            value="{{$cat->id}}"
                            {{ old('category_id', $subCategory->category_id) == $cat->id ? 'selected' : ''}}
                        >{{ucwords($cat->name)}}
                        </option>
                    @endforeach
                </select>

                <div>
                    <x-form.button>Update</x-form.button>
                </div>
                
            </form>
        </x-layout-card>
    </x-admin.layout>
</x-base-layout>