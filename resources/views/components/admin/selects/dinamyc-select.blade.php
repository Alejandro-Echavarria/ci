@props(['class'])

<div class="grid grid-cols-{!! $class['col2'] !!} sm:grid-cols-{!! $class['col2'] !!} sm:gap-3">
    <div class="my-6">
        <div class="flex gap-3">
            <div class="flex">
                <p class="block text-sm font-medium text-gray-900 dark:text-gray-300 place-self-center">Materia</p>
            </div>
            <select name="" id="" class="w-full p-2.5 text-sm text-gray-700 border-1 dark:border-gray-600 text-white-500 rounded-xl shadow-sm focus:outline-none dark:text-white-400 dark:placeholder:text-white-600 dark:bg-gray-700 dark:text-white transition ease-in-out">
    
            </select>
            <button type="button" class="text-white color-secundario focus:outline-none font-medium rounded-xl text-sm w-auto sm:w-auto px-5 py-2.5 text-center dark:hover:bg-blue-700 cursor-pointer">a</button>
        </div>
        {{-- @error('status')
            <small class="text-red-500">{{$message}}</small>
        @enderror --}}
    </div>
</div>