import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/pages/blog.css',
                'resources/theme/FlexStart/css/style.css',
                'resources/theme/FlexStart/js/main.js',
                'resources/js/app.js',
                'resources/js/pages/admin/blog.js',
                'resources/js/pages/admin/project.js',
            ],
            refresh: true,
        }),
        {
            name: 'blade',
            handleHotUpdate({ file, server }) {
                if (file.endsWith('.blade.php')) {
                    server.ws.send({
                        type: 'full-reload',
                        path: '*',
                    });
                }
            },
        }
    ],
    server: {
        host: 'vite.mjproduct.test'
    }
});
