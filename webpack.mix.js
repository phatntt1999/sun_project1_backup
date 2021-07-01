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

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
])

mix.styles('resources/assets/css/style.css', 'public/assets/css/style.css');
mix.styles('resources/assets/css/style2.css', 'public/assets/css/style2.css');
mix.styles('resources/assets/css/custom-heart.css', 'public/assets/css/custom-heart.css');
mix.styles('resources/assets/css/icomoon.css', 'public/assets/css/icomoon.css');
mix.styles('resources/assets/css/header.css', 'public/assets/css/header.css');
mix.styles('resources/assets/css/sb-admin-2.css', 'public/assets/css/sb-admin-2.css');
mix.styles('resources/assets/css/superfish.css', 'public/assets/css/superfish.css');
mix.styles('resources/assets/css/bookingForm.css', 'public/assets/css/bookingForm.css');
mix.styles('resources/assets/css/create-tour.css', 'public/assets/css/create-tour.css');

mix.js([
    'resources/assets/js/superfish.js',
    'resources/assets/js/hoverIntent.js',
    'resources/assets/js/jquery.easing.1.3.js',
    'resources/assets/js/jquery.stellar.min.js',
], 'public/assets/js/all-js.js');
mix.js('resources/assets/js/main.js', 'public/assets/js/main.js');
mix.js('resources/assets/js/modernizr-2.6.2.min.js', 'public/assets/js/modernizr-2.6.2.min.js');
