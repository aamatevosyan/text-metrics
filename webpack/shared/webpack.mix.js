const mix = require('laravel-mix');

mix.webpackConfig(require('./webpack.config'))
    .mergeManifest();

if (mix.inProduction()) {
    mix.version();
}
