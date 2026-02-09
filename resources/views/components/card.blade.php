@props([
    'padding' => 'p-6',
    'interactive' => false,
])

@php
    $classes = 'card ' . $padding;
    if ($interactive) {
        $classes .= ' card-interactive';
    }
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
