const mix = require('laravel-mix');

mix.js('resources/admin/js/app.js', 'public/modules/admin/js').vue()
    .postCss('resources/admin/css/app.css', 'public/modules/admin/css', [
        require('postcss-import'),
        require('tailwindcss')('./tailwind/admin/tailwind.config.js'),
    ])
    .webpackConfig(require('./webpack.config'))
    .mergeManifest();

if (mix.inProduction()) {
    mix.version();
}
