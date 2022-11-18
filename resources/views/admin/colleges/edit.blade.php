@php
    $fields = [
        [   
            'name'           => 'Nombre',
            'name-attribute' => 'name',
            'type'           => 'text',
            'placeholder'    => 'Nombre de la universidad',
            'required'       => 'required'
        ]
    ];
    $class = ['col' => '1'];
    $route = 'colleges';
    $record = $college;
@endphp

<x-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="p-2">
                <h1 class="text-3xl text-gray-700 font-bold pb-6">Universidades</h1>
                <p class="text-sm text-gray-500">Editando: <span class="font-bold">{{ $record->name }}</span></p>
                <p class="text-sm text-gray-500">&Uacute;ltima modificaci&oacute;n: <span class="font-bold">{{ $record->updated_at }}</span></p>
                @if (session('info'))
                    <x-admin.alerts.alerts :message="session('info')" :type="'green-color'" />
                @endif
                <div class="border backdrop-blur-sm bg-white/20 p-5 rounded-2xl mt-6">
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