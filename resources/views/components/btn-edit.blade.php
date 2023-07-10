@props([
	'route',
])

<a class="btn btn-sm btn-primary" href="{{ $route }}">{{ $slot }}</a>