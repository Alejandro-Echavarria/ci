@props(['fields', 'object', 'class'])

<div class="grid grid-cols-{!! $class['col'] !!} sm:grid-cols-{!! $class['col'] !!} sm:gap-3">
    @foreach ($fields as $field)
        <div>
            <label 
                for="{!! $field['name-attribute'] !!}" 
                class="block mb-2 text-sm font-medium text-gray-100">
                {!! $field['name'] !!}<span class="text-red-500"> {{ !empty($field['required']) ? '*' : ''}}</span>
            </label>
            <input 
                type="{!! $field['type'] !!}" 
                id="{{ $field['name-attribute'] }}" 
                name="{!! $field['name-attribute'] !!}" 
                class="w-full p-2.5 text-sm border-1 text-white-500 rounded-xl shadow-sm focus:outline-none text-white-400 placeholder:text-gray-400 bg-gray-700 text-white transition ease-in-out {{($errors->has($field['name-attribute']) ? ' border-red-400 text-red-400 placeholder-red-700 focus:ring-red-500  focus:border-red-500' : null)}}"
                value="{{ old($field['name-attribute'], $object[$field['name-attribute']]) }}"
                placeholder="{!! $field['placeholder'] !!}" 
                {{ $field['required'] }} 
            >

            @error($field['name-attribute'])
                <small class="text-red-500">{{$message}}</small>
            @enderror
        </div>
    @endforeach
</div>