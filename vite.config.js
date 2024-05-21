import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    alias: {
        'ziggy-js': path.resolve('vendor/tightenco/ziggy/dist/vue.es.js'),
    },
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/css/app.css'],
            refresh: true,
        }),
        vue({
            resolve: name => {
                const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
                return pages[`./Pages/${name}.vue`]
            },
        }),
    ],
});
