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

                //Category
                'resources/js/category/index.js',
                'resources/js/category/create.js',
                'resources/js/category/edit.js',

                //Role
                'resources/js/role/index.js',
                'resources/js/role/create.js',
                'resources/js/role/edit.js',

                //User
                'resources/js/user/index.js',
                'resources/js/user/profile.js',

                'resources/js/recruitment/index.js',
                'resources/js/recruitment/create.js',
                'resources/js/setting/edit.js',

                //Role
                'resources/js/contact/index.js',
                'resources/js/contact/create.js',
            ],
            refresh: true,
        }),
    ],
});
