<div>
    {{-- <div class="card shadow-none personal-border">
        <div class="card-header color-primario">
            <div class="d-flex flex-row justify-content-around align-items-center">
                <div class="flex-grow-1 mr-1">
                    <input wire:model="search" type="text" class="form-control text-gray" placeholder="Buscar..." id="txtBuscar" name="txtBuscar">
                </div>
                <div class="form-inline">
                    <select class="form-control custom-select mx-1 text-gray" id="selectEntries">
                        <option value="10" class="text-gray">10</option>
                        <option value="25" class="text-gray">25</option>
                        <option value="50" class="text-gray">50</option>
                        <option value="100" class="text-gray">100</option>
                    </select>
                </div>
                <div>
                    <a href="{{route('admin.posts.create')}}" class="btn blue-color">
                        <i class="fas fa-plus"></i> <span class="hidden-letters font-weight-bold"> Agregar</span>
                    </a>
                </div>
            </div>
        </div>
        @if ($grades->count())    
            <div class="card-body table-responsive p-0">
                <table style="width: 100%;" class="table table-hover table-sm table-borderless">
                    <thead>
                        <tr>
                            <th style="width: 10%">ID</th>
                            <th style="width: 70%">Nombre</th>
                            <th style="width: 20%">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grades as $grade)
                            <tr class="px-2">
                                <td>{{$grade->id}}</td>
                                <td>{{$grade->name}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-sm green-color mr-1" href="{{route('admin.grades.edit', $grade)}}"><i class="fas fa-pen"></i></a>
                                        <form action="{{route('admin.grades.destroy', $grade)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm red-color" type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-3 border-top text-sm pt-3">
                <div class="float-left mt-2">
                    <p class="text-muted" id="numbers_numbers"></p>
                </div>
                <div class="float-right mt-2">
                    {{$grades->links()}}
                </div>
            </div>
        @else
            <div class="card-body">
                <div class="text-center">
                    <strong class="text-gray">No existe ning&uacute;n registro...</strong>
                </div>
            </div>
        @endif
    </div> --}}
    <div class="mb-2 flex justify-end">
        <div class="flex w-full justify-between aling">
            <a href="{{route('admin.grades.create')}}" class="px-5 py-2.5 mr-2 mt-1 text-white color-secundario focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm w-auto text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">
                <i class="fas fa-plus"></i> <span class="hidden-letters font-weight-bold"> Agregar</span>
            </a>
            <div class="relative mt-1 w-full sm:w-1/3">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                
                    <input wire:model="search" type="search" class="w-full p-2 pl-10 text-sm text-gray-700 leading-5 py-2 px-3 border-4 border-gray-600 text-white-500 rounded-lg shadow-sm focus:outline-none dark:text-white-400 dark:placeholder:text-white-600 dark:bg-white dark:border-gray-500 transition ease-in-out" placeholder="Buscar" id="txtBuscar" name="q">
                </div>
            </div>
        </div>
    <div class="overflow-x-auto relative rounded-md color-primario">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">Calificaci&oacute;n</th>
                    <th scope="col" class="py-3 px-6">Valor</th>
                    <th scope="col" class="py-3 px-6">Estado</th>
                    <th scope="col" class="py-3 px-6">Creado</th>
                    <th scope="col" class="py-3 px-6">Actualizado</th>
                    <th scope="col" class="py-3 px-6">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @if ($grades->count())
                @foreach ($grades as $grade)
                    <tr class="border-b color-primario border-gray-700 hover:bg-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$grade->name}}
                        </th>
                        <td class="py-4 px-6">
                            {{$grade->value}}
                        </td>
                        <td class="py-4 px-6">
                            @if ($grade->status === '1')
                                <span class="rounded-full green-color text-xs px-2 font-bold">Activo</span>
                            @else
                                <span class="rounded-full red-color text-xs px-2 font-bold">Inactivo</span>
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            {{$grade->created_at}}
                        </td>
                        <td class="py-4 px-6">
                            {{$grade->updated_at}}
                        </td>
                        <td class="py-4 px-6">
                            <a href="{{ route('admin.grades.edit', $grade) }}" class="font-medium text-blue-500 hover:underline">Editar</a>
                        </td>
                    </tr>
                @endforeach
                @else
                <tr class="border-b color-primario border-gray-700">
                    <td colspan="6" class="py-4 px-6 sm:text-center text-red-400">
                        No existe ning&uacute;n registro...
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="mt-2">
        {{ $grades->links('vendor.livewire.tailwind') }}
    </div>
</div>
