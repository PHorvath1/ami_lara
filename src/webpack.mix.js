const mix = require('laravel-mix');
const glob = require('glob');

//<editor-fold desc="Pattern matching for globify function">
const files = pattern => glob.sync(pattern, { cwd: 'resources/sass' });

const globify = (pattern, out, mixFunctionName) => {
    files(pattern).forEach((path) => {
        mix[mixFunctionName](`resources/sass/${path}`, out);
    })
};
//</editor-fold>

mix.sass('resources/sass/app.sass', 'public/css/app.css');
globify('**/mix_*.sass', 'public/css', 'sass');
mix.js('resources/js/*.js', 'public/js/app.js');
