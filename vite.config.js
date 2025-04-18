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

                //Contact
                'resources/js/contact/index.js',
                'resources/js/contact/reply.js',

                //Supplier
                'resources/js/supplier/index.js',
                'resources/js/supplier/create.js',
                'resources/js/supplier/edit.js',

                //Investment Article
                'resources/js/investmentArticle/index.js',
                'resources/js/investmentArticle/create.js',
                'resources/js/investmentArticle/edit.js',
                //Recruitment
                'resources/js/recruitment/index.js',
                'resources/js/recruitment/create.js',
                'resources/js/recruitment/edit.js',

                //User
                'resources/js/user/index.js',
                'resources/js/user/create.js',
                'resources/js/user/edit.js',

                'resources/js/setting/edit.js'

            ],
            refresh: true,
        }),
    ],
});
