@props(['title'])


<div class="width">
    <header class="flex flex-row space-between mt-3">
        <a href="/" class="uppercase hover:underline">Home</a>
        <form action="/admin/logout" method="post" class="ml-auto">
            @csrf
            <x-form.button>Logout</x-button>
        </form> 
    </header>
    <h1 class="mt-5 text-xl border-b">{{$title}}</h1>
    <div class="flex flex-col md:flex-row py-6">
        <div class="flex flex-col md:w-64 md:mr-4 border-b md:border-0 mb-6 pb-6">
            <p class="text-lg mb-2">Links</p>
            <x-admin.dashboard-link href="/admin" text="Dashboard" />
            <x-admin.dashboard-link href="/admin/photos/add" text="Add Photos" />
            <x-admin.dashboard-link href="/admin/subcategories" text="Edit Sub-Categories" />
            <x-admin.dashboard-link href="/admin/subcategories/add" text="Add Sub-Category" />
        </div>       
        <div class="form-element w-full md:ml-4">
            
            {{$slot}}

        </div>       
    </div>
    
</div>
