<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title;// $this->fetch('title'); ?>
	</title>
	<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	echo $this->Html->meta('icon');
	echo $this->Html->css('css/reset.css');
	echo $this->Html->css('css/text.css');
	echo $this->Html->css('css/fonts/ptsans/stylesheet.css');
	echo $this->Html->css('css/fluid.css');
	echo $this->Html->css('css/mws.style.css');
	echo $this->Html->css('css/icons/16x16.css');
	echo $this->Html->css('css/icons/24x24.css');
	echo $this->Html->css('css/icons/32x32.css');
	echo $this->Html->css('css/demo.css');

	echo $this->Html->css('../plugins/colorpicker/colorpicker.css');
	echo $this->Html->css('../plugins/imgareaselect/css/imgareaselect-default.css');
	echo $this->Html->css('../plugins/fullcalendar/fullcalendar.css');
	echo $this->Html->css('../plugins/fullcalendar/fullcalendar.print.css');
	echo $this->Html->css('../plugins/chosen/chosen.css');
	echo $this->Html->css('../plugins/prettyphoto/css/prettyPhoto.css');
	echo $this->Html->css('../plugins/tipsy/tipsy.css');
	echo $this->Html->css('../plugins/sourcerer/Sourcerer-1.2.css');
	echo $this->Html->css('../plugins/jgrowl/jquery.jgrowl.css');
	echo $this->Html->css('../plugins/spinner/ui.spinner.css');
	echo $this->Html->css('../jui/css/jquery.ui.all.css');
	echo $this->Html->css('css/mws.theme.css');
	//echo $this->Html->css('../');

	echo $this->Html->script('js/jquery-1.7.2.min.js');
	echo $this->Html->script('js/jquery.mousewheel.min.js');
	echo $this->Html->script('js/jquery.placeholder.js');
	echo $this->Html->script('js/jquery.fileinput.js');

	echo $this->Html->script('../jui/js/jquery-ui-1.8.20.min.js');
	echo $this->Html->script('../jui/js/jquery.ui.timepicker.min.js');
	echo $this->Html->script('../jui/js/jquery.ui.touch-punch.js');
	echo $this->Html->script('../plugins/spinner/ui.spinner.min.js');

	echo $this->Html->script('../plugins/imgareaselect/jquery.imgareaselect.min.js');
	echo $this->Html->script('../plugins/duallistbox/jquery.dualListBox-1.3.min.js');
	echo $this->Html->script('../plugins/jgrowl/jquery.jgrowl-min.js');
	echo $this->Html->script('../plugins/fullcalendar/fullcalendar.min.js');
	echo $this->Html->script('../plugins/datatables/jquery.dataTables.min.js');
	echo $this->Html->script('../plugins/chosen/chosen.jquery.min.js');
	echo $this->Html->script('../plugins/prettyphoto/js/jquery.prettyPhoto.min.js');
	echo $this->Html->script('../plugins/flot/excanvas.min.js');

	echo $this->Html->script('../plugins/flot/jquery.flot.min.js');
	echo $this->Html->script('../plugins/flot/jquery.flot.pie.min.js');
	echo $this->Html->script('../plugins/flot/jquery.flot.stack.min.js');
	echo $this->Html->script('../plugins/flot/jquery.flot.resize.min.js');
	echo $this->Html->script('../plugins/colorpicker/colorpicker-min.js');
	echo $this->Html->script('../plugins/tipsy/jquery.tipsy-min.js');
	echo $this->Html->script('../plugins/sourcerer/Sourcerer-1.2-min.js');
	echo $this->Html->script('../plugins/validate/jquery.validate-min.js');

	echo $this->Html->script('../plugins/elrte/js/elrte.min.js');
	echo $this->Html->script('../plugins/elfinder/js/elfinder.min.js');

	echo $this->Html->css('../plugins/elrte/css/elrte.full.css');
	echo $this->Html->css('../plugins/elfinder/css/elfinder.css');

	echo $this->Html->script('js/core/mws.js');
	echo $this->Html->script('js/core/mws.wizard.js');

	//Themer Script (Remove if not needed) -->
	echo $this->Html->script('js/core/themer.js');
	//Demo Scripts (remove if not needed) -->
	echo $this->Html->script('js/demo/demo.js');
	echo $this->Html->script('js/demo/demo.formelements.js');

	echo $this->Html->css('nprogress.css');
	//echo $this->Html->css('modal/reset.css');
	//echo $this->Html->css('modal/default/zebra_dialog.css');
	//echo $this->Html->script('nprogress.js');
	//echo $this->Html->script('modal/zebra_dialog.js');
	//echo $this->Html->script('modal/main.js');


	?>
	<head>


		<!-- Core Script -->

		<title>MWS Admin - Form Elements</title>

	</head>

	<body>
	<?php //echo $this->Session->flash(); ?>

	<?php echo $this->element("headers/top_header")?>
	<div id="mws-wrapper">
		<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
		<?=$this->element("side_menu_bar")?>
		<div id="mws-container" class="clearfix">
			<div class="container">
				<?php echo $this->fetch('content'); ?>
			</div>

		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>

	<!-- Start Main Wrapper -->
