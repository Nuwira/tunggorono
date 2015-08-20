var elixir = require('laravel-elixir');

var bowerbasepath = 'bower_components/';
var bowerpath = '../../../' + bowerbasepath;

// Disable Source Maps
elixir.config.sourcemaps = false;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less([
        'app.less',
        bowerpath + 'font-awesome/less/font-awesome.less',
    ], 'public/css');
    
    mix.scripts([
        bowerpath + 'jquery/dist/jquery.js',
        bowerpath + 'bootstrap/dist/js/bootstrap.js',
    ], 'public/js/app.js');
    
    mix.copy(
        bowerbasepath + 'font-awesome/fonts', 
        'public/fonts'
    );
    mix.copy(
        bowerbasepath + 'font-awesome/fonts', 
        'public/build/fonts'
    );
    
    mix.version([
        'css/app.css',
        'js/app.js',
    ]);
});
