<?php

namespace App\TiptapExtensions;

use Tiptap\Core\Node;
use Tiptap\Utils\HTML;

class Hero extends Node
{
    public static $name = 'hero';

    public function addOptions(): array
    {
        return [
            'colors' => [
                'gray_light',
                'gray',
                'gray_dark',
                'primary',
                'secondary',
                'tertiary',
                'accent',
            ],
            'HTMLAttributes' => [
                'class' => 'hero-block',
            ],
        ];
    }

    public function addAttributes(): array
    {
        return [
            'color' => [
                'default' => null,
                'parseHTML' => function ($DOMNode) {
                    return $DOMNode->getAttribute('data-color') ?: null;
                },
                'renderHTML' => function ($attributes) {
                    if (! property_exists($attributes, 'color')) {
                        return [];
                    }

                    return [
                        'data-color' => $attributes->color,
                    ];
                },
            ],
        ];
    }

    public function parseHTML(): array
    {
        return [
            [
                'tag' => 'div',
                'getAttrs' => function ($DOMNode) {
                    return str_contains($DOMNode->getAttribute('class'), 'hero-block');
                },
            ],
        ];
    }

    public function renderHTML($node, $HTMLAttributes = []): array
    {
        return [
            'div',
            HTML::mergeAttributes($this->options['HTMLAttributes'], $HTMLAttributes),
            0,
        ];
    }
}
