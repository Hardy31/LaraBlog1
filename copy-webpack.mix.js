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
/*
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

*/


mix.styles([

    'resources/admin/assets/bootstrap/css/bootstrap.min.css',
    'resources/admin/assets/dist/css/AdminLTE.min.css',
    'resources/admin/assets/dist/css/skins/_all-skins.min.css',
    'resources/admin/assets/dist/css/skins/skin-blue.min.css',
    //'resources/admin/assets/dist/css/font-awesome.min.css',
    //'resources/admin/assets/dist/css/ionicons.min.css',

    'resources/admin/assets/font-awesome/4.5.0/css/font-awesome.min.css',
    'resources/admin/assets/ionicons/2.0.1/css/ionicons.min.css',
    'resources/admin/assets/plugins/bootstrap-slider/slider.css',
    'resources/admin/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
    'resources/admin/assets/plugins/colorpicker/bootstrap-colorpicker.min.css',
    'resources/admin/assets/plugins/datatables/dataTables.bootstrap.css',
    'resources/admin/assets/plugins/datepicker/datepicker3.css',
    'resources/admin/assets/plugins/daterangepicker/daterangepicker.css',
    'resources/admin/assets/plugins/fullcalendar/fullcalendar.min.css',
    'resources/admin/assets/plugins/fullcalendar/fullcalendar.print.css',
    'resources/admin/assets/plugins/iCheck/futurico/futurico.css',
    'resources/admin/assets/plugins/iCheck/line/_all.css',
    'resources/admin/assets/plugins/iCheck/polaris/polaris.css',
    'resources/admin/assets/plugins/iCheck/all.css',
    'resources/admin/assets/plugins/ionslider/ion.rangeSlider.css',
    'resources/admin/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
    'resources/admin/assets/plugins/morris/morris.css',
    'resources/admin/assets/plugins/pace/pace.min.css',
    'resources/admin/assets/plugins/select2/select2.min.css',
    'resources/admin/assets/plugins/timepicker/bootstrap-timepicker.min.css'


], 'public/css/admin.css');


mix.scripts([
    'resources/admin/assets/plugins/jQuery/jquery-2.2.3.min.js',
    'resources/admin/assets/bootstrap/js/bootstrap.min.js',
    'resources/admin/assets/plugins/select2/select2.full.min.js',
    'resources/admin/assets/plugins/datepicker/bootstrap-datepicker.js',
    'resources/admin/assets/plugins/datatables/jquery.dataTables.min.js',
    'resources/admin/assets/plugins/datatables/dataTables.bootstrap.min.js',
    'resources/admin/assets/plugins/slimScroll/jquery.slimscroll.min.js',
    'resources/admin/assets/plugins/fastclick/fastclick.js',
    'resources/admin/assets/plugins/iCheck/icheck.min.js',
    'resources/admin/assets/dist/js/app.min.js',
    'resources/admin/assets/dist/js/demo.js',
    'resources/admin/assets/dist/scripts.js',


    'resources/admin/assets/dist/js/pages/dashboard.js',
    'resources/admin/assets/dist/js/pages/dashboard2.js',
    'resources/admin/assets/plugins/bootstrap-slider/bootstrap-slider.js',
    'resources/admin/assets/plugins/bootstrap-wy sihtml5/bootstrap3-wysihtml5.all.min.js',
    'resources/admin/assets/plugins/chartjs/Chart.min.js',
    'resources/admin/assets/plugins/colorpicker/bootstrap-colorpicker.min.js',

    'resources/admin/assets/plugins/daterangepicker/daterangepicker.js',
    'resources/admin/assets/plugins/flot/jquery.flot.categories.min.js',
    'resources/admin/assets/plugins/flot/jquery.flot.min.js',
    'resources/admin/assets/plugins/flot/jquery.flot.pie.min.js',
    'resources/admin/assets/plugins/flot/jquery.flot.resize.min.js',
    'resources/admin/assets/plugins/fullcalendar/fullcalendar.min.js',

    'resources/admin/assets/plugins/input-mask/jquery.inputmask.date.extensions.js',
    'resources/admin/assets/plugins/input-mask/jquery.inputmask.extensions.js',
    'resources/admin/assets/plugins/input-mask/jquery.inputmask.js',
    'resources/admin/assets/plugins/ionslider/ion.rangeSlider.min.js',
    'resources/admin/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    'resources/admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    'resources/admin/assets/plugins/knob/jquery.knob.js',
    'resources/admin/assets/plugins/morris/morris.min.js',
    'resources/admin/assets/plugins/pace/pace.min.js',


    'resources/admin/assets/plugins/sparkline/jquery.sparkline.min.js',
    'resources/admin/assets/plugins/timepicker/bootstrap-timepicker.min.js',



], 'public/js/admin.js');

mix.copy('resources/admin/assets/bootstrap/fonts', 'public/fonts');
mix.copy('resources/admin/assets/dist/fonts', 'public/fonts');
mix.copy('resources/admin/assets/dist/img', 'public/imag');

