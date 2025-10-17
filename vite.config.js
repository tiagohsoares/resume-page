import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/js/app.css'],
            refresh: [
                'storage/resumes/resume.json',
            ],
        }),
        tailwindcss(),
    ],
    server: { 

        hmr: {

            host: 'localhost',

        },

    }, 
});


