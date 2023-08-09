import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
 
export default defineConfig({

    build: {
        target: 'esnext',
        chunkSizeWarningLimit: 1024
    },

    plugins: [
    
        laravel([
            'resources/js/app.js',
            'resources/css/app.css'
        ]),
    
        vue({
    
            template: {
    
                transformAssetUrls: {
    
                    // The Vue plugin will re-write asset URLs, when referenced
                    // in Single File Components, to point to the Laravel web
                    // server. Setting this to `null` allows the Laravel plugin
                    // to instead re-write asset URLs to point to the Vite
                    // server instead.
                    base: null,
 
                    // The Vue plugin will parse absolute URLs and treat them
                    // as absolute paths to files on disk. Setting this to
                    // `false` will leave absolute URLs un-touched so they can
                    // reference assets in the public directory as expected.
                    includeAbsolute: false,
    
                },
    
            },
    
        }),
    
    ],

    resolve: {
        alias: {
            '@': '/resources',
            '@js': '/resources/js',
            '@css': '/resources/css',
            '@json': '/resources/json',
            '@app': '/resources/vue/app',
            '@router': '/resources/vue/router',
            '@vuex': '/resources/vue/vuex',
            '@models': '/resources/vue/app/sections/admin/models',
        }
    }

});