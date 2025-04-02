import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/JS/frame.js',
                'resources/JS/feed.js',
                'resources/CSS/frame.scss',
                'resources/CSS/feed.scss',
                'resources/CSS/login.scss',
                'resources/CSS/register.scss',
                'resources/CSS/profile.scss',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
