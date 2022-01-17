const mix = require('laravel-mix');

mix.js('resources/js/supervisor/app.js', 'public/js/supervisor').vue()
    .postCss('resources/css/supervisor/app.css', 'public/css/supervisor', [
        require('postcss-import'),
        require('tailwindcss')('./tailwind/supervisor/tailwind.config.js'),
    ])
    .webpackConfig(require('./webpack.config'))
    .mergeManifest();

mix.copyDirectory('resources/assets/supervisor', 'public/assets/supervisor')

if (mix.inProduction()) {
    mix.version();
}
