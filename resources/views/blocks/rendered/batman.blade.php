<div class="flex items-center gap-6 not-prose bg-gray-700 p-6 rounded-xl">
    <div class="text-3xl w-12 h-12 grid place-content-center rounded-full bg-black p-4">
        @php
            echo match($name) {
                'robin' => '🐤',
                'ivy' => '🥀',
                'joker' => '🤡',
                default => '🦇'
            }
        @endphp
    </div>
    <div>
        <p>Name: {{ $name }}</p>
        <p style="color: {{ $color }};">Color: {{ $color }}</p>
        <p>Side: {{ $side ?? 'Good' }}</p>
    </div>
</div>
