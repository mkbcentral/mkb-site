@props(['active'])

@php
    $classes = ($active ?? false)
                ? ''
                : 'nav-link text-blue-400 hover:text-blue-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
