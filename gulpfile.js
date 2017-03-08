const elixir = require('laravel-elixir');

//require('laravel-elixir-vue-2');

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
 | file for your application as well as publishing vendor resources.
 |
 */

const gulp = require('gulp');
const imagemin = require('gulp-imagemin');


    gulp.task('images',function() {
           return gulp.src('storage/app/images/*')
                .pipe(imagemin())
                .pipe(gulp.dest('public/images'))
        }
    );



    elixir(function(mix)  {
        mix.sass('app.scss')
            .webpack('app.js')
            .scripts('myaccount.js')
            .scripts('events.js')
           .styles('common.css');
        mix.task('images');
        mix.version('js/app.js');
        mix.version('js/myaccount.js');
        mix.version('js/events.js');
        mix.version('css/app.css');
        mix.version('css/common.css');
//mix.copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts/bootstrap');
});


/*Elixir.webpack.mergeConfig({
    module: {
        loaders: [{
            test: /\.js$/,
            loader: 'babel-loader',
        }]
    }
});*/






