@props(['route', 'records'])

<div class="mb-8 justify-end">
    <div class="flex w-full justify-between aling">
        <x-admin.buttons.button-index :route="$route" />
        <x-admin.inputs.search-index />
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-8">
    @foreach ($records as $record)    
        <div class="p-6 rounded-2xl color-primario">
            <div>
                <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{!! $record->name !!}</h5>
                <div class="border-b-2 border-color-secundario rounded-md"></div>
                <p class="font-medium text-sm text-gray-400 my-2">Desglose de materias</p>
                <div class="mb-3 text-gray-100">
                    <ul class="list-inside">
                        @if ($record->subjects->count())
                            @foreach ($record->subjects as $key => $item)
                                <li class="hover:bg-gray-700 rounded-lg px-3">Materia {!! $key+1 !!}: <span class="ml-3 text-sm font-bold">{!! $item->grade->name !!}</span></li>
                            @endforeach
                        @else
                            <li>No exiten calificaciones registradas asasa sasasas </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div>
                <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
    @endforeach
</div>