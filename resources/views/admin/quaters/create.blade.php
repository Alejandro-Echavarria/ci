@php
    $fields = [
        [   
            'name'           => 'Nombre',
            'name-attribute' => 'name',
            'type'           => 'text',
            'placeholder'    => 'Elige una letra (A, B, C ...)',
            'required'       => 'required'
        ]
    ];

    $class = ['col' => '1'];
@endphp

<x-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="p-2">
                <h1 class="text-3xl text-gray-700 font-bold pb-6">Cuatrimestres</h1>
                <div class="color-primario p-5 rounded-2xl">
                    {!! Form::open(['route' => 'admin.quaters.store']) !!}
                        <x-admin.forms.form-create :fields="$fields" :class="$class" />
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>