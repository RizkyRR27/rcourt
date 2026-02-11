@props([
    'title' => '',
    'subtitle' => '',
    'ctaText' => null,
    'ctaHref' => null,
    'compact' => false,
])

<header class="surface-primary {{ $compact ? 'pt-24 pb-12' : 'pt-32 pb-20' }} px-6">
    <div class="container-app text-center">
        <h1 class="text-white mb-4 animate-fade-in">{{ $title }}</h1>
        @if ($subtitle)
            <p class="text-lg md:text-xl text-[var(--color-text-light)] max-w-2xl mx-auto mb-8 leading-relaxed animate-fade-in"
                style="animation-delay: 100ms;">
                {{ $subtitle }}
            </p>
        @endif
        @if ($ctaText && $ctaHref)
            <div class="animate-fade-in" style="animation-delay: 200ms;">
                <x-button variant="accent" size="lg" :href="$ctaHref">
                    {{ $ctaText }}
                </x-button>
            </div>
        @endif
        {{ $slot }}
    </div>
</header>
