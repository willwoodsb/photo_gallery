<x-base-layout title="Showcase & Clients">
    <x-scroll-top />
    <x-side-menu :categories="$categories" />
    <x-frontend-layout :category="null" :categories="$categories">
        <section id="showcase">
            <h1 class=" mb-6 text-2xl md:text-4xl font-bold text-center my-16 pb-6">Clients and Showcase</h1>
            @if(isset($showcases[0]))
                <div class="owl-carousel image-grid">
                    @foreach($showcases as $showcase)
                    <div class="image-grid-item">
                        <img src="{{'/showcase/'.$showcase->photo}}" alt="{{$showcase->title}}" class="h-96" id="{{$loop->index}}"/>
                        <div class="title-overlay">
                            <i class="fa-solid fa-plus top-right"></i>
                            <div class="title-overlay__inner">  
                                <p class="text-gray-200 text-sm text-center">{{ucwords($showcase->title)}}</p>
                            </div>
                        </div>
                    </div>
                        
                    @endforeach
                </div>
                <div id="slide-overlay">
                <div class="slides">
                    @foreach ($showcases as $showcase)
                        <div id="img-{{$loop->index}}" class="flex flex-col justify-center slide-container">
                            <img src="{{'/showcase/'.$showcase->photo}}" alt="{{$showcase->title}}"/>
                            <p class="title-text text-center text-white pt-4 font-thin">{{ucwords($showcase->title)}}</p>
                        </div>
                    @endforeach
                </div>

                @unless ($showcases->count() < 2)
                <div class="arrow">
                    <i class="fa-solid fa-chevron-left arrow-left"></i>
                    <i class="fa-solid fa-chevron-right arrow-right"></i>
                </div>
                @endunless
            </div>
            @else
            </div>
            <div class="flex flex-row justify-center" style="margin-top: 30vh">No photos to display</div>
@endif
        </section>
        
    </x-frontend-layout>
    <section>
            <div class="diagonal h-12"></div>
            <div class="grid gap-y-10 sm:grid-cols-2 text-center py-14 text-white width" id="clients">
                <ul>
                    <li><h2 class="uppercase mb-2 font-bold text-xl">Industries and Clients</h2></li>
                    <li>K2 Sports (USA & EU)</li>
                    <li>Skis,  Snowboards, MTB</li>
                    <li>f-stop gear (USA / EU)</li>
                    <li>Raichle (CH)</li>
                    <li>Nordica (I)</li>
                    <li>Dynastar (F)</li>
                    <li>Dynamique (F)</li>
                    <li>Rosigonal (F)</li>
                    <li>Kerma Ski Poles (F)</li>
                    <li>Quiksilver (AUS & F)</li>
                    <li>Atomic Skis (A)</li>
                    <li>Scott Poles, Snowboards, MTB (CH)</li>
                    <li>Tom Sims (USA)</li>
                    <li>Jose Fernandes (CH)</li>
                    <li>Domonique Perret (CH)</li>
                    <li>Wild Duck Snowboards</li>
                    <li>Powderhorn (USA)</li>
                    <li>Descent (J)</li>
                    <li>Berghaus (UK)</li>
                    <li>Patagonia (USA)</li>
                    <li>Marmot (EU)</li>
                    <li>The North Face (EU)</li>
                    <li>Scarpa (I)</li>
                    <li>Asolo (I)</li>
                    <li>Swatch (CH)</li>
                    <li>Rolex (CH)</li>
                    <li>Nokica (FL)</li>
                    <li>Siemans (D)</li>
                    <li>Renault (UK)</li>
                    <li>Ford (Hong Kong)</li>
                    <li>Freeride World Tour (CH)</li>
                    <li>Pomoca (CH)</li>
                    <li>Tele Verbier (CH)</li>
                    <li>Red Mountain Rossland (CA)</li>
                    <li>Vuarnet (F)</li>
                    <li>Smith Optics (USA & EU)</li>
                    <li>Mill Pond Press (USA)</li>
                    <li>Simmer Sails (USA)</li>
                    <li>Prana</li>
                    <li>Bogner (D)</li>
                    <li>Duckworth (USA)</li>
                </ul>
                <ul>
                    <li><h2 class="uppercase mb-2 font-bold text-xl">Editorials</h2></li>
                    <li>Cosmopolitain (UK)</li>
                    <li>Powder (USA)</li>
                    <li>Back Country (USA)</li>
                    <li>Ski Journal (USA)</li>
                    <li>Men's Journal (USA)</li>
                    <li>Trans World (USA)</li>
                    <li>New York Times (USA)</li>
                    <li>Snow Country (USA)</li>
                    <li>Sunday Times (UK)</li>
                    <li>Sunday Times Colour Suplement (UK)</li>
                    <li>Daily Mail (UK)</li>
                    <li>Daily Mail Ski Show (UK)</li>
                    <li>Ski & Board (UK)</li>
                    <li>Ski magazine (UK)</li>
                    <li>Ski Club of Great Britain Ski Mag (UK)</li>
                    <li>Fall Line (UK)</li>
                    <li>Paris Match (F)</li>
                    <li>Fluid (F)</li>
                    <li>Snow (F)</li>
                    <li>Bunda (D)</li>
                    <li>Schwitzer Illustrat (CH)</li>
                    <li>la Matin (CH)</li>
                    <li>Verbier Life (CH)</li>
                    <li>Twin Magazine (CH)</li>
                    <li>Nikon News (EU)</li>
                    <li>Surfer Journal (AUS)</li>
                </ul>
            </div>
            
        </section>
</x-base-layout>