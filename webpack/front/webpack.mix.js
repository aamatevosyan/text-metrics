const mix = require('laravel-mix');

mix.js('resources/front/js/app.js', 'public/modules/front/js').vue()
    .postCss('resources/front/css/app.css', 'public/modules/front/css', [
        require('postcss-import'),
        require('tailwindcss')('./tailwind/front/tailwind.config.js'),
    ])
    .webpackConfig(require('./webpack.config'))
    .mergeManifest();

if (mix.inProduction()) {
    mix.version();
}
