@props(['fields'])
@php
    $route = 'grades';
@endphp


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
                class="w-full p-2.5 text-sm text-gray-700 border-1 text-white-500 rounded-xl shadow-sm focus:outline-none dark:text-white-400 dark:placeholder:text-gray-400 dark:bg-gray-700 dark:text-white transition ease-in-out {{($errors->has($field['name-attribute']) ? ' border-red-400 text-red-900 placeholder-red-700 focus:ring-red-500  focus:border-red-500 dark:text-red-500 dark:placeholder-red-500' : null)}}"
                value="{{ old($field['name-attribute']) }}"
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
<x-admin.forms.buttons.create-edit :route="$route" />