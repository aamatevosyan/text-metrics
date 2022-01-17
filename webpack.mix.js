const mix = require('laravel-mix');
themes = process.env.npm_config_theme ? (process.env.npm_config_theme).split(',') : ['front', 'admin', 'supervisor'];
mix.webpackConfig(require('./webpack/webpack.config'))

themes.map((theme) => {
    require(`${__dirname}/webpack/${theme}/webpack.mix.js`);
});
