@props([
    'name' => '',
    'label' => '',
    'required' => false,
    'options' => [],
    'placeholder' => '-- Pilih --',
    'selected' => '',
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
    <select name="{{ $name }}" id="{{ $name }}" {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'form-input']) }}>
        <option value="" disabled {{ !$selected ? 'selected' : '' }}>{{ $placeholder }}</option>
        @foreach ($options as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
</div>
