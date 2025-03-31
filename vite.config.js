import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/JS/navbar.js', 'resources/CSS/navbar.scss'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
