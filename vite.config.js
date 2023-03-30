import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
            'resources/js/app.js',
            'resources/js/bootstrap5.js',
            'resources/theme_be/vendor/fontawesome-free/css/all.css',
            'resources/theme_be/css/sb-admin-2.css',
            'resources/theme_be/vendor/jquery/jquery.js',
            'resources/theme_be/vendor/bootstrap/js/bootstrap.bundle.js',
            'resources/theme_be/vendor/jquery-easing/jquery.easing.js',
            'resources/theme_be/js/sb-admin-2.js',
            'resources/theme_be/vendor/chart.js/Chart.js',
            'resources/theme_be/js/demo/chart-area-demo.js',
            'resources/theme_be/js/demo/chart-pie-demo.js',
            'resources/js/sweetalert.js',

            //front
            'resources/theme_fe/css/styles.css',
            'resources/theme_fe/js/scripts.js',

            // filepond
            'resources/js/filepond.js',
            //
            'resources/js/selectaddress.js'

        ],
            refresh: true,
        }),
    ],
});
