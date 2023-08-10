<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tiptap Demo</title>

        @vite(['resources/css/app.css', 'resources/js/lexical-test.js'])
    </head>
    <body class="prose prose-invert antialiased text-white bg-gray-900 py-12 max-w-6xl mx-auto sm:px-6 lg:px-8">
        <h1>Lexical Test</h1>
        <div data-scribe-element></div>

        <script>
            window.addEventListener('load', () => {
                const scribeEl = document.querySelector('[data-scribe-element]')
                scribe.setRootElement(scribeEl)

                scribe.update(() => {
                    // Get the RootNode from the EditorState
                    const root = $getRoot();

                    // Get the selection from the EditorState
                    const selection = $getSelection();

                    // Create a new ParagraphNode
                    const paragraphNode = $createParagraphNode();

                    // Create a new TextNode
                    const textNode = $createTextNode('Hello world');

                    // Append the text node to the paragraph
                    paragraphNode.append(textNode);

                    // Finally, append the paragraph to the root
                    root.append(paragraphNode);
                })
            })
        </script>
    </body>
</html>
