<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title;// $this->fetch('title'); ?>
	</title>
	<?php
	echo $this->Html->meta('icon');
	echo $this->Html->css('nprogress.css');
	//echo $this->Html->css('modal/reset.css');
		/*MODEL BOX CSS*/
	echo $this->Html->css('modal/default/zebra_dialog.css');
	//echo $this->Html->script('jquery.js');



	//Required Stylesheets
	echo $this->Html->css('css/reset.css');
	echo $this->Html->css('css/text.css');
	echo $this->Html->css('css/fonts/ptsans/stylesheet.css');
	echo $this->Html->css('css/fluid.css');
	echo $this->Html->css('css/mws.style.css');
	echo $this->Html->css('css/icons/16x16.css');
	echo $this->Html->css('css/icons/24x24.css');
	echo $this->Html->css('css/icons/32x32.css');

	//Demo and Plugin Stylesheets
	echo $this->Html->css('css/demo.css');
	echo $this->Html->css('../plugins/colorpicker/colorpicker.css');
	echo $this->Html->css('../plugins/imgareaselect/css/imgareaselect-default.css');
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

	echo $this->Html->css('../plugins/elrte/css/elrte.full.css');
	echo $this->Html->css('../plugins/elfinder/css/elfinder.css');


	//Theme Stylesheet -->
	echo $this->Html->css('css/mws.theme.css');

	// JavaScript Plugins -->
	echo $this->Html->script('js/jquery-1.7.2.min.js');
	echo $this->Html->script('js/jquery.mousewheel.min.js');
	echo $this->Html->script('js/jquery.placeholder.js');
	echo $this->Html->script('js/jquery.fileinput.js');

	//jQuery-UI Dependent Scripts -->
	echo $this->Html->script('../jui/js/jquery-ui-1.8.20.min.js');
	echo $this->Html->script('../jui/js/jquery.ui.timepicker.min.js');
	echo $this->Html->script('../jui/js/jquery.ui.touch-punch.js');
	echo $this->Html->script('../plugins/spinner/ui.spinner.min.js');
	// Plugin Scripts -->
	echo $this->Html->script('../plugins/imgareaselect/jquery.imgareaselect.min.js');
	echo $this->Html->script('../plugins/duallistbox/jquery.dualListBox-1.3.min.js');
	echo $this->Html->script('../plugins/jgrowl/jquery.jgrowl-min.js');
	echo $this->Html->script('../plugins/fullcalendar/fullcalendar.min.js');
	echo $this->Html->script('../plugins/datatables/jquery.dataTables.min.js');
	echo $this->Html->script('../plugins/chosen/chosen.jquery.min.js');
	echo $this->Html->script('../plugins/prettyphoto/js/jquery.prettyPhoto.min.js');

	echo $this->Html->script('../plugins/flot/excanvas.min.js');

	echo $this->Html->script('../plugins/elrte/js/elrte.min.js');
	echo $this->Html->script('../plugins/elfinder/js/elfinder.min.js');

	echo $this->Html->script('../plugins/flot/jquery.flot.min.js');
	echo $this->Html->script('../plugins/flot/jquery.flot.pie.min.js');
	echo $this->Html->script('../plugins/flot/jquery.flot.stack.min.js');
	echo $this->Html->script('../plugins/flot/jquery.flot.resize.min.js');
	echo $this->Html->script('../plugins/colorpicker/colorpicker-min.js');
	echo $this->Html->script('../plugins/tipsy/jquery.tipsy-min.js');
	echo $this->Html->script('../plugins/sourcerer/Sourcerer-1.2-min.js');
	echo $this->Html->script('../plugins/validate/jquery.validate-min.js');


	//Core Script -->
	echo $this->Html->script('js/core/mws.js');
	echo $this->Html->script('js/core/mws.wizard.js');

	//Themer Script (Remove if not needed) -->
	echo $this->Html->script('js/core/themer.js');
	//Demo Scripts (remove if not needed) -->
	echo $this->Html->script('js/demo/demo.js');
	echo $this->Html->script('nprogress.js');
	echo $this->Html->script('modal/zebra_dialog.js');
	echo $this->Html->script('modal/main.js');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');

	?>
	<script type="text/javascript">
//		$(window).scroll(function ()
//		{
//			if(($(document).height()-100) <= $(window).scrollTop() + $(window).height())
//			{
//
//			}
//		});
		function autocompleteValidation(elem){

			var options = elem.autocomplete("option");
			var isValid = false;
			jQuery.each(options.source, function(index, device) {
				if (elem.val() == options.source[index].label) {
					isValid = true;
					return false;
				}
			});
			var msg = elem.val().split('@');
			if(msg.length>1)msg=msg[1];
			if(!isValid && elem.val()!=''){
				elem.val(" Not A Valid Item@"+msg).select()
						.on('click',function(){elem.val(msg)});
			}
		}
		function ajaxData( type, url, data, replace,callback,datatype="html"){
			NProgress.start();
			$.ajax({
				url : url,
				type: type,
				data:data,
				dataType:datatype,
				success:function(result){

					$(replace).html(result);
					NProgress.done();
					callback(result);
				},
				error:function(xhr){NProgress.done();alert(xhr.responseText)}
			});
		}
		function popup(message,title,btn,type="information",callback){
			var modelbox = $.Zebra_Dialog(message, {
				'type':     type,
				'title':    title,
				'buttons':  btn,
				'onClose':  function(caption) {
					callback(caption);
				}
			});
			return modelbox;
		}
		$(document).ready(function(){
			
		});
	</script>
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
            <div class="container" id="contents">
			<?php echo $this->fetch('content'); ?>
		</div>

	</div>
</div>
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
