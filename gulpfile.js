var elixir = require('laravel-elixir'),
cssDir = 'public/Assets/Stylesheets/';
elixir.config.sourcemaps = false;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
  mix.sass('Main.scss', 'resources/assets/css/Main.css')
    .styles([
      'Reset.css',
      'Main.css'
    ], 'Main.css')
    .version(cssDir + 'Main.css');
});
