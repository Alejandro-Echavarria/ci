<x-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="p-2">
                <h1 class="text-3xl text-gray-700 font-bold pb-6">Calificaciones</h1>
                <p class="text-sm text-gray-500">Editando: <span class="font-bold">{{ $grade->name }}</span></p>
                <p class="text-sm text-gray-500">&Uacute;ltima actualizaci&oacute;n: <span class="font-bold">{{ $grade->updated_at }}</span></p>
                <x-admin.form />
            </div>
        </div>
    </div>
</x-app-layout>