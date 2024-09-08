import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/rateTW.css', 'resources/js/app.js', 'resources/js/finish.js',  'resources/js/care.js', 'resources/js/stars.js'],
            refresh: true,
        }),
    ],
});
