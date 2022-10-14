<x-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="p-2 pb-5">
                <h1 class="text-3xl text-gray-700 font-bold pb-6">Cuatrimestres</h1>
                <div class="color-primario p-5 rounded-2xl">
                    {!! Form::open() !!}
                        @livewire('admin.grades-select')
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="p-2">
                <h1 class="text-3xl text-gray-700 font-bold pb-6">Calcular &iacute;ndice</h1>
                <div class="color-primario p-5 rounded-2xl">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-3">
                        <div class="prevenir-envio w-full p-2.5 text-sm text-gray-700 border-1 text-white-500 rounded-xl shadow-sm focus:outline-none dark:text-white-400 dark:placeholder:text-gray-400 dark:bg-gray-700 dark:text-white transition ease-in-out">
                            <span 
                                id="indiceCuatrimestral">
                                0.00
                            </span>
                        </div>
                        <div class="prevenir-envio w-full p-2.5 text-sm text-gray-700 border-1 text-white-500 rounded-xl shadow-sm focus:outline-none dark:text-white-400 dark:placeholder:text-gray-400 dark:bg-gray-700 dark:text-white transition ease-in-out">
                            <span id="indiceAcumulado">
                                0.00
                            </span>
                        </div>
                    </div>
                    <div class="w-full flex justify-end">
                        <button onclick="calculateQuaters()" id="btnCalcular" type="button" class="text-white color-secundario focus:outline-none font-medium rounded-xl text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:hover:bg-blue-700 cursor-pointer">
                            Calcular
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script src="{{ asset('js/functions_quaters.js') }}"></script>
        <script>const base_url = "{!! env('APP_URL') !!}" </script>
    @endsection('scripts')
</x-app-layout>