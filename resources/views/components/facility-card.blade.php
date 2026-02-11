@props([
    'icon' => '',
    'title' => '',
    'description' => '',
    'count' => 0,
    'sport' => 'badminton', // badminton, futsal, basketball, soccer, outdoor
])

@php
    $sportColors = [
        'badminton' => ['accent' => 'accent-badminton', 'text' => 'text-[var(--color-sport-badminton)]'],
        'futsal' => ['accent' => 'accent-futsal', 'text' => 'text-[var(--color-sport-futsal)]'],
        'basketball' => ['accent' => 'accent-basketball', 'text' => 'text-[var(--color-sport-basketball)]'],
        'soccer' => ['accent' => 'accent-soccer', 'text' => 'text-[var(--color-sport-soccer)]'],
        'outdoor' => ['accent' => 'accent-outdoor', 'text' => 'text-[var(--color-sport-outdoor)]'],
    ];
    $colors = $sportColors[$sport] ?? $sportColors['badminton'];
@endphp

<div class="card card-interactive p-6 {{ $colors['accent'] }}" {{ $attributes }}>
    <div class="flex items-start justify-between mb-3">
        <span class="text-3xl">{{ $icon }}</span>
    </div>
    <h3 class="text-lg font-bold mb-2" style="font-family: var(--font-display);">{{ $title }}</h3>
    <p class="text-muted text-sm leading-relaxed mb-4">{{ $description }}</p>
    <div class="flex items-baseline gap-2">
        <span class="text-4xl font-bold {{ $colors['text'] }}">{{ $count }}</span>
        <span class="text-muted text-sm">Lapangan</span>
    </div>
</div>
