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

mix.js(
        ['resources/js/app.js',
            'node_modules/admin-lte/plugins/jquery/jquery.js',
            'node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.js',
            'node_modules/admin-lte/plugins/chart.js/Chart.js',
            'node_modules/admin-lte/build/js/AdminLTE.js',
            'node_modules/admin-lte/plugins/sweetalert2/sweetalert2.js',
    ], 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
