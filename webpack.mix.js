

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

mix.copyDirectory('node_modules/admin-lte/dist', 'public/vendor/AdminLTE');
mix.copyDirectory('node_modules/admin-lte/plugins', 'public/vendor/AdminLTE/plugins');
mix.copyDirectory('node_modules/admin-lte/bower_components/bootstrap/dist', 'public/vendor/AdminLTE/bootstrap');
mix.copyDirectory('node_modules/admin-lte/bower_components/jquery/dist', 'public/vendor/AdminLTE/jquery');
mix.copyDirectory('node_modules/admin-lte/bower_components/datatables.net/js', 'public/vendor/AdminLTE/plugins/datatables');
mix.copyDirectory('node_modules/admin-lte/bower_components/datatables.net-bs/js', 'public/vendor/AdminLTE/plugins/datatables');
mix.copyDirectory('node_modules/admin-lte/bower_components/datatables.net-bs/css', 'public/vendor/AdminLTE/plugins/datatables');
mix.copyDirectory('node_modules/admin-lte/bower_components/select2/dist', 'public/vendor/AdminLTE/plugins/select2');
mix.copyDirectory('node_modules/jasny-bootstrap/dist', 'public/vendor/jasny-bootstrap');
mix.copyDirectory('node_modules/jquery-datetimepicker/build', 'public/vendor/jquery-datetimepicker');
mix.copyDirectory('node_modules/summernote/dist', 'public/vendor/summernote');
mix.copy('node_modules/repeatable-fields/repeatable-fields.js', 'public/vendor/repeatable-fields/')
    .minify('public/vendor/repeatable-fields/repeatable-fields.js');
mix.js('resources/js/app.js', 'public/js');



