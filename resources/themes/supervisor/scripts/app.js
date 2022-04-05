import './bootstrap';

import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/inertia-vue3'
import {importPageComponent} from '@/vite/import-page-component'
import {InertiaProgress} from '@inertiajs/progress';
import registerVueComponents from "./Misc/register-vue-components";
import PrimeVue from 'primevue/config';
import ToastService from 'primevue/toastservice';

import '@resources/css/tailwind.css';
import 'primevue/resources/themes/tailwind-light/theme.css';
import 'primevue/resources/primevue.min.css';
import 'primeicons/primeicons.css';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';


InertiaProgress.init()

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => importPageComponent(name, import.meta.glob('./Pages/**/*.vue')),
    setup({el, app, props, plugin}) {
        let vueApp = createApp({render: () => h(app, props)});
        vueApp.use(plugin);
        vueApp = registerVueComponents(vueApp);

        return vueApp
            .use(PrimeVue)
            .use(ToastService)
            .use(store)
            .mixin({methods: {route}})
            .mount(el);
    },
})
