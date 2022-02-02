require('./bootstrap');

import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/inertia-vue3';
import {InertiaProgress} from '@inertiajs/progress';
import registerVueComponents from "./Misc/register-vue-components";
import PrimeVue from 'primevue/config';
import ToastService from 'primevue/toastservice';
import store from './store';

import 'primevue/resources/themes/tailwind-light/theme.css';
import 'primevue/resources/primevue.min.css';
import 'primeicons/primeicons.css';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({el, app, props, plugin}) {
        let vueApp = createApp({render: () => h(app, props)});
        vueApp = registerVueComponents(vueApp);

        return vueApp
            .use(plugin)
            .use(PrimeVue)
            .use(ToastService)
            .use(store)
            .mixin({methods: {route}})
            .mount(el);
    },
});

InertiaProgress.init({color: '#4B5563'});
