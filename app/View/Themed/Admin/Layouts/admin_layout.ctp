<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 sidebar sidebar-collapse"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 sidebar sidebar-collapse"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 sidebar sidebar-collapse"> <![endif]-->
<!--[if gt IE 8]> <html class="ie sidebar sidebar-collapse"> <![endif]-->
<!--[if !IE]><!-->
<html class="sidebar sidebar-collapse">
<!-- <![endif]-->
<head>
    <title>admin</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <!--
	**********************************************************
	In development, use the LESS files and the less.js compiler
	instead of the minified CSS loaded by default.
	**********************************************************
	-->
    <!--[if lt IE 9]>
    <![endif]-->
    <link rel="stylesheet" href="../assets/components/library/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../assets/css/admin/module.admin.stylesheet-complete.sidebar_type.collapse.min.css"/>
    <link rel="stylesheet" href="../assets/css/admin/font-awesome.css"/>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- <?php echo $this->Html->css('css/admin/module.admin.stylesheet-complete.sidebar_type.collapse.min.css'); ?> -->

    <?php echo $this->Html->script("../assets/components/plugins/ajaxify/script.min.js?v=v1.0.3-rc2&sv=v0.0.1.1");?>
    <?php echo $this->Html->script("../assets/js/index.js");?>
    <?php echo $this->Html->script("../assets/components/common/forms/ckeditor/ckeditor.js");?>

    <script>
        var App = {};
    </script>
    <script data-id="App.Scripts">
        App.Scripts = {
            /* CORE scripts always load first; */
            core:[
                '../assets/components/library/jquery/jquery.min.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/library/modernizr/modernizr.js?v=v1.0.3-rc2&sv=v0.0.1.1'
            ],

            /* PLUGINS_DEPENDENCY always load after CORE but before PLUGINS; */
            plugins_dependency:[
                '../assets/components/library/bootstrap/js/bootstrap.min.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/library/jquery/jquery-migrate.min.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/common/forms/editors/wysihtml5/assets/lib/js/wysihtml5-0.3.0_rc2.min.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/common/tables/datatables/assets/lib/js/jquery.dataTables.min.js?v=v1.0.3-rc2&sv=v0.0.1.1'


            ],
            /* PLUGINS always load after CORE and PLUGINS_DEPENDENCY, but before the BUNDLE / initialization scripts; */
            plugins:[
                '../assets/components/plugins/nicescroll/jquery.nicescroll.min.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/plugins/breakpoints/breakpoints.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/plugins/ajaxify/davis.min.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/plugins/ajaxify/jquery.lazyjaxdavis.min.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/plugins/preload/pace/pace.min.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/common/forms/elements/bootstrap-select/assets/lib/js/bootstrap-select.js?v=v1.0.3-rc2',
                '../assets/components/plugins/less-js/less.min.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v1.0.3-rc2',
                '../assets/components/plugins/browser/ie/ie.prototype.polyfill.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/common/forms/editors/wysihtml5/assets/lib/js/bootstrap-wysihtml5-0.0.2.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/common/tables/responsive/assets/lib/js/footable.min.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/common/tables/datatables/assets/lib/extras/TableTools/media/js/TableTools.min.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/common/tables/datatables/assets/lib/extras/ColVis/media/js/ColVis.min.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/common/tables/datatables/assets/custom/js/DT_bootstrap.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/common/tables/datatables/assets/lib/extras/FixedHeader/FixedHeader.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/common/tables/datatables/assets/lib/extras/ColReorder/media/js/ColReorder.min.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/common/forms/elements/bootstrap-datepicker/assets/lib/js/bootstrap-datepicker.js?v=v1.0.3-rc2&sv=v0.0.1.1'


            ],
            /* The initialization scripts always load last and are automatically and dynamically loaded when AJAX navigation is enabled; */
            bundle:[
                '../assets/components/plugins/ajaxify/ajaxify.init.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/plugins/preload/pace/preload.pace.init.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/core/js/animations.init.js?v=v1.0.3-rc2',
                '../assets/components/core/js/sidebar.main.init.js?v=v1.0.3-rc2',
                '../assets/components/core/js/sidebar.collapse.init.js?v=v1.0.3-rc2',
                '../assets/components/common/forms/elements/bootstrap-select/assets/custom/js/bootstrap-select.init.js?v=v1.0.3-rc2',
                '../assets/components/core/js/core.init.js?v=v1.0.3-rc2',
                '../assets/components/core/js/custom.js',
                '../assets/components/common/forms/editors/wysihtml5/assets/custom/wysihtml5.init.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/common/tables/responsive/assets/custom/js/tables-responsive-footable.init.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/common/tables/datatables/assets/custom/js/datatables.init.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/common/tables/classic/assets/js/tables-classic.init.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/common/forms/elements/bootstrap-datepicker/assets/custom/js/bootstrap-datepicker.init.js?v=v1.0.3-rc2&sv=v0.0.1.1',
                '../assets/components/common/forms/elements/fuelux-checkbox/fuelux-checkbox.init.js?v=v1.0.3-rc2&sv=v0.0.1.1'

            ]
        };
    </script>

    <script>
        $script(App.Scripts.core, 'core');
        $script.ready(['core'], function () {
            $script(App.Scripts.plugins_dependency, 'plugins_dependency');

        });
        $script.ready(['core', 'plugins_dependency'], function () {
            $script(App.Scripts.plugins, 'plugins');
        });
        $script.ready(['core', 'plugins_dependency', 'plugins'], function () {
            $script(App.Scripts.bundle, 'bundle');

        });

    </script>
    <script>
        if ( false && document.documentMode === 10) {
            document.documentElement.className += ' ie ie10';
        }
    </script>
    <script>

    </script>
    <?php echo $this->Html->css('common.css');?>
</head>
<body class="scripts-async">
<!-- Main Container Fluid -->
<div class="container-fluid menu-hidden">
    <?php echo $this->element("default_side_bar");?>
    <?php echo $this->element("default_main_content");?>
    <?php echo $this->element("default_footer");?>
</div>
<!-- // Main Container Fluid END -->
<!-- Global -->
<script data-id="App.Config">
    var basePath = '',
        commonPath = '../assets/',
        rootPath = '../',
        DEV = false,
        componentsPath = '../assets/components/';
    var primaryColor = '#3695d5',
        dangerColor = '#b55151',
        successColor = '#609450',
        infoColor = '#4a8bc2',
        warningColor = '#ab7a4b',
        inverseColor = '#45484d';
    var themerPrimaryColor = primaryColor;
    App.Config = {
        ajaxify_menu_selectors:['#menu'],
        ajaxify_layout_app:false
    };
</script>


</body>
</html>