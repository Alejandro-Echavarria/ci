@php
    $list = [
        '1' => 'Activo',
        '2' => 'Inactivo'
    ];
@endphp

<div class="grid grid-cols-1">
    <div class="mb-6">
        <label 
            for="status" 
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Estado
        </label>
        {!! Form::select('status', $list, null, ['class' => 'w-full p-2.5 text-sm text-gray-700 border-1 dark:border-gray-600 text-white-500 rounded-xl shadow-sm focus:outline-none dark:text-white-400 dark:placeholder:text-white-600 dark:bg-gray-700 dark:text-white transition ease-in-out']) !!}
        @error('status')
            <small class="text-red-500">{{$message}}</small>
        @enderror
    </div>
</div>