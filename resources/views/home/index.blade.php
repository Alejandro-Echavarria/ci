<x-app-layout>
    <div class="w-full h-[70vh]">
        <div class="py-12">
            <div class="container">
                <div class="py-6 text-gray-700 dark:text-gray-200 text-center font-semibold grid">
                    <h1 class="text-4xl lg:text-7xl pb-6 font-bold">Calcula tu &iacute;ndice universitario</h1>
                    <p class="text-xl lg:text-3xl font-semibold mt-5">
                        Una manera f&aacute;cil de llevar tu &iacute;ndice y calcular tus calificaciones de la universidad de manera r&aacute;pida, sencilla, amigable y segura.
                    </p>
                    <div class="mt-6 w-full">
                        <div class="mt-5">
                            <a href="{{ route('admin.quaters.index') }}" class="px-5 py-2.5 text-white color-secundario focus:outline-none font-medium rounded-2xl text-sm md:text-xl w-full sm:w-auto text-center dark:hover:bg-blue-700 cursor-pointer transition ease-in-out">
                                Empieza a calcular
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>