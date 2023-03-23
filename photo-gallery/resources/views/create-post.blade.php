<x-base-layout title="Add Photo | Admin">
    <x-admin.layout title="Add Photos">
        <x-layout-card class="w-full">
            <form class="flex flex-col" 
                action="/admin/photos/add" 
                method="POST" 
                enctype="multipart/form-data"
            >
                @csrf
                <x-form.input name="title"/>
                <x-form.input type="file" name="photo"/>

                <label class="uppercase font-semibold text-xs mb-3"
                    for="sub_category_id">Category</label>
                <select id="sub_category_id" class="mb-3 border px-3 py-2 text-sm" name="sub_category_id" required>
                    @foreach ($categories as $cat)
                        <optgroup label="{{$cat->name}}">
                            @foreach ($subCategories as $subCat)
                                @if ($subCat->category_id == $cat->id)
                                    <option value="{{$subCat->id}}">{{$subCat->name}}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>

                <div>
                    <x-form.button>Submit</x-form.button>
                </div>
                
            </form>
        </x-layout-card>
    </x-admin.layout>
    
    
</x-base-layout>