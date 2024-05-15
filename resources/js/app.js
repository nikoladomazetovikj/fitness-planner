import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import {createVuetify} from "vuetify";
import {components, directives} from "vuetify/dist/vuetify.js";

createInertiaApp({

    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        const vuetify = createVuetify({
            components,
            directives,
            theme: {
                defaultTheme: 'dark'
            }
        })
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(vuetify)
            .mount(el)
    },
})
