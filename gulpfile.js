const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

var paths = {
    'bootstrap': './node_modules/bootstrap-sass/assets/'
}

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
    mix.sass('app.scss');

    //mix.copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts/bootstrap');
});

Elixir.webpack.mergeConfig({
    module: {
        loaders: [{
            test: /\.js$/,
            loader: 'babel-loader',
        }]
    }
});