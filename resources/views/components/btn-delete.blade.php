@props([
	'route',
])

<form action="{{ $route }}" method="POST">

    @csrf

    @method('DELETE')

    <button class="btn btn-sm btn-danger" type="submit">{{ $slot }}</button>

</form>
