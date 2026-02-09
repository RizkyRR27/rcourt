@props([
    'variant' => 'primary', // primary, accent, outline, ghost
    'size' => 'md', // sm, md, lg
    'href' => null,
    'type' => 'button',
    'disabled' => false,
])

@php
    $classes = 'btn btn-' . $variant . ' btn-' . $size;
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
