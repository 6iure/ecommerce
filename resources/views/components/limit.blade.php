@php
    $list = [10, 25, 50, 100];
    $selected = Request::get('limit', $list[0]);

@endphp

<div class="form-group">
    <label for="">Registros por página </label>

    <select name="limit" id="" class="form-select">

        @foreach ($list as $value)
            <option value="{{ $value }}"{{ $value == $selected ? 'selected' : ''}}>{{ $value }}</option>
        @endforeach

    </select>

</div>
