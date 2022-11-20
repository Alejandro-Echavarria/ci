@php
    $list = [
        '1' => 'Activo',
        '2' => 'Inactivo'
    ];
@endphp

<div class="grid grid-cols-1 mt-3">
    <div class="mb-6">
        <label 
            for="status" 
            class="block mb-2 text-base font-bold text-gray-700 dark:text-gray-200">Estado
        </label>
        {!! Form::select('status', $list, null, ['
            class' => '
                w-full p-2.5 text-sm 
                text-gray-700 
                dark:text-gray-200 
                border border-gray-300/20 dark:border-gray-700 
                rounded-xl 
                focus:outline-none focus:ring focus:ring-gray-500/20 focus:border-gray-400/20 
                placeholder:text-gray-500 dark:placeholder:text-gray-200 
                backdrop-blur-sm bg-gray-300/20 dark:bg-gray-800 
                transition ease-in-out '
        ]) !!}
        @error('status')
            <small class="text-red-500">{{$message}}</small>
        @enderror
    </div>
</div>