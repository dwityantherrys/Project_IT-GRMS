import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        port : 5173,
        hmr: {
            
            host: '192.168.22.90'
        },
    },
    build: {
        outDir: 'dist',  // Make sure the build output goes to the 'dist' directory
    }, //tst
});