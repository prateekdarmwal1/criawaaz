<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 "> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 "> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 "> <![endif]-->
<!--[if gt IE 8]> <html class="ie "> <![endif]-->
<!--[if !IE]><!-->
<html class="">
<!-- <![endif]-->
<head>
    <title>Login</title>
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

    <?php
    echo $this->html->css('/assets/components/library/bootstrap/css/bootstrap.min.css');
    echo $this->html->css('/assets/css/admin/module.admin.stylesheet-complete.sidebar_type.collapse.min.css');
     echo $this->Html->script('/assets/components/library/jquery/jquery.min.js?v=v1.0.3-rc2&sv=v0.0.1.1');
    echo $this->Html->script('/assets/components/library/jquery/jquery-migrate.min.js?v=v1.0.3-rc2&sv=v0.0.1.1');
    echo $this->Html->script('/assets/components/library/modernizr/modernizr.js?v=v1.0.3-rc2&sv=v0.0.1.1');
    echo $this->Html->script('/assets/components/plugins/less-js/less.min.js?v=v1.0.3-rc2&sv=v0.0.1.1');

    echo $this->Html->script('/assets/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v1.0.3-rc2');
    echo $this->Html->script('/assets/components/plugins/less-js/less.min.js?v=v1.0.3-rc2&sv=v0.0.1.1');

    echo $this->Html->script('/assets/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v1.0.3-rc2');
    echo $this->Html->script('/assets/components/plugins/browser/ie/ie.prototype.polyfill.js?v=v1.0.3-rc2&sv=v0.0.1.1');


    ?>


    <script>
        if (/*@cc_on!@*/ false && document.documentMode === 10) {
            document.documentElement.className += ' ie ie10';
        }
    </script>
</head>
<body>
<?php echo $content_for_layout;?>
<script data-id="App.Config">
    var App = {};
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
</script>
<?php
echo $this->Html->script('/assets/components/library/bootstrap/js/bootstrap.min.js?v=v1.0.3-rc2&sv=v0.0.1.1');
echo $this->Html->script('/assets/components/plugins/nicescroll/jquery.nicescroll.min.js?v=v1.0.3-rc2&sv=v0.0.1.1');
echo $this->Html->script('/assets/components/plugins/breakpoints/breakpoints.js?v=v1.0.3-rc2&sv=v0.0.1.1');
echo $this->Html->script('/assets/components/plugins/preload/pace/pace.min.js?v=v1.0.3-rc2&sv=v0.0.1.1');
echo $this->Html->script('/assets/components/plugins/preload/pace/preload.pace.init.js?v=v1.0.3-rc2&sv=v0.0.1.1');
echo $this->Html->script('/assets/components/core/js/animations.init.js?v=v1.0.3-rc2');
echo $this->Html->script('/assets/components/core/js/core.init.js?v=v1.0.3-rc2');

?>


</body>
</html>

