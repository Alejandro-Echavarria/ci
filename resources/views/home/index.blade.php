<x-app-layout>
    <div class="w-full">
        <div class="pt-12">
            <div class="container">
                <div class="py-6 text-gray-700 dark:text-gray-200 text-center font-semibold grid">
                    <h1 class="text-4xl lg:text-7xl pb-6 font-bold">Calcula tu &iacute;ndice universitario</h1>
                    <p class="text-xl lg:text-3xl font-semibold mt-5">
                        Mant&eacute;n un seguimiento de tus calificaciones universitarias con nuestra herramienta amigable, de manera gratuita y r&aacute;pida
                    </p>
                    <div class="mt-6 w-full">
                        <a href="{{ route('register') }}" class="">
                            <button class="calculate mt-5">
                                <span class="circle bg-gradient-to-r from-green-200/80 to-green-400/20" aria-hidden="true">
                                    <span class="icon arrow"></span>
                                </span>
                                <span class="button-text text-gray-700 dark:text-gray-200">Empeiza a calcular</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <img class="w-full max-h-[500px]" src="{{ asset('img/person.svg') }}" alt="">
        </div>
    </div>
</x-app-layout>