@props(['category'])

<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/application.css') }}">


<body class="bg-gray-100 font-thin">
    <header>
        <nav class="flex flex-row justify-center mx-auto bg-black pt-4">
            <div class="nav-item w-full"></div>
            <div class="nav-item">
                <a href="/" class="flex flex-col justify-center w-32 text-center text-white h-16 py-2 nav-link">
                    <div class="uppercase p-2">
                        Home
                    </div>
                    <div class="dropdown">

                    </div>
                </a>
            </div>
            
            @foreach(App\Models\Category::all() as $cat)
                @if ($cat->id == $category->id)
                    <div class="nav-item active text-center text-white">
                @else 
                    <div class="nav-item text-center text-white">
                @endif
                    <a href="/category/{{ $cat->slug }}" class="flex flex-col justify-center w-32 h-16 py-2 nav-link">
    
                        <div class="p-2 uppercase">
                            {{ ucwords($cat->name) }}
                        </div>
                    </a>
                    @if ($cat->id == $category->id)
                    <div class="dropdown px-3 bg-black" style="width: 130px;">
                    @else
                    <div class="dropdown px-3 w-full bg-black">
                    @endif
                        <div>
                            @foreach($cat->subCategories as $sub)
                                <p class="py-2 hover:underline text-sm">
                                    <a href="/category/{{$cat->slug}}?sub-cat={{$sub->slug}}" >
                                        {{ ucwords($sub->name) }}
                                    </a>
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="nav-item w-full"></div>
        </nav>
    </header>
    
    <section class="mt-6">
        <div class="width mx-auto">
            {{ $slot }}
        </div>
    </section>

    

        
</body>