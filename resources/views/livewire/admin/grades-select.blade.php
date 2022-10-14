<div>
    <div class="grid grid-cols-1 sm:grid-cols-1 gap-3 mb-3">
        @if (session('info'))
            <x-admin.alerts.alerts :message="session('info')" :type="'red-color'" />
        @endif
        <div>
            <label 
                for="name" 
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                Nombre<span class="text-red-500"> *</span>
            </label>
            <input
                wire:model.debounce.300ms="name"
                type="text" 
                id="name" 
                name="name" 
                class="prevenir-envio w-full p-2.5 text-sm text-gray-700 border-1 text-white-500 rounded-xl shadow-sm focus:outline-none dark:text-white-400 dark:placeholder:text-gray-400 dark:bg-gray-700 dark:text-white transition ease-in-out {{($errors->has('name') ? ' border-red-400 text-red-900 placeholder-red-700 focus:ring-red-500  focus:border-red-500 dark:text-red-500 dark:placeholder-red-500' : null)}}"
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
                        <p class="block text-sm font-medium text-gray-900 dark:text-gray-300 place-self-center">Materia&nbsp;-&nbsp;{{ $key+1 }}</p>
                    </div>
                    <select id="subjects[{{$key}}]" name="subjects[]" wire:model="subjects.{{$key}}" class="w-full p-2.5 text-sm text-gray-700 border-1 dark:border-gray-600 text-white-500 rounded-xl shadow-sm focus:outline-none dark:text-white-400 dark:placeholder:text-white-600 dark:bg-gray-700 dark:text-white transition ease-in-out {{($errors->has('subjects.'.$key) ? ' border-red-400 text-red-900 placeholder-red-700 focus:ring-red-500  focus:border-red-500 dark:text-red-500 dark:placeholder-red-500' : null)}}">
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
                        class="prevenir-envio w-1/3 p-2.5 text-sm text-gray-700 border-1 text-white-500 rounded-xl shadow-sm border-1 focus:outline-none dark:text-white-400 dark:placeholder:text-gray-400 dark:bg-gray-700 dark:text-white transition ease-in-out {{($errors->has('credits.'.$key) ? ' border-red-400 text-red-900 placeholder-red-700 focus:ring-red-500  focus:border-red-500 dark:text-red-500 dark:placeholder-red-500' : null)}}"
                        value="0"
                        placeholder="Créditos" 
                        required 
                    >

                    @if ($key === 0)
                        <button type="button" class="text-white color-secundario focus:outline-none font-medium rounded-xl text-sm w-auto sm:w-auto px-5 py-2.5 text-center cursor-pointer dark:hover:bg-blue-700 transition ease-in-out" wire:click.prevent="addSubject">+</button>
                    @else
                        <button type="button" class="text-white focus:outline-none font-medium rounded-xl text-sm w-auto sm:w-auto px-5 py-2.5 text-center red-color cursor-pointer dark:hover:bg-red-300 transition ease-in-out" wire:click.prevent="removeSubject({{ $key }})">-</button>
                    @endif           
                </div>
                @error('credits.'. $key)
                    <small class="text-red-500">{{$message}}</small>
                @enderror
                @error('subjects.'. $key)
                    <small class="text-red-500">{{$message}}</small>
                @enderror
            </div>
        @endforeach
    </div>
    @if (session('info'))
        <small class="text-red-500">{{ session('info') }}</small>
    @endif
    <div class="w-full flex justify-end">
        <a href="{{ route('admin.quaters.index') }}" class="font-medium text-sm text-white hover:underline px-5 py-2.5 text-center">Regresar</a>
        <button wire:click="save()" type="button" class="text-white color-secundario focus:outline-none font-medium rounded-xl text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:hover:bg-blue-700 cursor-pointer">
            Crear
        </button>
    </div>
    <div>
        {{ var_dump($gradePoint) }}
    </div>
</div>
{{-- <script>
    @json($gradePoint);
</script> --}}