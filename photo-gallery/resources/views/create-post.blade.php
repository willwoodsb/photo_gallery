<x-layout>
    <x-layout-card class="w-96 mx-auto mt-6">
        <form class="flex flex-col " 
            action="/admin" 
            method="POST" 
            enctype="multipart/form-data"
        >
            @csrf
            <x-form.input name="title"/>
            <x-form.input type="file" name="photo"/>
            <div>
                <x-form.button>Submit</x-form.button>
            </div>
            
        </form>
    </x-layout-card>
    
</x-layout>