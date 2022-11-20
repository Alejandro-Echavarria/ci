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
@endphp

<x-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="p-2">
                <h1 class="text-3xl text-gray-700 dark:text-gray-200 font-bold pb-6">Universidades</h1>
                <div class="border dark:border-gray-800 p-5 rounded-2xl">
                    {!! Form::open(['route' => 'admin.'. $route .'.store']) !!}
                        <x-admin.forms.form-create :fields="$fields" :class="$class" />
                        <x-admin.selects.select />     
                        <x-admin.forms.buttons.create-edit :route="$route" />
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>