import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/adminlte/adminlte/plugins//app.adminlte/adminlte/plugins/', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
