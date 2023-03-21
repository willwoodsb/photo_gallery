<x-base-layout>
    <div class="h-screen flex flex-col justify-center">
        <x-layout-card class="w-96 mx-auto">
            <h1 class="font-bold text-lg mb-3 text-center uppercase">Login</h1>
            <form class="flex flex-col " 
                action="/admin/login" 
                method="POST" 
            >
                @csrf
                <x-form.input name="name"/>
                <x-form.input name="password" type="password" />

                <div>
                    <x-form.button>Submit</x-form.button>
                </div>
                
            </form>
        </x-layout-card>
    </div>
    
</x-base-layout>