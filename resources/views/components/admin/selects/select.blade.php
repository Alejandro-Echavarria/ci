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
            class="block mb-2 text-base font-bold text-gray-700">Estado
        </label>
        {!! Form::select('status', $list, null, ['class' => 'w-full p-2.5 text-sm text-gray-700 border-1 border-gray-300/20 rounded-xl focus:ring focus:ring-gray-500/20 focus:border-gray-400/20 focus:outline-none placeholder:text-gray-500 backdrop-blur-sm bg-gray-300/20 transition ease-in-out']) !!}
        @error('status')
            <small class="text-red-500">{{$message}}</small>
        @enderror
    </div>
</div>