<div>
    @php
        $route = 'quaters';
        $records = $quaters;
    @endphp
    {{-- <button onclick="prueba2()">
        a
    </button> --}}

    <x-admin.cards.card-index :route="$route" :records="$records" />
    <script>
        const prueba = async () => {

            let prueba = await @this.render();
        }        
    </script>
</div>
