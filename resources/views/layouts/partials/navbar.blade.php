<nav class="fixed w-full bg-white/90 backdrop-blur-sm z-50">
    <div class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <div class="text-3xl font-bold gradient-text">{{config('app.name')}}</div>
            <div class="hidden md:flex space-x-8">
                <x-navbar.link-navbar href="#home">Acceuil</x-navbar.link-navbar>
                <x-navbar.link-navbar href="#about">A propos</x-navbar.link-navbar>
                <x-navbar.link-navbar href="#projects">Projets</x-navbar.link-navbar>
                <x-navbar.link-navbar href="#videos">Videos</x-navbar.link-navbar>
                <x-navbar.link-navbar href="#contact">Contact</x-navbar.link-navbar>
            </div>
            <div class="flex items-center md:ml-8">
                <button id="themeToggle" class="p-2 rounded-full hover:bg-gray-800 transition">
                    <i class="fas fa-moon text-blue-400" id="themeIcon"></i>
                </button>
            </div>
        </div>
    </div>
</nav>
