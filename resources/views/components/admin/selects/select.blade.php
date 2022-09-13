@php
    $list = [
        '1' => 'Activo',
        '2' => 'Inactivo'
    ];
@endphp

{!! Form::select('status', $list, null, ['class' => 'w-full p-2.5 text-sm text-gray-700 border-1 dark:border-gray-600 text-white-500 rounded-lg shadow-sm focus:outline-none dark:text-white-400 dark:placeholder:text-white-600 dark:bg-gray-700 dark:text-white transition ease-in-out']) !!}