@props([
    'list' => []
])

<div class="form-group">

    <label for="">Ordenação</label>

    <div class="row">

        <div class="col-6">

            <select name="sort_column" id="" class="form-select">
        
                @foreach ($list as $value => $label)
        
                    <option value="{{ $value }}" {{ $value == Request::get('sort_column') ? 'selected' : ''}} >{{ $label }}</option>
        
                @endforeach
        
            </select>

        </div>

        <div class="col-6">

            <select name="sort_direction" id="" class="form-select">

                <option value="asc" {{ Request::get('sort_direction') == 'asc' ? 'selected' : '' }}>Crescente</option>

                <option value="desc" {{ Request::get('sort_direction') == 'desc' ? 'selected' : '' }}>Decescente</option>
        
            </select>

        </div>

    </div>


</div>
