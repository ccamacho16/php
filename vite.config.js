import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
/*     server: {
        host: 'lockers.myapp.solutions'
    },   */
/*     server: {
        host: 'piloto.myapp.solutions'
    },    */ 
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
