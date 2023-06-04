@props(['categories', 'internal' => null])

<div class="side-menu bg-gray-100">
    <div class="flex flex-col px-4 pt-4">
        <div class="flex flex-row justify-end mb-2"><button class="close-menu"><i class="fa-solid fa-xmark text-xl"></i></button></div>
        @foreach ($categories as $cat)
            <div class="flex flex-row justify-between">
                <a href="/category/{{ $cat->slug }}" class="flex flex-col justify-center h-12 nav-link hover:underline">

                    <div class="px-2 uppercase text-sm">
                        {{ ucwords($cat->name) }}
                    </div>
                </a>
                <button class="open" id="open-{{$cat->id}}">
                    <i class="fa-solid fa-chevron-down rotate" id="rotate-{{$cat->id}}"></i>
                </button>
            </div>
            
            <div class="px-3 w-full bg-gray-100 hidden" id="sub-{{$cat->id}}">
                @foreach($cat->subCategories as $sub)
                    <p class="py-2 hover:underline text-sm">
                        <a href="/category/{{$cat->slug}}?sub-cat={{$sub->slug}}" >
                            {{ ucwords($sub->name) }}
                        </a>
                    </p>
                @endforeach

            </div>
        @endforeach
        <div class="flex flex-row justify-between">
            <a href="{{$internal == true ? '' : '/'}}#about-me" class="flex flex-col justify-center h-8 nav-link hover:underline mt-6 scroll">

                <div class="px-2 uppercase text-sm">
                    About Me
                </div>
            </a>
        </div>
        <div class="flex flex-row justify-between">
            <a href="/client-showcase" class="flex flex-col justify-center h-8 nav-link hover:underline">

                <div class="px-2 uppercase text-sm">
                    Showcase & Clients
                </div>
            </a>
        </div>
        <div class="flex flex-row justify-between">
            <a href="{{$internal == true ? '' : '/'}}#contact" class="flex flex-col justify-center h-8 nav-link hover:underline scroll">

                <div class="px-2 uppercase text-sm">
                    Contact
                </div>
            </a>
        </div>
    </div>
    
</div>