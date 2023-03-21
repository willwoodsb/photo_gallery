@props(['category'])

<x-base-layout>
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
                    <div class="nav-item text-center text-midnight px-1 {{$cat->id == $category->id ? 'active' : ''}}">
                    
                        <a href="/category/{{ $cat->slug }}" class="flex flex-col justify-center h-16 py-2 nav-link" style="width: 128px;">
        
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
</x-base-layout>

        
