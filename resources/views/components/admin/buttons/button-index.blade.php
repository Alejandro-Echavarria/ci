@props(['route'])

<a href="{{ route('admin.'. $route .'.create') }}" class="px-5 py-2.5 mr-2 mt-1 text-white color-secundario focus:outline-none font-medium rounded-2xl text-sm w-auto text-center dark:hover:bg-blue-700 cursor-pointer transition ease-in-out">
    <span class="">+</span> <span class="hidden-letters font-weight-bold"> Agregar</span>
</a>