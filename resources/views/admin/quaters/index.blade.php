<x-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="p-2">
                <h1 class="text-3xl text-gray-700 font-bold pb-6">Cuatrimestres</h1>
                @livewire('admin.quater-index')
            </div>
        </div>
    </div>
</x-app-layout>
<script src="{{ asset('js/functions_quaters.js') }}"></script>
