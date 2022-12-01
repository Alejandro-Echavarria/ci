<x-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="p-2 pb-5">
                <h1 class="text-3xl text-gray-700 dark:text-gray-200 font-bold pb-6">Cuatrimestres</h1>
                <div class="border dark:border-black/50 p-5 rounded-2xl">
                    {!! Form::open() !!}
                        @livewire('admin.grades-select')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script src="{{ asset('js/functions_quaters.js') }}"></script>
        <script>const base_url = "{!! env('APP_URL') !!}" </script>
    @endsection('scripts')
</x-app-layout>