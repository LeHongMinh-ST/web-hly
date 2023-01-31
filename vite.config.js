import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/init.js',
                'resources/js/login/index.js',

                //Post
                'resources/js/post/index.js',
                'resources/js/post/create.js',
                'resources/js/post/edit.js',
            ],
            refresh: true,
        }),
    ],
});
