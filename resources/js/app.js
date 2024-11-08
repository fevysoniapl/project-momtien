import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        // Membuat aplikasi Vue dan menggunakannya bersama plugin Inertia
        return createApp({ render: () => h(App, props) })
            .use(plugin) // Menggunakan plugin Inertia
            .use(ZiggyVue) // Menambahkan ZiggyVue
            .mount(el); // Memasang aplikasi di elemen dengan ID 'app'
    },
    progress: {
        color: '#4B5563',
    },
});
