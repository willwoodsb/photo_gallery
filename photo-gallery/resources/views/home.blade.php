

<x-base-layout title="Home">
    <x-scroll-top />
    <x-side-menu :categories="$categories" />
    <header class="border-bottom">
        <div class="width">
            <x-header-bar internal="true" />
        </div>
        
        <nav class="flex flex-row justify-center mx-auto pt-4 width lg-menu">
            @foreach($categories as $cat)
                <div class="nav-item nav-item-home text-center text-midnight px-1">
                
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

    <section class="">
        <div class="">
            <div class="featured bg-black">
                @foreach ($posts as $post)
                    @php
                        $featured_cat = $post->category;
                    @endphp
                    <div class="featured-item" id="{{$featured_cat->id - 1}}">
                        <img src="{{ asset('photos/'.$post->photo) }}" alt="{{$post->title}}"/>
                        <div class="overlay"></div>
                        <div class="cat-link flex flex-col">
                            <a class="uppercase font-bold" href="/category/{{$featured_cat->slug}}"><h1>{{$featured_cat->name}}</h1></a>

                            <div class="h-px bg-white my-auto cat-line"></div>
                        </div>
                        
                    </div>
                @endforeach
                <a href="#about-me" class="arrow-container scroll">
                    <div class="chevron"></div>
                    <div class="chevron"></div>
                    <div class="chevron"></div>
                </a>
            </div>
        </div>
    </section>
    <section class="scroll-content width" id="about-me">
        <div class="scroll-content__inner">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="col-span-1">
                    <img src="{{ asset('img/marko_shapiro_portrait.webp') }}" alt="Marko Shapiro Portrait"/>
                </div>
                <div class="col-span-1 row-span-2">
                    <div class="flex flex-row justify-between">
                        <h2 class="uppercase mb-2 font-bold text-xl">About Me</h2>
                        <div id="color-theme" class="flex flex-row">
                            <p class="mr-2 uppercase text-sm">Eng</p>
                            <label class="switch">
                                <input id="checkbox" type="checkbox">
                                <span class="slider round"></span>
                            </label>
                            <p class="ml-2 uppercase text-sm">Fra</p>
                        </div>
                    </div>
                    <div class="english">
                        <p>Passionate for photography with his mother's Roliflex in the 50's. Acquired his first SLR reflex camera and darkroom during his studies in Toronto in the mid 60's. Mark learned the skills of processing black and white film and a wealth of knowledge of the art of printing pictures.</p>
                        <p>He came to Europe where one thing led to another, ending up in Verbier in the winter of 1970/71. In 1974 Pascel Burri owner of the Fer a Cheval asked him to take some ski pictures for Authier Ski and his career began from there.</p>
                        <p>Proclaimed “The God Father of Ski Photography” by Powder Magazine USA, “Master of Light” by Sno Magazine France, a world class photographer by Bunde Magazine Germany. Awarded a medal from the Ski Club of Great Britain for his contribution to the snow sports industry and media. Interviews by the BBC documentary “Year of the Mountains”, also by many other magazines, colour supliments, news papers, and film productions throughout the world. The list of accomplishments goes on and on.</p>
                        <p>It has been said by peers of his generation to today’s generation, friends, people in the trade, and written about by journalists, magazine editors in the know that he was a pioneer from the early 70’s creating the standards for modern ski photography as it is today.</p>
                        <p>His 40 year Archive of pictures includes 4 Seasons of mountain active sports, landscapes, Marko still life, and odds & sodds of different subjects that have passed by his lens.</p>
                    </div>
                    <div class="french hidden">
                        <p>Passionné de photographie, Mark utilisait déjà le Rolleiflex de sa mère dans les années 50. Il s’est procuré son premier appareil photo reflex SRL et sa première chambre noire pendant ses études à Toronto dans les années 60. Mark a appris à traiter les pellicules noir et blanc et a acquis de grandes connaissances dans l’art de développer des photos.</p>
                        <p>Il est venu en Europe et une chose en entraînant une autre il s’est retrouvé à Verbier pour l’hiver 1970/1971. En 1974, Pacal Burri, propriétaire du Fer à Cheval, lui a demandé de prendre quelques photos de ski pour Authier Ski. C’est alors que sa carrière a commencé.</p>
                        <p>Il a été proclamé “Le parrain de la photographie de ski” par le magazine Powder USA, “Maître dans l’art de la lumière” par Sno Magazine France, un photographe de classe mondiale par le magazine Bunte Allemagne. Il a également reçu une médaille du Ski Club de Grande-Bretagne pour sa contribution à l’industrie et aux médias des sports de neige. Il a été interviewé dans le documentaire de la BBC “Year of the Mountains”, ainsi que par de nombreux magazines, journaux et productions de film dans le monde entier. Et la liste continue.</p>
                        <p>Ses pairs, de sa génération et d’aujourd’hui, ses amis, les professionnels du métier, les journalistes, les rédacteurs en chef de magazines le décrivent comme un pionnier dans la création et l’évolution de la photographie de ski telle que nous la connaissons aujourd’hui.</p>
                        <p>Ses archives photos retracent 40 ans de carrière et comprennent 4 saisons de sports de montagne, des paysages, des macrophotographies de nature morte et divers objets qui ont passé par son objectif.</p>
                    </div>
                </div>
                <div class="col-span-1">
                    <video poster="{{ asset('img/video_placeholder.png') }}" controls>
                        <source src="{{ asset('video/Marko-Shapiro-Verbier-TV_interview-in-French.mp4') }}" type="video/mp4">
                        Your browser does not support the video feature
                    </video>
                </div>
            </div>
        </div>
        
    </section>
    <section class="width" id="showcase">
        
    </section>
    <section class="width" id="contact">
        <h2>Contact</h2>
    </section>

</x-base-layout>