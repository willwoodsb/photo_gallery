<x-base-layout title="Add Sub Category | Admin">
    <x-admin.layout title="Add Sub Category">
        <x-layout-card class="w-full">
            <form class="flex flex-col" 
                action="/admin/subcategories/add" 
                method="POST" 
                id="submit"
            >
                @csrf
                <x-form.input name="name"/>

                <label class="uppercase font-semibold text-xs mb-3"
                    for="category_id">Category</label>
                <select id="category_id" class="mb-3 border px-3 py-2 text-sm" name="category_id" required>
                    @foreach ($categories as $cat)
                        <option 
                            value="{{$cat->id}}"
                        >{{$cat->name}}
                        </option>
                    @endforeach
                </select>

                <div>
                    <x-form.button>Submit</x-form.button>
                </div>
                
            </form>
        </x-layout-card>
    </x-admin.layout>
    
    
</x-base-layout>