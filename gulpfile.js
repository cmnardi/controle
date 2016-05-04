var elixir = require('laravel-elixir');

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
var paths = {
    'bootstrap'	: './resources/assets/vendor/admin-lte',
    'plugins'	: './resources/assets/vendor/admin-lte/plugins',
    'fonts'		: './resources/assets/vendor/admin-lte/bootstrap/fonts'
}


elixir(function(mix) {
    //mix.sass('app.scss');
    //mix.sass('app.vendor/admin-lte', 'public/css');
    //mix.sass('*.scss', 'public/css/', {includePaths: [paths.bootstrap + 'stylesheets']});
    mix
    	.styles([
            paths.bootstrap+'/dist/css/*.*'
            //,paths.plugins+'/*.css'
            ,paths.bootstrap+'/bootstrap/css/bootstrap.min.css'
        ], 'public/assets/css')
        .styles([
            paths.bootstrap+'/dist/css/skins/skin-blue.css'
        ], 'public/assets/css/skin.css')
        //
        .styles([
            paths.bootstrap+'/dist/css/AdminLTE.css'
        ], 'public/assets/css/adminLTE.css')
        //.styles([paths.bootstrap+'/css/AdminLTE.css'], 'public/assets/AdminLTE.min.css')
    	.copy(paths.fonts + '/**', 'public/assets/fonts')
        .copy(paths.bootstrap + '/dist/img/**', 'public/dist/img')
    	.scripts([
		    paths.plugins + '/.*',
            paths.plugins + "/jQuery/jQuery-2.2.0.min.js",
            paths.bootstrap + "/bootstrap/js/bootstrap.js",
		    paths.bootstrap + "/dist/js/app.js",
            paths.bootstrap + "/dist/js/pages/dashboard.js",
            paths.bootstrap + "/dist/js/demo.js",
		    paths.bootstrap + "/dist/js/*.*js",
		    paths.bootstrap + "/dist/js/pages/*.*js"
		], 'public/assets/js/app.js');

	;
});
