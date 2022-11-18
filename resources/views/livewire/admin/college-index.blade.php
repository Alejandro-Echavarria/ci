<div>
    @php
        $route = 'colleges';
        $records = $colleges;

        $tableHeaders = [
            'Nombre',
            'Estado',
            'Creado',
            'Actualizado',
            'Acciones'
        ];

        $tableBody = [
            'name',
            'status',
            'created_at',
            'updated_at'
        ];
    @endphp

    <x-admin.tables.table-index :route="$route" :records="$records" :tableheaders="$tableHeaders" :tablebody="$tableBody" />
</div>