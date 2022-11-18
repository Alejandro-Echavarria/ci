@props(['fields', 'object', 'class'])

<div class="grid grid-cols-{!! $class['col'] !!} sm:grid-cols-{!! $class['col'] !!} sm:gap-3">
    @foreach ($fields as $field)
        <div>
            <label 
                for="{!! $field['name-attribute'] !!}" 
                class="block mb-2 text-base font-bold text-gray-700">
                {!! $field['name'] !!}<span class="text-red-500"> {{ !empty($field['required']) ? '*' : ''}}</span>
            </label>
            <input 
                type="{!! $field['type'] !!}" 
                id="{{ $field['name-attribute'] }}" 
                name="{!! $field['name-attribute'] !!}" 
                class="w-full p-2.5 text-sm text-gray-700 border-1 border-gray-300/20 rounded-xl focus:outline-none focus:ring focus:ring-gray-500/20 focus:border-gray-400/20 placeholder:text-gray-500 backdrop-blur-sm bg-gray-300/20 transition ease-in-out {{($errors->has($field['name-attribute']) ? ' border-red-400/20  placeholder-red-700 focus:ring-red-500 focus:border-red-500 text-red-500' : null)}}"
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