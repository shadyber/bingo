/*
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
*/
 let mix=require('laravel-mix')
.js('resources/js/app.js','public_html/js')
.postCss('resources/css/app.css','public_html/css')
