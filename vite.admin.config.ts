import {defineConfig} from 'vite'
//@ts-ignore
import tailwindcss from 'tailwindcss'
import autoprefixer from 'autoprefixer'
import laravel from 'vite-plugin-laravel'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            postcss: [
                tailwindcss('./tailwind/tailwind.admin.config.js'),
                autoprefixer(),
            ],
        }),
    ],
})
