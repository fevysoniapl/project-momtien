import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js', // Pastikan input ini sesuai dengan jalur file JavaScript utama Anda
            refresh: true, // Memastikan halaman akan segar secara otomatis saat ada perubahan
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null, // Membiarkan base URL menjadi null jika Anda ingin URL asset bersifat relatif
                    includeAbsolute: false, // Tidak mengikutkan URL absolut pada asset yang disertakan
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js', // Alias untuk mempermudah impor file dari folder js
        },
    },
});
