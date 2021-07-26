const mix = require('laravel-mix');
const glob = require('glob');
const MomentLocalesPlugin = require('moment-locales-webpack-plugin');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

mix.webpackConfig({
    plugins: [
        new MomentLocalesPlugin({
            localesToKeep: ['hu'],
        }),
    ],
});

mix.sass('resources/sass/app.sass', 'public/css/app.css');
globify('**/mix_*.sass', 'public/css', 'sass');
mix.js('resources/js/*.js', 'public/js/app.js');
