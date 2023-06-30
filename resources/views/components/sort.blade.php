@php

    $list = [];

        foreach ($columns as $key => $value) {

            array_push($list,
            ['value' => $key. '.asc', 'text' => $value.' crescente'],
            ['value' => $key. '.desc', 'text' => $value.' decrescente'],
        );
    }

    $selected = Request::get('sort', $list[0]['value']);

@endphp

<div class="form-group">

    <label for="">Ordenação</label>

    <select name="sort" id="" class="form-select">

        @foreach ($list as $item)

            <option value="{{ $item['value'] }}" {{$item['value'] == $selected ? 'selected' : ''}} >{{ $item['text'] }}</option>

        @endforeach

    </select>

</div>
