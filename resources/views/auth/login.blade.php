@php
    $fields = [
        [
            'name'           => 'login.Email',
            'name-attribute' => 'email',
            'type'           => 'email',
            'placeholder'    => 'Ingresa tu email',
            'required'       => 'required',
            'autofocus'      => ''
        ],
        [
            'name'           => 'login.Password',
            'name-attribute' => 'password',
            'type'           => 'password',
            'placeholder'    => '',
            'required'       => 'required',
            'autofocus'      => ''
        ]
    ];
    $class = ['col' => '1'];
@endphp

<x-guest-layout>
    <x-admin.cards.authentication-card>
        
        <x-slot name="logo" >
            <div class="items-center mb-8">
                <p class="font-bold dark:text-gray-200 text-gray-700"><span class="h-12 w-12">MAET</span> - CI</p>
            </div>
        </x-slot>

        <x-slot name="tittle" >
            {{ __('login.Sign in') }}
        </x-slot>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <x-admin.inputs.input :fields="$fields" :class="$class" />

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600 hover:text-gray-900 dark:text-gray-200 dark:hover:text-gray-400 transition">{{ __('login.Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="text-xs text-gray-600 hover:text-gray-900 dark:text-gray-200 dark:hover:text-gray-400 transition" href="{{ route('password.request') }}">
                        {{ __('login.Forgot your password?') }}
                    </a>
                @endif
                <a class="hover:underline ml-4 text-sm text-gray-600 hover:text-gray-900 dark:text-gray-200 dark:hover:text-gray-300 transition" href="{{ route('register') }}">
                    {{ __('login.Register') }}
                </a>
                <button class="ml-4 px-5 py-2.5 text-gray-700 dark:text-gray-200 focus:outline-none hover:text-gray-900 dark:hover:text-white rounded-2xl text-sm w-auto text-center bg-gray-200 dark:bg-gray-700 font-semibold cursor-pointer transition ease-in-out">
                    {{ __('login.Log in') }}
                </button>
            </div>
        </form>
    </x-admin.cards.authentication-card>
</x-guest-layout>
