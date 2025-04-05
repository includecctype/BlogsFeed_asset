import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/CSS/feed.css',
                'resources/CSS/frame.css',
                'resources/CSS/login.css',
                'resources/CSS/register.css',
                'resources/JS/feed.js',
                'resources/JS/frame.js'
            ],
            refresh: true,
        }),
        // tailwindcss(),
    ],
});
