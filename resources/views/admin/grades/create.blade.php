@php
    $fields = [
        [   
            'name'           => 'Nombre',
            'name-attribute' => 'name',
            'type'           => 'text',
            'placeholder'    => 'Elige una letra (A, B, C ...)',
            'required'       => 'required'
        ],
        [   
            'name'           => 'Valor',
            'name-attribute' => 'value',
            'type'           => 'number',
            'placeholder'    => 'Elige un valor para esta calificaci&oacute;n',
            'required'       => 'required'
        ]
    ];
    $class = ['col' => '2'];
    $route = 'grades';
@endphp

<x-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="p-2">
                <h1 class="text-3xl text-gray-700 dark:text-gray-200 font-bold pb-6">Calificaciones</h1>
                <div class="border dark:border-gray-800 p-5 rounded-2xl">
                    {!! Form::open(['route' => 'admin.grades.store']) !!}
                        <x-admin.forms.form-create :fields="$fields" :class="$class" />
                        <x-admin.selects.select />     
                        <x-admin.forms.buttons.create-edit :route="$route" />
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>