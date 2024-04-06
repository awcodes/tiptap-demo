<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tiptap Demo</title>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        @filamentStyles
        @vite('resources/css/test/test.css')
    </head>
    <body class="antialiased text-white bg-gray-900 py-12 max-w-6xl mx-auto sm:px-6 lg:px-8">
        @livewire('test-component')
        @livewire('tiptap-modals')
        @filamentScripts
        @vite('resources/js/app.js')
    </body>
</html>
