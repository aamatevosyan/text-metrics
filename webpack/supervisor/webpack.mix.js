const mix = require('laravel-mix');

mix.js('resources/supervisor/js/app.js', 'public/modules/supervisor/js').vue()
    .postCss('resources/supervisor/css/app.css', 'public/modules/supervisor/css', [
        require('postcss-import'),
        require('tailwindcss')('./tailwind/supervisor/tailwind.config.js'),
    ])
    .webpackConfig(require('./webpack.config'))
    .mergeManifest();

if (mix.inProduction()) {
    mix.version();
}
