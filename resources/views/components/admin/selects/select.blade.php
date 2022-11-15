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
            class="block mb-2 text-sm font-medium text-gray-100">Estado
        </label>
        {!! Form::select('status', $list, null, ['class' => 'w-full p-2.5 text-sm border-1 border-gray-600 text-white-500 rounded-xl shadow-sm focus:outline-none placeholder:text-white-600 bg-gray-700 text-white transition ease-in-out']) !!}
        @error('status')
            <small class="text-red-500">{{$message}}</small>
        @enderror
    </div>
</div>