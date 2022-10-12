<x-app-layout>
    <div class="w-full h-[70vh]">
        <div class="py-12">
            <div class="container">
                <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4">
                    <div class="py-6 sm:pl-3 text-gray-600 text-center sm:text-left font-semibold backdrop-blur-sm">
                        <h1 class="text-3xl pb-6 text-gray-700 font-bold">Calcula tu &iacute;ndice universitario</h1>
                        <p>
                            Una manera f&aacute;cil de llevar tu &iacute;ndice y calcular tus calificaciones de la universidad.
                        </p>
                        <ul class="list-inside">
                            <li>F&aacute;cil</li>
                            <li>R&aacute;pida</li>
                            <li>Sencilla</li>
                            <li>Amigable</li>
                            <li>Segura</li>
                        </ul>
                        <div class="mt-6 w-full">
                            <div class="flex">
                                <a href="{{ route('admin.quaters.index') }}" class="px-5 py-2.5 text-white color-secundario focus:outline-none font-medium rounded-2xl text-sm w-full sm:w-auto text-center dark:hover:bg-blue-700 cursor-pointer transition ease-in-out">
                                    Empieza a calcular
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <img class="min-w-md" src="{{ asset('img/svg/stats.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>