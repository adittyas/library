const mix = require('laravel-mix');

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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

mix.scripts([
    // 'resources/js/datatables/result.js',
    // 'public/js/dashboard.js'
    'node_modules/bs-custom-file-input/dist/bs-custom-file-input.js',
    'node_modules/easy-autocomplete/dist/jquery.easy-autocomplete.js'
], 'public/js/autocomplete.js');

mix.styles([
    // 'public/assets/argon-dashboard/assets/js/plugins/nucleo/css/nucleo.css',
    // 'public/assets/argon-dashboard/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css',
    'public/assets/argon-dashboard/assets/css/argon-dashboard.css',
    'public/assets/dataTables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css',
    'public/assets/dataTables/Buttons-1.6.1/css/buttons.bootstrap4.min.css',
    'public/assets/animation/animate.css',
    'public/assets/sweetalert/dist/sweetalert2.all.min.css',
    'node_modules/easy-autocomplete/dist/easy-autocomplete.css',
    'node_modules/chart.js/dist/Chart.css',
    'resources/css/main.css',
    // 'node_modules/easy-autocomplete/dist/easy-autocomplete.themes.css'
], 'public/css/application.css');

mix.js('node_modules/chart.js/dist/Chart.bundle.js', 'public/js/chart.js');
