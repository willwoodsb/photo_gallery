@props(['internal' => null])

<div class="flex flex-row text-lg tracking-widest pt-4 mb-4 lg:mb-0">
    <div class="menu flex flex-row">
        <div class="h-px w-0 bg-black my-auto logo-line"></div>
        <a href="/"><img src="/img/marko_shapiro_logo.png" class="w-28" alt="Marko Shapiro Logo"></a>
    </div>
    <p class="my-auto ml-auto hidden lg:flex lg:flex-row ">
        <a href="{{$internal == true ? '' : '/'}}#about-me" class="hover:underline scroll">AboutMe</a> /
        <a href="/client-showcase" class="hover:underline scroll">Showcase&Clients</a> /
        <a href="{{$internal == true ? '' : '/'}}#contact" class="hover:underline scroll">Contact</a>
    </p>
    <button class="lg:hidden uppercase ml-auto flex flex-row my-auto menu open-menu">
        <p>Menu</p>
        <div class="h-px w-4 bg-black my-auto ml-2 menu-line"></div>
    </button>
</div>