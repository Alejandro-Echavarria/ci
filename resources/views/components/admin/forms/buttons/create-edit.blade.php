@props(['route'])

<div class="w-full flex justify-end">
    <a href="{{ route('admin.'. $route .'.index') }}" class="px-5 py-2.5 font-semibold text-sm text-gray-700 dark:text-gray-200 hover:underline text-center align-middle">
        <div class="flex space-x-1">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-full bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
            </div>
            <span>Regresar</span>
        </div>
    </a>
    <button class="px-5 py-2.5 text-gray-700 dark:text-gray-200 bg-gray-300/20 hover:bg-gray-300/50 focus:outline-none rounded-2xl text-sm font-bold w-auto text-center cursor-pointer transition ease-in-out">
        <div class="flex space-x-1">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-full bi bi-check2-all" viewBox="0 0 16 16">
                    <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                    <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                </svg>
            </div>
            <span>{{ request()->routeIs('admin.'. $route .'.create') ? 'Crear' : 'Actualizar' }}</span>
        </div>
    </button>
</div>
