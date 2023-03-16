@props(['category'])

<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/application.css') }}">


<body class="bg-gray-100">
    <header>
        <nav class="flex flex-row justify-center mx-auto bg-black">
            <x-nav-item href="/">Home</x-nav-item>
            @foreach(App\Models\Category::all('name', 'slug') as $cat)

                <x-nav-item 
                    href="/category/{{ $cat->slug }}" 
                    :category="$category" 
                >

                    {{ $cat->name }}

                </x-nav-item>
                
            @endforeach
        </nav>
    </header>
    
    <section class="mt-12">
        <div class="width mx-auto">
            {{ $slot }}
        </div>
    </section>

    

        
</body>