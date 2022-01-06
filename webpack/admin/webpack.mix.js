const mix = require('laravel-mix');

mix.js('resources/js/admin/app.js', 'public/js/admin').vue()
  .postCss('resources/css/admin/app.css', 'public/css/admin', [
    require('postcss-import'),
    require('tailwindcss')('./tailwind/admin/tailwind.config.js'),
  ])
  .webpackConfig(require('./webpack.config'))
  .mergeManifest();

mix.copyDirectory('resources/assets/admin', 'public/assets/admin')

if (mix.inProduction()) {
  mix.version();
}
