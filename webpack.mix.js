const mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/js')
    .sass('resources/css/app.scss', 'public/css')
    .webpackConfig({
        resolve: {
            alias: {
                js: path.resolve('./resources/js'),
                components: path.resolve('./resources/js/components'),
                layouts: path.resolve('./resources/js/layouts'),
                pages: path.resolve('./resources/js/pages'),
            },
        },
    });
