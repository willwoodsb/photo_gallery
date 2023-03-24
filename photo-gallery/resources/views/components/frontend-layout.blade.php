@props(['category', 'categories'])


<header class="bg-gray-100">
    <x-header-bar />
    <nav class="flex flex-row justify-center mx-auto pt-4 width lg-menu">
        @foreach($categories as $cat)
            <div class="nav-item text-center text-midnight px-1 
            {{isset($category->id) ? ($cat->id == $category->id ? 'active' : '') : ''}}">
            
                <a href="/category/{{ $cat->slug }}" class="flex flex-col justify-center h-16 py-2 nav-link" style="width: full;">

                    <div class="p-2 uppercase text-sm">
                        {{ ucwords($cat->name) }}
                    </div>
                </a>
                
                <div class="dropdown px-3 w-full bg-gray-100">
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



        
