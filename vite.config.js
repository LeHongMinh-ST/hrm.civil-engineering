import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/js/auth/login/index.js',

                'resources/js/user/create.js',
                'resources/js/user/index.js',

                'resources/js/worker/create.js',
                'resources/js/worker/index.js',

                'resources/js/attendances/AttendanceBoard/index.js'
            ],
            refresh: [
                'resources/routes/**',
                'routes/**',
                'resources/views/**',
            ],
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
    build: {
        sourcemap: true,
    },
});
