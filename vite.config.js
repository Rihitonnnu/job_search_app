import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    // server: { // [tl! 追加]
    //     https: true, // [tl! 追加]
    //     host: 'localhost', // [tl! 追加]
    // },
});
