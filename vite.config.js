import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
export default defineConfig(
    {
        build:
            {
                outDir: 'public_html/build',
            },
        plugins: [
            laravel({
                input: 'resources/js/app.js',
                publicDirectory: 'public_html',
            }),
        ],
    });
