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
            <div class="mb-5">
                <div class="flex gap-1">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{!! $record->name !!}</h5>
                    <form id="formDelete" class="-mx-4 -my-4 inline-flex ml-auto" method="POST">
                        @csrf
                        @method('delete')
                        <button type="button" class="bg-gray-100 text-gray-500 rounded-full p-1.5 h-8 w-8 hover:bg-red-300 hover:text-red-500 transition-all" data-dismiss-target="#alert" aria-label="Close" onclick="formDelete({{ $record }})">
                            <span class="sr-only">Close</span>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </form>
                </div>
                <div class="border-b-2 border-color-secundario rounded-md"></div>
                <p class="font-medium text-sm text-gray-400 my-2">Desglose de materias</p>
                <div class="mb-3 text-gray-100">
                    <ul class="list-inside">
                        @if ($record->subjects->count())
                            @foreach ($record->subjects as $key => $item)
                                <li class="hover:bg-gray-700 rounded-lg px-3 transition text-gray-300">Materia {!! $key+1 !!}: <span class="ml-3 text-sm font-bold text-white">{!! $item->grade->name !!}</span></li>
                            @endforeach
                        @else
                            <li>No exiten calificaciones registradas asasa sasasas </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div>
                <a href="{{ route('admin.quaters.edit', $record) }}" class="text-white color-secundario focus:outline-none font-medium rounded-xl text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:hover:bg-blue-700 cursor-pointer">
                    Editar
                </a>
            </div>
        </div>
    @endforeach
</div>