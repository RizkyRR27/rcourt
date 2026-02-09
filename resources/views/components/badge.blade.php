@props([
    'variant' => 'success', // success, danger, warning
])

@php
    $classes = 'badge badge-' . $variant;
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
