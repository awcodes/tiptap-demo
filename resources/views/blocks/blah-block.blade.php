<div class="flex items-center gap-6">
    <div class="text-5xl">
        @if ($name === 'robin')
            🐤
        @endif

        @if ($name === 'ivy')
            🥀
        @endif
    </div>
    <div>
        <p>Name: {{ $name }}</p>
        <p style="color: {{ $color }};">Color: {{ $color }}</p>
    </div>
</div>
