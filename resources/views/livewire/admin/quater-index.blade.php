<div>
    @php
        $route = 'quaters';
        $records = $quaters;
    @endphp

    <x-admin.cards.card-index :route="$route" :records="$records" />
</div>
