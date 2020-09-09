const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .js('resources/js/main.js', 'public/js')
    .sass('resources/css/main.scss', 'public/css')
    .webpackConfig({
        resolve: {
            alias: {
                js: path.resolve('./resources/js'),
                pages: path.resolve('./resources/js/pages'),
                components: path.resolve('./resources/js/components'),
            },
        },
    });
