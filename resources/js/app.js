import '../css/app.css'
import './bootstrap'

import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { createApp, h } from 'vue'
import { ZiggyVue } from '../../vendor/tightenco/ziggy'

import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'

import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { createVuetify } from 'vuetify'

import navTo from "@/directives/navTo.js"

const vuetify = createVuetify({
    components,
    directives,

    theme: {
        defaultTheme: 'simrsDark',
        themes: {
            simrsDark: {
                dark: true,
                colors: {
                    background: '#020617',
                    surface: '#0b1220',
                    primary: '#3b82f6',
                    secondary: '#1e293b',
                    error: '#ef4444',
                    info: '#38bdf8',
                    success: '#22c55e',
                    warning: '#f59e0b',

                    'on-background': '#e5e7eb',
                    'on-surface': '#e5e7eb',
                },
            },
        },
    },
})

const appName = import.meta.env.VITE_APP_NAME || 'Laravel'

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(vuetify)
            .directive('to', navTo)
            .mount(el)
    },
    progress: {
        color: '#3b82f6',
    },
})
