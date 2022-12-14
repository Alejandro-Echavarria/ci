<div>
    @php
        $route = 'grades';
        $records = $grades;

        $tableHeaders = [
            'Calificaci&oacute;n',
            'Valor',
            'Estado',
            'Creado',
            'Actualizado',
            'Acciones'
        ];

        $tableBody = [
            'name',
            'value',
            'status',
            'created_at',
            'updated_at'
        ];
    @endphp

    <x-admin.tables.table-index :route="$route" :records="$records" :tableheaders="$tableHeaders" :tablebody="$tableBody" />
</div>
