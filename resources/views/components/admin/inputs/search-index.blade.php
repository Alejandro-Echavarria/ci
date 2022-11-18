<div class="relative mt-1 ml-2 w-full sm:w-1/3">
    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none z-10">
        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
    </div>
    <input wire:model.debounce.300ms="search" type="search" class="w-full p-2 pl-10 text-sm text-gray-700 border-2 border-gray-400/20 rounded-xl focus:outline-none focus:ring focus:ring-gray-500/20 focus:border-gray-400/20 placeholder:text-gray-500 backdrop-blur-sm bg-white/20 transition ease-in-out" placeholder="Buscar: ej. yyyy-mm-dd" id="q" name="q">
</div>