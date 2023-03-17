@props(['category'])

<!doctype html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel From Scratch Blog</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/cbfcb73618.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/application.css') }}">
    </head>
        


    <body class="bg-gray-100 font-medium" style="font-family: 'Montserrat', sans-serif">
        <header>
            <nav class="flex flex-row justify-center mx-auto pt-4 width">
                <div class="nav-item">
                    <a href="/" class="flex flex-col justify-center text-center text-midnight h-16 py-2 nav-link">
                        <div class="uppercase p-2">
                            Home
                        </div>
                    </a>
                </div>
                <div class="nav-item w-full"></div>
                @foreach(App\Models\Category::all() as $cat)
                    <div class="nav-item text-center text-midnight {{$cat->id == $category->id ? 'active' : ''}}">
                    
                        <a href="/category/{{ $cat->slug }}" class="flex flex-col justify-center w-32 h-16 py-2 nav-link">
        
                            <div class="p-2 uppercase">
                                {{ ucwords($cat->name) }}
                            </div>
                        </a>
                        @if ($cat->id == $category->id)
                            <div class="dropdown px-3 bg-gray-100" style="width: 130px;">
                        @else
                            <div class="dropdown px-3 w-full bg-gray-100">
                        @endif

                            @foreach($cat->subCategories as $sub)
                                <p class="py-2 hover:underline text-sm">
                                    <a href="/category/{{$cat->slug}}?sub-cat={{$sub->slug}}" >
                                        {{ ucwords($sub->name) }}
                                    </a>
                                </p>
                            @endforeach

                        </div>
                    </div>
                @endforeach
            </nav>
        </header>
        
        <section class="mt-6">
            <div class="width">
                {{ $slot }}
            </div>
        </section>

        <footer class="width">
            <div class="footer-container mt-8 py-4">
                <p class="text-center">this is the footer content</p>
            </div>
        </footer>

        <script
            src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
            crossorigin="anonymous">
        </script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script> 
        <script src="{{ asset('js/application.js') }}"></script> 
        
        
    </body>
</html>
