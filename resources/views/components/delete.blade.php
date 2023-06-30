<form action="{{url($url)}}" method="POST">

    @csrf

    @method('DELETE')

    <input type="hidden" name="id" value="{{ $id ?? ''}}">

    <button class="btn btn-sm btn-danger" type="submit">{{ $text }}</button>

</form>
