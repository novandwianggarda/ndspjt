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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.sass('resources/assets/sass/skin-landlord.scss', 'public/vendor/adminlte/dist/css/skins')
   .minify('public/vendor/adminlte/dist/css/skins/skin-landlord.css', 'public/vendor/adminlte/dist/css/skins');

mix.scripts([
    'resources/assets/js/script.js'
], 'public/js/script.js');
