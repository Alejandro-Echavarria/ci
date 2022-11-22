@php
    $fields = [
        [   
            'name'           => 'login.Name',
            'name-attribute' => 'name',
            'type'           => 'text',
            'placeholder'    => 'Nombre de la universidad',
            'required'       => 'required',
            'autofocus'      => 'autofocus'
        ],
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
        ],
        [
            'name'           => 'login.Password_confirmation',
            'name-attribute' => 'password_confirmation',
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
            {{ __('login.Create an account') }}
        </x-slot>
        
        <form method="POST" action="{{ route('register') }}">
            
            @csrf

            <x-admin.inputs.input :fields="$fields" :class="$class" />
            
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2 text-gray-600 hover:text-gray-900 dark:text-gray-200 dark:hover:text-gray-400 transition">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 transition">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 transition">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                        @error('terms')
                            <small class="text-red-500">{{$message}}</small>
                        @enderror
                    </x-jet-label>
                </div>
            @endif
            <div class="flex items-center justify-end mt-4">
                <a class="hover:underline text-sm text-gray-600 hover:text-gray-900 dark:text-gray-200 dark:hover:text-gray-300 transition" href="{{ route('login') }}">
                    {{ __('login.Already registered?') }}
                </a>

                <button class="ml-4 px-5 py-2.5 text-gray-700 dark:text-gray-200 focus:outline-none hover:text-gray-900 dark:hover:text-white rounded-2xl text-sm w-auto text-center bg-gray-200 dark:bg-gray-700 font-semibold cursor-pointer transition ease-in-out">
                    {{ __('login.Register') }}
                </button>
            </div>
        </form>
    </x-admin.cards.authentication-card>
</x-guest-layout>