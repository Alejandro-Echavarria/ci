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
                <h1 class="text-3xl text-gray-700 font-bold pb-6">Calificaciones</h1>
                <p class="text-sm text-gray-500">Editando: <span class="font-bold">{{ $grade->name }}</span></p>
                <p class="text-sm text-gray-500">&Uacute;ltima actualizaci&oacute;n: <span class="font-bold">{{ $grade->updated_at }}</span></p>
                @if (session('info'))
                    <x-admin.alerts.alerts :message="session('info')" :type="'green-color'" />
                @endif
                <div class="color-primario p-5 rounded-2xl mt-6">
                    {!! Form::model($grade, ['route' => ['admin.grades.update', $grade], 'method' => 'put']) !!}
                        <x-admin.forms.form-edit :fields="$fields" :object="$grade" :class="$class" />
                        <x-admin.selects.select />
                        <x-admin.forms.buttons.create-edit :route="$route" />
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>