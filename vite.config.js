import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/JS/frame.js',
                'resources/CSS/frame.scss',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
