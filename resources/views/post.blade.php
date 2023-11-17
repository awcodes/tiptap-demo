@php
    $page = \App\Models\Post::first();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tiptap Demo</title>

        @vite(['resources/css/app.css'])
    </head>
    <body class="prose prose-invert antialiased text-white bg-gray-900 py-12 max-w-6xl mx-auto sm:px-6 lg:px-8">
        <h1>{{ $page->title }}</h1>
        @if ($page->content)
            {!! tiptap_converter()->asHTML($page->content) !!}
        @endif
    </body>
</html>
