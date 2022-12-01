@props(['route', 'records', 'tableheaders', 'tablebody'])

<div class="mb-8 justify-end">
    <div class="flex w-full justify-between aling">
        <x-admin.buttons.button-index :route="$route" />
        <x-admin.inputs.search-index />
    </div>
</div>
<div class="overflow-x-auto rounded-2xl border dark:border-black/50 overflow-hidden">
    <table class="w-full text-sm text-left">
        <thead class="sm:backdrop-blur-sm bg-gray-300/20 text-gray-700 dark:text-gray-200">
            <tr>
                @foreach ($tableheaders as $tableheader)
                    <th scope="col" class="py-3 px-6">{!! $tableheader !!}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
        @if (count($records))
            @foreach ($records as $key => $record)
                @if ($record->status !== '0')
                    <tr class="border-b hover:bg-gray-300/20 dark:border-black/50 dark:hover:bg-gray-300/20 transition">
                        @foreach ($tablebody as $key => $item)
                            @if ('status' === $tablebody[$key])
                                <td class="py-4 px-6">
                                    @if ($record[$tablebody[$key]] == '1')
                                        <span class="rounded-full green-color text-xs px-2 font-bold">Activo</span>
                                    @else
                                        <span class="rounded-full red-color text-xs px-2 font-bold">Inactivo</span>
                                    @endif
                                </td>
                            @else
                                @if ($key === 0)    
                                    <th scope="row" class="py-4 px-6 font-semibold text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                        {{$record[$tablebody[$key]]}}
                                    </th>
                                @else
                                    <td class="py-4 px-6 font-semibold text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                        {{$record[$tablebody[$key]]}}
                                    </td>
                                @endif
                            @endif
                        @endforeach
                        <td class="py-4 px-6">
                            <a href="{{ route('admin.'. $route .'.edit', $record) }}" class="font-semibold text-blue-500 hover:underline">Editar</a>
                        </td>
                    </tr>
                @endif
            @endforeach
            @else
                <tr class="border-b dark:border-gray-700">
                    <td colspan="6" class="py-4 px-6 sm:text-center text-red-400">
                        No existe ning&uacute;n registro...
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
<div class="mt-8">
    {{ $records->links('vendor.livewire.tailwind') }}
</div>