@props([
    'type' => 'text',
    'name' => '',
    'label' => '',
    'required' => false,
    'placeholder' => '',
    'value' => '',
])

<div class="mb-6">
    @if ($label)
        <label for="{{ $name }}" class="form-label">
            {{ $label }}
            @if ($required)
                <span class="text-[var(--color-accent)]">*</span>
            @endif
        </label>
    @endif
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}"
        placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'form-input']) }}>
</div>
