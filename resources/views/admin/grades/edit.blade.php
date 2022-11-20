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
    $record = $grade;
@endphp

<x-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="p-2">
                <h1 class="text-3xl text-gray-700 dark:text-gray-200 font-bold pb-6">Calificaciones</h1>
                <p class="text-sm text-gray-500 dark:text-gray-200">Editando: <span class="font-bold">{{ $record->name }}</span></p>
                <p class="text-sm text-gray-500 dark:text-gray-200">&Uacute;ltima modificaci&oacute;n: <span class="font-bold">{{ $record->updated_at }}</span></p>
                @if (session('info'))
                    <x-admin.alerts.alerts :message="session('info')" :type="'green-color'" />
                @endif
                <div class="border dark:border-gray-800 p-5 rounded-2xl mt-6">
                    {!! Form::model($record, ['route' => ['admin.'. $route .'.update', $record], 'method' => 'put']) !!}
                        <x-admin.forms.form-edit :fields="$fields" :object="$record" :class="$class" />
                        <x-admin.selects.select />
                        <x-admin.forms.buttons.create-edit :route="$route" />
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>