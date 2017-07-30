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

mix.js('resources/assets/js/app.js', 'public/assets/js')
   .sass('resources/assets/sass/app.scss', 'public/assets/css')
   .copy('node_modules/font-awesome/fonts/**', 'public/assets/fonts')
   .version()
   .options({
        // Since we don't do any image preprocessing and write url's that are
        // relative to the site root, we don't want the sass loader to try to
        // follow paths in `url()` functions.
        processCssUrls: false,
    })

;
