<form method="GET" action="{{ route('products.index') }}" class="mb-3">

    <div class="row">

        <div class="col-6">
            <div class="form-group">
                <label for="">Pesquisa</label>
                <input type="search" name="search" class="form-control" value="{{ Request::get('search') }}">
            </div>
        </div>

        <div class="col-3">
                <x-limit></x-limit>
        </div>


        <div class="col-3">

            @php
                $sortList = [
                    'id' => 'Id',
                    'name' => 'Nome',
                    'description' => 'Descrição',
                    'price' => 'Preço',
                    'current_stock' => 'Quantidade no estoque',
                    'created_at' => 'Dt. criação'
                ];
            @endphp

            <x-sort
                :list="$sortList"
            ></x-sort>

        </div>

    </div>

    <div class="buttons d-flex mt-2">

        <a class="btn btn-sm btn-secondary me-2" href="{{ route('products.index') }}">Limpar filtros</a>

        <button class="btn btn-sm btn-primary" type="submit">Atualizar</button>

    </div>

</form>
