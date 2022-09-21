<div>
    <div class="grid grid-cols-1 sm:grid-cols-1 gap-3 mb-3">
        <div class="">
            @foreach ($subjects as $key =>  $subject)
                <div class="flex gap-3 mb-3">
                    <div class="flex">
                        <p class="block text-sm font-medium text-gray-900 dark:text-gray-300 place-self-center">Materia&nbsp;-&nbsp;{{ $key+1 }}</p>
                    </div>
                    <select name="subjects[{{ $key }}]" id="" class="w-full p-2.5 text-sm text-gray-700 border-1 dark:border-gray-600 text-white-500 rounded-xl shadow-sm focus:outline-none dark:text-white-400 dark:placeholder:text-white-600 dark:bg-gray-700 dark:text-white transition ease-in-out">
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                        @endforeach
                    </select>
                    @if ($key === 0)
                        <button type="button" class="text-white color-secundario focus:outline-none font-medium rounded-xl text-sm w-auto sm:w-auto px-5 py-2.5 text-center cursor-pointer" wire:click.prevent="addSubject">+</button>
                    @else
                        <button type="button" class="text-white focus:outline-none font-medium rounded-xl text-sm w-auto sm:w-auto px-5 py-2.5 text-center red-color cursor-pointer" wire:click.prevent="removeSubject({{ $key }})">-</button>
                    @endif           
                </div>
                @error('subjects[0]')
                    <small class="text-red-500">{{$message}}</small>
                @enderror
            @endforeach
        </div>
    </div>
</div>
