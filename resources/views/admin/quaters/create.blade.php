<x-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="p-2">
                <h1 class="text-3xl text-gray-700 font-bold pb-6">Cuatrimestres</h1>
                <div class="color-primario p-5 rounded-2xl">
                    {{-- {!! Form::open(['route' => 'admin.quaters.store']) !!} --}}
                    {!! Form::open() !!}
                        @livewire('admin.grades-select')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>