@props(['route'])

<div class="w-full flex justify-end">
    <a href="{{ route('admin.'. $route .'.index') }}" class="px-5 py-2.5 font-semibold text-sm text-gray-700 dark:text-gray-200 hover:underline text-center align-middle">Regresar</a>
    <button class="px-5 py-2.5 text-gray-700 dark:text-gray-200 bg-gray-300/20 hover:bg-gray-300/50 focus:outline-none rounded-2xl text-sm font-bold w-auto text-center cursor-pointer transition ease-in-out">
        <div class="svg-wrapper-1">
            <div class="svg-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                    <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                    <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                  </svg>
            </div>
        </div>
        <span>{{ request()->routeIs('admin.'. $route .'.create') ? 'Crear' : 'Actualizar' }}</span>
    </button>
</div>

{{-- <div class="w-full flex justify-end">
    <a href="{{ route('admin.'. $route .'.index') }}" class="font-semibold text-sm text-gray-700 dark:text-gray-200 hover:underline px-5 py-2.5 text-center">Regresar</a>
    {!! Form::submit(request()->routeIs('admin.'. $route .'.create') ? 'Crear' : 'Actualizar', ['class' => 'text-white color-secundario focus:outline-none font-medium rounded-xl text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:hover:bg-blue-700 cursor-pointer']) !!}
</div> --}}