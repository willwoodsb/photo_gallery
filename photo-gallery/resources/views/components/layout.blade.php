@props(['category'])

<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/application.css') }}">


<body class="bg-black">
    <header>
        <nav class="flex flex-row justify-center mx-auto bg-black mt-4">
            <div class="nav-item">
                <a href="/" class="flex flex-col justify-center w-32 font-semibold text-sm text-center text-white hover:bg-gray-100 hover:text-black h-16 py-2">
                    <div class="uppercase p-2">
                        Home
                    </div>
                    <div class="dropdown">

                    </div>
                </a>
            </div>
            
            @foreach(App\Models\Category::all() as $cat)
                @if ($cat->id == $category->id)
                    <div class="nav-item active font-semibold text-sm text-center hover:bg-gray-100 text-white hover:text-black">
                @else 
                    <div class="nav-item font-semibold text-sm text-center hover:bg-gray-100 text-white hover:text-black">
                @endif
                    <a href="/category/{{ $cat->slug }}" class="flex flex-col justify-center w-32 h-16 py-2">
    
                        <div class="p-2 uppercase">
                            {{ $cat->name }}
                        </div>
                    </a>
                    <div class="dropdown px-3 w-full bg-gray-100">
                        <div>
                            @foreach($cat->subCategories as $sub)
                                <p class="py-2 font-semibold hover:underline">
                                    <a href="/categories/{{$cat->slug}}/{{$sub->slug}}" >
                                        {{ ucwords($sub->name) }}
                                    </a>
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </nav>
    </header>
    
    <section class="mt-12">
        <div class="width mx-auto">
            {{ $slot }}
        </div>
    </section>

    

        
</body>