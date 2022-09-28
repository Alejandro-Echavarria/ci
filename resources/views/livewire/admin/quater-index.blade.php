<div>
    @php
        $route = 'quaters';
        $records = $quaters;
    @endphp

    @if (session('info'))
        <x-admin.alerts.alerts :message="session('info')" :type="'green-color'" />
    @endif
    <x-admin.cards.card-index :route="$route" :records="$records" />
    <script>
        const reloadIndex = async () => {

            const render = await @this.render();
        }        
    </script>
</div>
