<x-app-layout>
    <div class="w-full">
        <div class="pt-12">
            <div class="container">
                <div class="py-6 text-gray-700 dark:text-gray-50 text-center font-semibold grid">
                    <h1 class="text-4xl lg:text-7xl pb-6 font-bold">Calcula tu &iacute;ndice universitario</h1>
                    <p class="text-xl lg:text-3xl font-semibold mt-5">
                        Una manera f&aacute;cil de llevar tu &iacute;ndice y calcular tus calificaciones de la universidad de forma gratis, r&aacute;pida y amigable.
                    </p>
                    <div class="mt-6 w-full">
                        <div class="mt-5">
                            <a href="{{ route('register') }}" class="px-5 py-2.5 text-gray-700 dark:text-gray-200 focus:outline-none hover:text-gray-900 dark:hover:text-white rounded-2xl text-sm md:text-xl w-full sm:w-auto text-center bg-gray-200 dark:bg-gray-700 font-semibold cursor-pointer transition ease-in-out">
                                Empieza a calcular
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <img class="w-full max-h-[500px]" src="{{ asset('img/person.svg') }}" alt="">
        </div>
    </div>
</x-app-layout>