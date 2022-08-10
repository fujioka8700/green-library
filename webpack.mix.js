const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .version()
    .browserSync({
        proxy: {
            target: 'apache2',
        },
        files: [
            './resources/**/*',
            './public/**/*',
        ],
        notify: false,
        open: false,
        reloadOnRestart: true,
    });
