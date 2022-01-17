const mix = require('laravel-mix');

mix.js('resources/js/front/app.js', 'public/js/front').vue()
    .postCss('resources/css/front/app.css', 'public/css/front', [
        require('postcss-import'),
        require('tailwindcss')('./tailwind/front/tailwind.config.js'),
    ])
    .webpackConfig(require('./webpack.config'))
    .mergeManifest();

mix.copyDirectory('resources/assets/front', 'public/assets/front')

if (mix.inProduction()) {
    mix.version();
}
