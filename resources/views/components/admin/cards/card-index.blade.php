@props(['route', 'records'])

@php
    $value_ia = 0;
    $creditos_ia = 0;
@endphp 

<div class="mb-8 justify-end">
    <div class="flex w-full justify-between">
        <x-admin.buttons.button-index :route="$route" />
        <div class="bg-gradient-to-r from-indigo-200 to-indigo-400 rounded-xl text-center cursor-default mt-1 p-1 w-full sm:w-auto">
            <div class="backdrop-blur-sm bg-white/10 rounded-lg focus:outline-none px-5 py-1 h-full">
                <span id="ic" class="text-black font-bold text-sm" title="Indice acumulado">Indice acumulado:
                    <span id="ia" class="mx-3 text-sm font-bold text-black"></span>
                </span>
            </div>
        </div>
    </div>
</div>
@if ($records->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($records as $record)
            @php
                $creditos = 0;
                $value = 0;
            @endphp 
            <div class="p-6 rounded-2xl border dark:border-gray-800">
                <div class="mb-5">
                    <div class="flex gap-1">
                        <h5 class="text-2xl text-gray-700 dark:text-gray-200 font-bold">{!! $record->name !!}</h5>
                        <form id="formDelete" class="-my-1 inline-flex ml-auto" method="POST">
                            @csrf
                            @method('delete')
                            <button type="button" class="bg-gray-300/20 hover:bg-gray-300/50 text-gray-700 dark:text-gray-200 rounded-full p-1.5 h-8 w-8 hover:bg-gray-300 transition-all" data-dismiss-target="#alert" aria-label="Close" onclick="formDelete({{ $record }})">
                                <span class="sr-only">Close</span>
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </form>
                    </div>
                    <div class="border-b-2 border-gray-400 rounded-md"></div>
                    <p class="font-semibold text-sm text-gray-700 dark:text-gray-200 my-2">Desglose de materias</p>
                    <div class="mb-3">
                        <ul class="list-inside">
                            @if ($record->subjects->count())
                                @foreach ($record->subjects as $key => $item)
                                    <li class="hover:bg-gray-300/20 rounded-lg px-3 transition text-gray-700 dark:text-gray-200 font-semibold">Materia {!! $key+1 !!}: 
                                        <span class="mx-3 text-sm font-bold text-gray-700 dark:text-gray-200">
                                            {!! $item->grade->name !!}
                                        </span>
                                        <span>
                                            Cr&eacute;ditos: <span class="mx-3 text-sm font-bold text-gray-700 dark:text-gray-200"> {!! $item->credits !!}</span>
                                        </span>
                                    </li>
                                @endforeach
                            @else
                                <li>No exiten calificaciones registradas asasa sasasas </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="flex justify-between">
                    <a href="{{ route('admin.quaters.edit', $record) }}" class="text-gray-700 dark:text-gray-200 bg-gray-300/20 focus:outline-none font-bold rounded-xl text-sm px-5 py-2.5 text-center hover:bg-gray-300/50 cursor-pointer transition ease-in-out">
                        Editar
                    </a>
                    @if ($record->subjects->count())
                        <div class="bg-gray-300/20 hover:bg-gray-300/50 transition rounded-xl text-center cursor-default p-1" title="Indice cuatrimestral">
                            <div class="rounded-lg focus:outline-none px-5 py-1">
                                <span id="ic" class="text-gray-800 font-medium text-sm">
                                    @foreach ($record->subjects as $key => $item)
                                        @php
                                            $value += $item->grade->value * $item->credits;
                                            $creditos += $item->credits;
                                        @endphp
                                    @endforeach
                                    @php
                                        $value_ia += $value;
                                        $creditos_ia += $creditos;
                                    @endphp
                                    <span class="font-bold dark:text-gray-200">{{ $creditos <= 0 ? $resultado = 0 : number_format($resultado = $value/$creditos, 2) }}</span>
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="w-full text-center text-red-600">
        <span class="text-sm font-semibold">
            No existe ning&uacute;n registro...
        </span>
    </div>
@endif

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

            const values = [
                {'points': <?= json_encode($value_ia) ?>},
                {'credits': <?= json_encode($creditos_ia) ?>}
            ];
            calculateIA(values);
        });
    </script>
@endsection('scripts')
