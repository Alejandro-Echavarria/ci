@php
    $fields = [
        [   
            'name'           => 'Nombre',
            'name-attribute' => 'name',
            'type'           => 'text',
            'placeholder'    => 'Elige un nombre',
            'required'       => 'required'
        ]
    ];
    $class = ['col' => '1', 'col2' => '1'];
    $route = 'quaters';
@endphp

<x-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="p-2">
                <h1 class="text-3xl text-gray-700 font-bold pb-6">Cuatrimestres</h1>
                <div class="color-primario p-5 rounded-2xl">
                    {!! Form::open(['route' => 'admin.quaters.store']) !!}
                        <x-admin.forms.form-create :fields="$fields" :class="$class" />
                        <div id="subjects">
                            @livewire('admin.grades-select')
                        </div>
                        <x-admin.forms.buttons.create-edit :route="$route" />
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>