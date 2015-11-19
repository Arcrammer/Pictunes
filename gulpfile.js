var elixir = require('laravel-elixir');
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
  mix
    .sass([
    'Main.scss',
    'Dashboard.scss'
  ], 'resources/assets/css/Dashboard.css')
    .styles([
      'Reset.css',
      'Main.css'
    ], 'public/css/Dashboard.css');

  mix
    .sass([
    'Main.scss',
    'Authentication.scss'
  ], 'resources/assets/css/Authentication.css')
    .styles([
      'Reset.css',
      'Authentication.css'
    ], 'public/css/Authentication.css');

  mix.version([
    'css/Dashboard.css',
    'css/Authentication.css'
  ]);
});
