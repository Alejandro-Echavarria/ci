@php
    $decorador = '<div class="absolute w-6 m-auto inset-x-0 bottom-0 top-7"><div class="border-b-4 border-color-secundario rounded-md"></div></div>';
    $decoradorVertical = '<div class="absolute inset-y-0 top-3"><div class="h-6 border-l-4 border-color-secundario rounded-md"></div></div>';
@endphp

<nav class="backdrop-blur-md bg-white/80 dark:bg-black/80 navSticky z-50 sticky top-0 shadow-sm" x-data="{ open: false }">
    <div class="max-w-full mx-auto px-6 sm:px-6 lg:px-6 xl:px-8 2xl:px-16">
        <div class="flex items-center h-16">
            {{-- logotipo --}}
            <a href="/" class="flex-shrink-0">
                <div class="flex items-center">
                    <div class="items-center">
                        <p class="font-extrabold text-gray-700 dark:text-gray-200"><span class="h-12 w-12">MAET</span> - CI</p>
                    </div>
                </div>
            </a>
            <div class="flex justify-end w-full">
                <div class="flex items-center">
                    {{-- Menu lg --}}
                    <div class="hidden md:block relative ml-10 ">
                        <div class="items-baseline">
                            <a 
                                href="{{ route('home.index') }}" 
                                class="
                                    text-gray-700 
                                    dark:text-gray-200 
                                    hover:text-gray-900 
                                    dark:hover:text-white 
                                    font-semibold 
                                    mx-3 
                                    py-2 
                                    rounded-2xl 
                                    text-sm 
                                    transition 
                                    ease-in-out">Inicio</a>
                            {!!request()->routeIs('home.index') ? $decorador : ""!!}
                        </div>
                    </div>
                    @auth
                        <div class="hidden md:block relative">
                            <div class="items-baseline">
                                <a 
                                    href="{{ route('admin.index') }}" 
                                    class="
                                        text-gray-700 
                                        dark:text-gray-200 
                                        hover:text-gray-900 
                                        dark:hover:text-white 
                                        font-semibold 
                                        mx-3 
                                        py-2 
                                        rounded-2xl 
                                        text-sm 
                                        transition 
                                        ease-in-out">Dashboard</a>
                                {!!request()->routeIs('admin.index') ? $decorador : ""!!}
                            </div>
                        </div>
                        @can('admin.colleges.index', 'admin.grades.index')  
                            <div class="hidden md:block relative rounded-2xl  text-sm w-full px-3 cursor-pointer" x-data="{ open: false }">
                                <div class="items-baseline">
                                    <span x-on:click="open = ! open"
                                        class="text-gray-700 dark:text-gray-200 hover:text-gray-900 dark:hover:text-white font-semibold transition ease-in-out"
                                        id="configuration-menu-button" 
                                        aria-expanded="false" 
                                        aria-haspopup="true">
                                        <span class="sr-only">Open configuration menu</span>
                                        <span class="flex">
                                            <span>
                                                Configuraci&oacute;n
                                            </span>
                                            <svg class="ml-1 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </span>
                                    </span>
                                    {!!request()->routeIs('admin.grades*') || request()->routeIs('admin.colleges*') ? $decorador : ""!!}
                                </div>
                                <div x-show="open" x-on:click.away="open = false" x-transition:enter.duration.200ms x-transition:leave.duration.200ms style="display: none;" class="origin-top-right absolute right-0 mt-2 w-48 rounded-2xl shadow-sm backdrop-blur-md bg-white/80 dark:bg-black/80 ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    @can('admin.colleges.index')
                                        <a href="{{ route('admin.colleges.index') }}" class="block px-4 m-2 py-2 text-sm font-semibold text-gray-700 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-700 hover:bg-gray-100 rounded-lg {!! request()->routeIs('admin.colleges*') ? "bg-gray-100 dark:text-gray-700" : "" !!}" role="menuitem" tabindex="999"
                                            id="user-menu-item-0">Universidades
                                        </a>
                                    @endcan
                                    @can('admin.grades.index')    
                                        <a href="{{ route('admin.grades.index') }}" class="block px-4 m-2 py-2 text-sm font-semibold text-gray-700 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-700 hover:bg-gray-100 rounded-lg {!! request()->routeIs('admin.grades*') ? "bg-gray-100 dark:text-gray-700" : "" !!}" role="menuitem" tabindex="999"
                                            id="user-menu-item-0">Calificaciones
                                        </a>
                                    @endcan
                                </div>
                            </div>
                        @endcan
                        @can('admin.quaters.index')    
                            <div class="hidden md:block relative">
                                <div class="items-baseline">
                                    <a href="{{ route('admin.quaters.index') }}" class="text-gray-700 dark:text-gray-200 hover:text-gray-900 dark:hover:text-white font-semibold mx-3 py-2 rounded-2xl text-sm transition ease-in-out">Cuatrimestres</a>
                                    {!!request()->routeIs('admin.quaters*') ? $decorador : ""!!}
                                </div>
                            </div>
                        @endcan
                    @endauth
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <!-- Profile dropdown -->
                        @auth
                            <div class="ml-3 relative" x-data="{ open: false }">
                                <div>
                                    <button x-on:click="open = ! open" type="button"
                                        class="max-w-xs rounded-full flex items-center text-sm focus:outline-none"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full"
                                            src="{{ auth()->user()->profile_photo_url }}"
                                            alt="">
                                    </button>
                                </div>
                                <div x-show="open" x-on:click.away="open = false" x-transition:enter.duration.200ms x-transition:leave.duration.200ms style="display: none;" class="origin-top-right absolute right-0 mt-2 w-48 rounded-2xl shadow-sm bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    
                                    <a href="{{ route('profile.show') }}" class="block px-4 m-2 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100 {!! request()->routeIs('profile.show') ? "bg-gray-100" : "" !!} rounded-lg" role="menuitem" tabindex="-1"
                                        id="user-menu-item-0">Perfil
                                    </a>
    
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf    
                                        <a href="{{ route('logout') }}" class="block px-4 m-2 py-2 text-sm text-gray-700 font-semibold hover:bg-gray-100 hover:rounded-lg" role="menuitem" tabindex="-1" id="user-menu-item-2" @click.prevent="$root.submit();">
                                            Cerrar sesión
                                        </a>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-200 hover:text-gray-900 dark:hover:text-white font-semibold mx-3 py-2 rounded-2xl text-sm transition ease-in-out">
                                Iniciar
                            </a>
                            <a href="{{ route('register') }}" class="text-gray-700 dark:text-gray-200 hover:text-gray-900 dark:hover:text-white font-semibold mx-3 py-2 rounded-2xl text-sm transition ease-in-out">
                                Registrarse
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
            
            <!-- Mobile menu button -->
            <div class="-mr-2 flex md:hidden">
                <button x-on:click="open = true" type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:bg-gray-200 dark:text-gray-200 dark:hover:text-white dark:hover:bg-gray-900 transition"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu" x-show="open" x-on:click.away="open = false" style="display: none;" x-transition:enter.duration.400ms x-transition:leave.duration.200ms>
        @auth
            <div class="pt-4 pb-3 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full"
                            src="{{ auth()->user()->profile_photo_url }}"
                            alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-bold leading-none text-gray-700 dark:text-white">{{ auth()->user()->name }}</div>
                        <div class="text-sm font-bold leading-none text-gray-400">{{ auth()->user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="px-4 pt-2 space-y-1 relative">
                        <a 
                            href="{{ route('admin.index') }}" 
                            class="
                                text-gray-700 
                                hover:bg-gray-200 
                                hover:text-gray-900 
                                dark:text-gray-200 
                                dark:hover:text-white 
                                dark:hover:bg-gray-700 
                                block 
                                px-3 
                                py-2 
                                rounded-md 
                                text-sm
                                font-bold
                                transition 
                                ease-in-out">Dashboard</a>
                        {!!request()->routeIs('admin.index') ? $decoradorVertical : ""!!}
                    </div>
                    <div class="px-4 pt-2 space-y-1 relative">
                        <a 
                            href="{{ route('admin.quaters.index') }}" 
                            class="
                                text-gray-700 
                                hover:bg-gray-200 
                                hover:text-gray-900 
                                dark:text-gray-200 
                                dark:hover:text-white 
                                dark:hover:bg-gray-700 
                                block 
                                px-3 
                                py-2 
                                rounded-md 
                                text-sm
                                font-bold
                                transition 
                                ease-in-out">Cuatrimestres</a>
                        {!!request()->routeIs('admin.quaters*') ? $decoradorVertical : ""!!}
                    </div>
                    <div class="px-4 pt-2 space-y-1 relative">
                        <a 
                            href="{{ route('admin.colleges.index') }}" 
                            class="
                                text-gray-700 
                                hover:bg-gray-200 
                                hover:text-gray-900 
                                dark:text-gray-200 
                                dark:hover:text-white 
                                dark:hover:bg-gray-700 
                                block 
                                px-3 
                                py-2 
                                rounded-md 
                                text-sm
                                font-bold
                                transition 
                                ease-in-out">Universidades</a>
                        {!!request()->routeIs('admin.colleges*') ? $decoradorVertical : ""!!}
                    </div>
                    <div class="px-4 pt-2 space-y-1 relative">
                        <a 
                            href="{{ route('admin.grades.index') }}" 
                            class="
                                text-gray-700 
                                hover:bg-gray-200 
                                hover:text-gray-900 
                                dark:text-gray-200 
                                dark:hover:text-white 
                                dark:hover:bg-gray-700 
                                block 
                                px-3 
                                py-2 
                                rounded-md 
                                text-sm
                                font-bold
                                transition 
                                ease-in-out">Calificaciones</a>
                        {!!request()->routeIs('admin.grades*') ? $decoradorVertical : ""!!}
                    </div>
                    <div class="px-4 pt-2 space-y-1 relative">
                        <a 
                            href="{{ route('profile.show') }}" 
                            class="
                                text-gray-700 
                                hover:bg-gray-200 
                                hover:text-gray-900 
                                dark:text-gray-200 
                                dark:hover:text-white 
                                dark:hover:bg-gray-700 
                                block 
                                px-3 
                                py-2 
                                rounded-md 
                                text-sm
                                font-bold
                                transition 
                                ease-in-out">Perfil</a>
                        {!!request()->routeIs('profile.show') ? $decoradorVertical : ""!!}
                    </div>
                    <div class="px-4 pt-2 space-y-1 relative">
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf   
                            <a 
                                href="{{ route('logout') }}" 
                                class="
                                    text-gray-700 
                                    hover:bg-gray-200 
                                    hover:text-gray-900 
                                    dark:text-gray-200 
                                    dark:hover:text-white 
                                    dark:hover:bg-gray-700 
                                    block 
                                    px-3 
                                    py-2 
                                    rounded-md 
                                    text-sm
                                    font-bold
                                    transition 
                                    ease-in-out" @click.prevent="$root.submit();">
                                Cerrar sesión
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="px-4 pt-2 pb-3 space-y-1 sm:px-3 border-t border-gray-200 dark:border-gray-700">
                <a 
                    href="{{ route('login') }}" 
                    class="
                        text-gray-700 
                        hover:bg-gray-200 
                        hover:text-gray-900 
                        dark:text-gray-200 
                        dark:hover:text-white 
                        dark:hover:bg-gray-700 
                        block 
                        px-3 
                        py-2 
                        rounded-md 
                        text-sm
                        font-bold
                        transition 
                        ease-in-out">Iniciar</a>
                <a 
                    href="{{ route('register') }}" 
                    class="
                        text-gray-700 
                        hover:bg-gray-200 
                        hover:text-gray-900 
                        dark:text-gray-200 
                        dark:hover:text-white 
                        dark:hover:bg-gray-700 
                        block 
                        px-3 
                        py-2 
                        rounded-md 
                        text-sm
                        font-bold
                        transition 
                        ease-in-out">Registrarse
                </a>
            </div>
        @endauth
    </div>
</nav>