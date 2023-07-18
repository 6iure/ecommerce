@props([
    'list' => []
])

<div class="form-group">

    <label for="">Upload de imagens</label>

    <div class="row">

        <div class="col-6">

            <select name="images_column" id="" class="form-select">

                @foreach ($list as $value =>$label )

                    <option value="{{ $value }}"  {{ $value == Request::get('images_column') ? 'selected' : '' }}> {{ $label }} </option>

                @endforeach

            </select>

        </div>

        <div class="col-6">

            <select name="images_direction" id="" class="form-select">



            </select>

        </div>

    </div>


</div>
