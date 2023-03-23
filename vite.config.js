import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
            'resources/js/app.js',
            'resources/js/bootstrap5.js',
            'resources/theme/vendor/fontawesome-free/css/all.css',
            'resources/theme/css/sb-admin-2.css',
            'resources/theme/vendor/jquery/jquery.js',
            'resources/theme/vendor/bootstrap/js/bootstrap.bundle.js',
            'resources/theme/vendor/jquery-easing/jquery.easing.js',
            'resources/theme/js/sb-admin-2.js',
            'resources/theme/vendor/chart.js/Chart.js',
            'resources/theme/js/demo/chart-area-demo.js',
            'resources/theme/js/demo/chart-pie-demo.js',
            'resources/js/sweetalert.js'
        ],
            refresh: true,
        }),
    ],
});
