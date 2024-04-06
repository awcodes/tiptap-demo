import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/filament/admin/theme.css",
                "resources/css/test/test.css",
                "resources/js/app.js",
                'resources/js/tiptap/extensions.js',
                'resources/css/tiptap/extensions.css',
            ],
            refresh: true,
        }),
    ],
});
