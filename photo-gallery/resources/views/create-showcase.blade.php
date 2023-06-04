<x-base-layout title="Add Showcase Photos | Admin">
    <x-admin.layout title="Add Showcase Photos">
        <x-layout-card class="w-full">
            <form class="flex flex-col" 
                action="/admin/showcase/add" 
                method="POST" 
                enctype="multipart/form-data"
                id="submit"
            >
                @csrf
                <x-form.input type="file" name="photos[]" label="Photos" multiple="multiple"/>

                <div>
                    <x-form.button>Submit</x-form.button>
                </div>
                
            </form>
        </x-layout-card>
    </x-admin.layout>
    
    
</x-base-layout>