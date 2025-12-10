@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium font-text text-lg text-white']) }}>
    {{ $value ?? $slot }}
</label>
