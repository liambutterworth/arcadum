const mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/js')
    .sass('resources/css/app.scss', 'public/css')
    .webpackConfig({
        resolve: {
            alias: {
                js: path.resolve('./resources/js'),
                pages: path.resolve('./resources/js/pages'),
                components: path.resolve('./resources/js/components'),
            },
        },
    });
