<div>
    <div class="grid grid-cols-1 sm:grid-cols-1 gap-3 mb-3">
        @if (session('error'))
            <x-admin.alerts.alerts :message="session('error')" :type="'red-color'" />
        @endif
        <div>
            <label 
                for="name" 
                class="block mb-2 text-base font-bold text-gray-700 dark:text-gray-200">
                Nombre<span class="text-red-500"> *</span>
            </label>
            <input
                wire:model.debounce.300ms="name"
                type="text" 
                id="name" 
                name="name" 
                class="
                    w-full p-2.5 text-sm 
                    text-gray-700 
                    dark:text-gray-200 
                    border border-gray-300/20 dark:border-gray-700
                    rounded-xl 
                    focus:outline-none focus:ring focus:ring-gray-500/20 focus:border-gray-400/20 
                    placeholder:text-gray-500 dark:placeholder:text-gray-200 
                    backdrop-blur-sm bg-gray-300/20 dark:bg-gray-800/20
                    transition ease-in-out
                    {{($errors->has('name') ? ' border-red-400/20 dark:border-red-400/60 placeholder-red-700 focus:ring-red-500 focus:border-red-500 text-red-500' : null)}}"
                value="{{ old('name') }}"
                placeholder="Elige un nombre" 
                required 
            >
            @error('name')
                <small class="text-red-500">{{$message}}</small>
            @enderror
        </div>
        @if (count($subjects))
            @foreach ($subjects as $key =>  $subject)
                @php
                    $id = $subjectsId[$key];
                @endphp
                <div>
                    <div class="flex gap-3">
                        <div class="flex">
                            <p class="block text-base font-bold text-gray-700 dark:text-gray-200 place-self-center"><span class="hidden-letters">Materia&nbsp;-&nbsp;</span>{{ $key+1 }}</p>
                        </div>
                        <select 
                            wire:model.defer="subjects.{{ $key }}.grade_id"
                            class="
                                w-full p-2.5 text-sm 
                                text-gray-700 
                                dark:text-gray-200 
                                border border-gray-300/20 dark:border-gray-700
                                rounded-xl 
                                focus:outline-none focus:ring focus:ring-gray-500/20 focus:border-gray-400/20 
                                placeholder:text-gray-500 dark:placeholder:text-gray-200 
                                backdrop-blur-sm bg-gray-300/20 dark:bg-[#2f3134]
                                transition ease-in-out
                                {{($errors->has('subjects.'.$key.'.grade_id') ? ' border-red-400/20 dark:border-red-400/60 placeholder-red-700 focus:ring-red-500  focus:border-red-500 text-red-500' : null)}}">
                            <option value="">-- Selecciona una opci&oacute;n --</option>
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                        <input
                            wire:model.defer="credits.{{ $key }}.credits"
                            type="number"
                            class="
                                prevenir-envio w-1/3 p-2.5 text-sm 
                                text-gray-700 
                                dark:text-gray-200 
                                border border-gray-300/20 dark:border-gray-700
                                rounded-xl 
                                focus:outline-none focus:ring focus:ring-gray-500/20 focus:border-gray-400/20 
                                placeholder:text-gray-500 dark:placeholder:text-gray-200 
                                backdrop-blur-sm bg-gray-300/20 dark:bg-gray-800/20 
                                transition ease-in-out
                                {{($errors->has('credits.'.$key.'.credits') ? ' border-red-400/20 dark:border-red-400/60 placeholder-red-700 focus:ring-red-500  focus:border-red-500 text-red-500' : null)}}"
                            value=""
                            placeholder="Créditos" 
                            required 
                        >

                        @if ($key === 0)
                            <button type="button" 
                                class="
                                    text-gray-700
                                    dark:text-gray-200
                                    bg-gray-300/20
                                    hover:bg-gray-300/50
                                    focus:outline-none
                                    font-medium
                                    rounded-xl
                                    text-sm
                                    w-auto
                                    sm:w-auto
                                    px-5 py-2.5
                                    text-center 
                                    cursor-pointer transition" wire:click.prevent="addSubject">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-full bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                </svg>
                            </button>
                        @else
                            <button type="button" 
                                class="
                                    text-gray-700
                                    dark:text-gray-200
                                    bg-red-300/60
                                    hover:bg-red-300/80
                                    focus:outline-none
                                    font-medium
                                    rounded-xl
                                    text-sm w-auto
                                    sm:w-auto
                                    px-5 py-2.5
                                    text-center 
                                    cursor-pointer 
                                    transition ease-in-out" wire:click.prevent="removeSubject({{ $key }}, {{ $id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                </svg>
                            </button>
                        @endif           
                    </div>
                    @error('credits.'. $key .'.credits')
                        <small class="text-red-500">{{$message}}</small>
                    @enderror
                    @error('subjects.'. $key .'.grade_id')
                        <small class="text-red-500"> {{$message}}</small>
                    @enderror
                </div>
            @endforeach
        @else
            <div class="w-full">
                <button type="button" class="text-gray-700 dark:text-gray-200 bg-gray-300/20 hover:bg-gray-300/50 focus:outline-none font-medium rounded-xl text-sm w-full px-5 py-2.5 cursor-pointer transition ease-in-out" wire:click.prevent="addSubject">
                    <div class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-full bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg>
                    </div>
                </button>
            </div>
        @endif
    </div>
    @if (session('error'))
        <small class="text-red-500">{{ session('error') }}</small>
    @endif
    <div class="w-full flex justify-end">
        <a href="{{ route('admin.quaters.index') }}" class="font-semibold text-sm text-gray-700 dark:text-gray-200 hover:underline px-5 py-2.5 text-center ">
            <div class="flex space-x-1">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-full bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                </div>
                <span>Regresar</span>
            </div>
        </a>
        <button wire:click.prevent="save()" type="button" class="px-5 py-2.5 text-gray-700 dark:text-gray-200 bg-gray-300/20 hover:bg-gray-300/50 focus:outline-none rounded-2xl text-sm font-bold w-auto text-center cursor-pointer transition ease-in-out">
            <div class="flex space-x-1">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-full bi bi-check2-all" viewBox="0 0 16 16">
                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                    </svg>
                </div>
                <span>Actualizar</span>
            </div>
        </button>
    </div>
</div>
