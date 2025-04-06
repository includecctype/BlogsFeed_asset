import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    base: '/',
    build: {
        outDir: 'public/build',
    },
    plugins: [
        laravel({
            input: [
                'resources/css/feed.css',
                'resources/css/frame.css',
                'resources/css/login.css',
                'resources/css/register.css',
                'resources/js/feed.js',
                'resources/js/frame.js'
            ],
            refresh: true,
        }),
        // tailwindcss(),
    ],
});
