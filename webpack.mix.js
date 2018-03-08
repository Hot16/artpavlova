let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js');
mix.combine([
    'resources/assets/js/jquery.cookie.js',
    'resources/assets/js/jquery.scrollTo.min.js',
    'resources/assets/js/main.js',
    'resources/assets/js/masonry.pkgd.min.js',
    'resources/assets/js/owl.carousel.min.js',
    'resources/assets/js/front.js',
    'resources/assets/js/bootstrap.js'
], 'public/js/combined.js');
mix.sass('resources/assets/sass/app.scss', 'public/css');
mix.combine([
    'resources/assets/css/style.default.css',
    'resources/assets/css/helper.css',
    'resources/assets/css/owl.carousel.css',
    'resources/assets/css/owl.theme.css',
    'resources/assets/css/owl.transitions.css',
    'resources/assets/css/custom.css'
], 'public/css/all.css');
