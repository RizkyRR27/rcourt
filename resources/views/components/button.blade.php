@props([
    'variant' => 'primary',
    'fullWidth' => false,
    'href' => null,
])

@php
    $baseStyles =
        'font-mono font-bold uppercase transition-all duration-200 active:translate-x-[2px] active:translate-y-[2px] active:shadow-none border-2 border-black px-6 py-3 text-sm md:text-base tracking-wider';

    $variants = [
        'primary' =>
            'bg-[var(--color-court-clay)] text-white shadow-hard hover:bg-red-600 hover:shadow-[6px_6px_0px_0px_#000]',
        'secondary' =>
            'bg-[var(--color-court-yellow)] text-black shadow-hard hover:bg-yellow-300 hover:shadow-[6px_6px_0px_0px_#000]',
        'outline' => 'bg-transparent text-black shadow-hard hover:bg-black hover:text-white',
    ];

    $variantClass = $variants[$variant] ?? $variants['primary'];
    $widthClass = $fullWidth ? 'w-full' : '';
    $classes = "$baseStyles $variantClass $widthClass";
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
