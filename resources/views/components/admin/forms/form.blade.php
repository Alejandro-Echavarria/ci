@props(['fields', 'grade'])

<div class="color-primario p-5 rounded-md mt-6">
    {!! Form::model($grade, ['route' => ['admin.grades.update', $grade], 'method' => 'put']) !!}

        <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-3">
            @foreach ($fields as $field)
                <div class="mb-6">
                    <label 
                        for="{!! $field['name-attribute'] !!}" 
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        {!! $field['name'] !!}<span class="text-red-500"> {{ !empty($field['required']) ? '*' : ''}}</span>
                    </label>
                    <input 
                        type="{!! $field['type'] !!}" 
                        id="{{ $field['name-attribute'] }}" 
                        name="{!! $field['name-attribute'] !!}" 
                        class="w-full p-2.5 text-sm text-gray-700 border-1 dark:border-gray-600 text-white-500 rounded-lg shadow-sm focus:outline-none dark:text-white-400 dark:placeholder:text-gray-400 dark:bg-gray-700 dark:text-white transition ease-in-out"
                        value="{{ old($field['name-attribute'], $grade[$field['name-attribute']]) }}"
                        placeholder="{!! $field['placeholder'] !!}" 
                        {{ $field['required'] }} 
                    >

                    @error($field['name-attribute'])
                        <small class="text-red-500">{{$message}}</small>
                    @enderror
                </div>
            @endforeach
        </div>
        <div class="grid grid-cols-1">
            <div class="mb-6">
                <label 
                    for="status" 
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Estado
                </label>
                <x-admin.selects.select />
                @error('status')
                    <small class="text-red-500">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="w-full flex justify-end">
            {!! Form::submit(request()->routeIs('admin.grades.create') ? 'Crear' : 'Actualizar', ['class' => 'text-white color-secundario focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer']) !!}
        </div>

    {!! Form::close() !!}
</div>