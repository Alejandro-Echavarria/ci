@props(['route'])

<a href="{{ route('admin.'. $route .'.create') }}" class="px-5 py-2.5 mr-2 mt-1 text-gray-700 dark:text-gray-200 bg-gray-300/20 hover:bg-gray-300/50 focus:outline-none rounded-2xl text-sm font-bold w-auto text-center cursor-pointer transition ease-in-out">
    <span class="flex">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
        </svg>
        <span class="hidden-letters ml-2"> Agregar</span>
    </span> 
</a>