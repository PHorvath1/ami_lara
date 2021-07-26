const mix = require('laravel-mix');
const glob = require('glob');
const MomentLocalesPlugin = require('moment-locales-webpack-plugin');

//<editor-fold desc="Pattern matching for globify function">
const files = pattern => glob.sync(pattern, { cwd: 'resources/sass' });

const globify = (pattern, out, mixFunctionName) => {
    files(pattern).forEach((path) => {
        mix[mixFunctionName](`resources/sass/${path}`, out);
    })
};
//</editor-fold>

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
