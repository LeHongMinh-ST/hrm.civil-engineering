import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/auth/login/index.js',

                'resources/js/user/create.js',
                'resources/js/user/index.js',

                'resources/js/worker/create.js',
                'resources/js/worker/index.js'
            ],
            refresh: [
                'resources/routes/**',
                'routes/**',
                'resources/views/**',
            ],
        }),
    ],
});
