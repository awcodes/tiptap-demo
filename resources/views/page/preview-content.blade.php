<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        @vite(['resources/css/app.css'])
    </head>
    <body class="antialiased text-white bg-gray-900">
        <main class="prose prose-invert antialiased text-white bg-gray-900 py-8 px-4 max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if ($content)
                {!! tiptap_converter()->mergeTagsMap([
                        'name' => 'test',
                        'email' => 'test@example.com',
                        'phone' => '(912) 867-5309'
                    ])->asHTML($content) !!}
            @endif
        </main>
    </body>
</html>
