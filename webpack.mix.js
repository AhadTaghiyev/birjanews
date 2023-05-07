const mix = require('laravel-mix');

/*==========================================
===============FOR ADMIN====================
============================================
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/assets/css/admin/bootstrap.css',
    'resources/assets/css/admin/animate.compat.css',
    'resources/assets/css/admin/all.css',
    'resources/assets/css/admin/boxicons.min.css',
    'resources/assets/css/admin/magnific-popup.css',
    'resources/assets/css/admin/bootstrap-datepicker3.css',
    'resources/assets/css/admin/jquery-ui.css',
    'resources/assets/css/admin/jquery-ui.theme.css',
    'resources/assets/css/admin/bootstrap-multiselect.css',
    'resources/assets/css/admin/bootstrap-tagsinput.css',
    'resources/assets/css/admin/morris.css',
    'resources/assets/css/admin/theme.css',
    'resources/assets/css/admin/default.css',
    'resources/assets/css/admin/lightbox.min.css',
    'resources/assets/css/admin/dataTables.bootstrap5.min.css',
    'resources/assets/css/admin/custom.css',

], 'public/css/admin.css');

mix.scripts([
    'resources/assets/js/admin/modernizr.js',
], 'public/js/modernizr.js');

mix.scripts([
    'resources/assets/js/admin/jquery.js',
    'resources/assets/js/admin/jquery.browser.mobile.js',
    'resources/assets/js/admin/popper.min.js',
    'resources/assets/js/admin/bootstrap.bundle.min.js',
    'resources/assets/js/admin/bootstrap-datepicker.js',
    'resources/assets/js/admin/common.js',
    'resources/assets/js/admin/nanoscroller.js',
    'resources/assets/js/admin/jquery.magnific-popup.js',
    'resources/assets/js/admin/jquery.placeholder.js',
    'resources/assets/js/admin/jquery-ui.js',
    'resources/assets/js/admin/jquery.ui.touch-punch.js',
    'resources/assets/js/admin/jquery.appear.js',
    'resources/assets/js/admin/bootstrap-multiselect.js',
    'resources/assets/js/admin/bootstrap-tagsinput.js',
    'resources/assets/js/admin/jquery.easypiechart.js',
    'resources/assets/js/admin/jquery.flot.js',
    'resources/assets/js/admin/jquery.flot.tooltip.js',
    'resources/assets/js/admin/jquery.flot.pie.js',
    'resources/assets/js/admin/jquery.flot.categories.js',
    'resources/assets/js/admin/jquery.flot.resize.js',
    'resources/assets/js/admin/jquery.sparkline.js',
    'resources/assets/js/admin/raphael.js',
    'resources/assets/js/admin/morris.js',
    'resources/assets/js/admin/gauge.js',
    'resources/assets/js/admin/snap.svg.js',
    'resources/assets/js/admin/liquid.meter.js',
    'resources/assets/js/admin/jquery.vmap.js',
    'resources/assets/js/admin/jquery.vmap.sampledata.js',
    'resources/assets/js/admin/jquery.vmap.world.js',
    'resources/assets/js/admin/jquery.vmap.africa.js',
    'resources/assets/js/admin/jquery.vmap.asia.js',
    'resources/assets/js/admin/jquery.vmap.australia.js',
    'resources/assets/js/admin/jquery.vmap.europe.js',
    'resources/assets/js/admin/jquery.vmap.north-america.js',
    'resources/assets/js/admin/jquery.vmap.south-america.js',
    'resources/assets/js/admin/jquery.dataTables.min.js',
    'resources/assets/js/admin/dataTables.bootstrap5.min.js',
    'resources/assets/js/admin/theme.js',
    'resources/assets/js/admin/custom.js',
    'resources/assets/js/admin/theme.init.js',
    'resources/assets/js/admin/examples.datatables.default.js',
    'resources/assets/js/admin/examples.dashboard.js',
], 'public/js/admin.js');


/*==========================================
===============FOR FRONT====================
============================================
 */

mix.styles([
    'resources/assets/css/front/bootstrap.min.css',
    'resources/assets/css/front/normalize.css',
    'resources/assets/css/front/linearicons.css',
    'resources/assets/css/front/font-awesome.min.css',
    'resources/assets/css/front/jquery-ui.css',
    'resources/assets/css/front/owl.theme.css',
    'resources/assets/css/front/prettyPhoto.css',
    'resources/assets/css/front/owl.carousel.css',
    'resources/assets/css/front/jquery.fancybox.min.css',
    'resources/assets/css/front/flipclock.css',
    'resources/assets/css/front/slick.css',
    'resources/assets/css/front/slick-theme.css',
    'resources/assets/css/front/main.css',
    'resources/assets/css/front/color.css',
    'resources/assets/css/front/transitions.css',
    'resources/assets/css/front/responsive.css',
    'resources/assets/css/front/custom.css',
], 'public/css/front.css');


mix.scripts([
    'resources/assets/js/front/jquery-library.js',
    'resources/assets/js/front/bootstrap.min.js',
    'resources/assets/js/front/owl.carousel.min.js',
    'resources/assets/js/front/jquery.fancybox.min.js',
    'resources/assets/js/front/prettyPhoto.js',
    'resources/assets/js/front/flipclock.js',
    'resources/assets/js/front/slick.min.js',
    'resources/assets/js/front/slick.min.js',
    'resources/assets/js/front/jquery-ui.js',
    'resources/assets/js/front/jquery.inputmask.js',
    'resources/assets/js/front/main.js',
    'resources/assets/js/front/custom.js',
], 'public/js/front.js');

mix.scripts([
    'resources/assets/js/front/modernizr-2.8.3-respond-1.4.2.min.js',
], 'public/js/modernizrF.js');

