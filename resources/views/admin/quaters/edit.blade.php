<x-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="p-2">
                <h1 class="text-3xl text-gray-700 dark:text-gray-200 font-bold pb-6">Cuatrimestres</h1>
                <p class="text-sm text-gray-500 dark:text-gray-200">Editando: <span class="font-bold">{{ $quater->name }}</span></p>
                <p class="text-sm text-gray-500 dark:text-gray-200">&Uacute;ltima modificaci&oacute;n: <span class="font-bold">{{ $quater->updated_at }}</span></p>
                @if (session('info'))
                    <x-admin.alerts.alerts :message="session('info')" :type="'green-color'" />
                @endif
                <div class="border-2 dark:border-gray-600 p-5 rounded-2xl mt-6">
                    {!! Form::model($quater, ['id' => 'edit-quater', 'class' => 'prevenir-envio'] ) !!}
                        @livewire('admin.grades-form-edit', ['quater' => $quater])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>