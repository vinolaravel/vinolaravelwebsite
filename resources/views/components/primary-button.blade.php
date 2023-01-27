<button {{ $attributes->merge(['type' => 'submit']) }} class="myButton">
    {{ $slot }}
</button>
