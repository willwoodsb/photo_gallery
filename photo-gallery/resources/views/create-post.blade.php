<x-base-layout>
    <x-layout-card class="w-96 mx-auto mt-6">
        <form class="flex flex-col " 
            action="/admin/photo/add" 
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
                    <optgroup label="{{ucwords($cat->name)}}">
                        @foreach ($subCategories as $subCat)
                            @if ($subCat->category_id == $cat->id)
                                <option value="{{$subCat->id}}">{{ucwords($subCat->name)}}</option>
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
    
</x-base-layout>