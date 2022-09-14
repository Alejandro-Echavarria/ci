@props(['route'])

<div class="w-full flex justify-end">
    <a href="{{ route('admin.'. $route .'.index') }}" class="font-medium text-sm text-white hover:underline px-5 py-2.5 text-center">Regresar</a>
    {!! Form::submit(request()->routeIs('admin.'. $route .'.create') ? 'Crear' : 'Actualizar', ['class' => 'text-white color-secundario focus:outline-none font-medium rounded-xl text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:hover:bg-blue-700 cursor-pointer']) !!}
</div>