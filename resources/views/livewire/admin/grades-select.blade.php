<div>
    <div class="grid grid-cols-1 sm:grid-cols-1 gap-3 mb-3">
        @if (session('info'))
            <x-admin.alerts.alerts :message="session('info')" :type="'red-color'" />
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
                    prevenir-envio w-full p-2.5 text-sm 
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
        @foreach ($subjects as $key =>  $subject)
            <div>
                <div class="flex gap-3">
                    <div class="flex">
                        <p class="block text-base font-bold text-gray-700 dark:text-gray-200 place-self-center"><span class="hidden-letters">Materia&nbsp;-&nbsp;</span>{{ $key+1 }}</p>
                    </div>
                    <select id="subjects[{{$key}}]" name="subjects[]" wire:model.defer="subjects.{{$key}}" 
                        class="
                            prevenir-envio w-full p-2.5 
                            text-gray-700 
                            dark:text-gray-200 
                            border border-gray-300/20 dark:border-gray-700
                            rounded-xl 
                            focus:outline-none focus:ring focus:ring-gray-500/20 focus:border-gray-400/20 
                            placeholder:text-gray-500 dark:placeholder:text-gray-200 
                            backdrop-blur-sm bg-gray-300/20 dark:bg-black/80
                            transition ease-in-out 
                            {{($errors->has('subjects.'.$key) ? ' border-red-400/20 dark:border-red-400/60 placeholder-red-700 focus:ring-red-500  focus:border-red-500 text-red-500' : null)}}">
                        <option value="">-- Selecciona una opci&oacute;n --</option>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                        @endforeach
                    </select>
                    <input
                        id="credits[{{$key}}]"
                        name="credits[]"
                        wire:model="credits.{{$key}}"
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
                            {{($errors->has('credits.'.$key) ? ' border-red-400/20 dark:border-red-400/60 placeholder-red-700 focus:ring-red-500  focus:border-red-500 text-red-500' : null)}}"
                        value="0"
                        placeholder="Créditos" 
                        required
                    >

                    @if ($key === 0)
                        <button type="button" class="text-white color-secundario focus:outline-none font-medium rounded-xl text-sm w-auto sm:w-auto px-5 py-2.5 text-center cursor-pointer hover:bg-blue-700 transition ease-in-out" wire:click.prevent="addSubject">+</button>
                    @else
                        <button type="button" class="text-white focus:outline-none font-medium rounded-xl text-sm w-auto sm:w-auto px-5 py-2.5 text-center red-color cursor-pointer dark:hover:bg-red-300 transition ease-in-out" wire:click.prevent="removeSubject({{ $key }})">-</button>
                    @endif           
                </div>
                @error('credits.'. $key)
                    <small class="text-red-500">{{$message}}</small>
                @enderror
                @error('subjects.'. $key)
                    <small class="text-red-500">{{ $message}}</small>
                @enderror
            </div>
        @endforeach
    </div>
    @if (session('info'))
        <small class="text-red-500">{{ session('info') }}</small>
    @endif
    <div class="w-full flex justify-end">
        <a href="{{ route('admin.quaters.index') }}" class="font-semibold text-sm text-gray-700 dark:text-gray-200 hover:underline px-5 py-2.5 text-center">Regresar</a>
        <button wire:click="save()" type="button" class="text-white color-secundario focus:outline-none font-medium rounded-xl text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:hover:bg-blue-700 cursor-pointer">
            Crear
        </button>
    </div>
</div>