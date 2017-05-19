<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title;// $this->fetch('title'); ?>
	</title>
	<?php
	echo $this->Html->meta('icon');
	echo $this->Html->css('bootstrap.min.css');
	echo $this->Html->css('fancybox/jquery.fancybox.css');
	echo $this->Html->css('jcarousel.css');
	echo $this->Html->css('flexslider.css');
	echo $this->Html->css('font-awesome.css');
	echo $this->Html->css('style.css');
	echo $this->Html->css('skins/default.css');
	echo $this->Html->css('nprogress.css');
	echo $this->Html->css('jquery-ui.css');
	echo $this->Html->css('modal/reset.css');

	/*MODEL BOX CSS*/
	echo $this->Html->css('modal/default/zebra_dialog.css');


	echo $this->Html->script('jquery.js');
	echo $this->Html->script('nprogress.js');

	echo $this->Html->script('modal/zebra_dialog.js');
	echo $this->Html->script('modal/main.js');
	echo $this->Html->script('modal/main.js');
	echo $this->Html->script('jquery.easing.1.3.js');
	echo $this->Html->script('bootstrap.min.js');
	echo $this->Html->script('jquery.fancybox.pack.js');
	echo $this->Html->script('jquery.fancybox-media.js');
	echo $this->Html->script('google-code-prettify/prettify.js');
	echo $this->Html->script('portfolio/jquery.quicksand.js');
	echo $this->Html->script('portfolio/setting.js');
	echo $this->Html->script('jquery.flexslider.js');
	echo $this->Html->script('animate.js');
	echo $this->Html->script('custom.js');
	echo $this->Html->script('jquery-ui-1.9.2.custom.js');
	echo $this->Html->script('carousel/jssor.slider-21.1.6.mini.js');
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');

	?>
	<script type="text/javascript">
		hljs.initHighlightingOnLoad();
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
	</script>
</head>
<body>
<?php //echo $this->Session->flash(); ?>

<div id="wrapper">

	<div class="container" style="width:99.5%">
		<?php //$this->element("headers/top_header")?>
	<?php //$this->element("menu_bar")?>

	<?php echo $this->fetch('content'); ?>

	</div>
	<?php //echo $this->element('footer'); ?>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<?php //echo $this->element('sql_dump'); ?>
<script>
	$(document).ready(function(){
		$('.user-login-btn').click(function(){

			var md = $.Zebra_Dialog('' +
			'<div class="row"><form onsubmit="return false">' +
							'<div class="col-md-3"><label>Username</label></div>'+
					'<div class="col-md-6" style="margin-bottom: 10px;"><input required="" id="username" type="email" name="data[User][username]" class="form-control"></div>'+
					'<div class="col-md-3"><label>Password</label></div>'+
					'<br><div class="col-md-6"><input required="" id="password" type="password" name="data[User][password]" class="form-control"></div>'+
							'<div class="col-md-3"></div><div class="col-md-6"><p id="error-msg" style="margin-top: 10px;display: none; color:red">Invalid User</p></div>'+
			'</form></div>'
			, {
				'type':     '',
				'width':450,
				overlay_close: false,
				'title':    'Login',
				'buttons':[
							{
								caption: 'Login', callback: function(e) {
								NProgress.start();
								$('#error-msg').hide().html('');

								$.ajax({
									data:{username:$("#username").val(),password:$('#password').val()},
									dataType:"json",
									type:"POST",
									url:'<?=Router::url(["controller"=>'users','action'=>'login'])?>',
									success:function(data){
										NProgress.done();
										if(data.status){

											window.location.href = window.location;
										}
										else{
											$('#error-msg').html(data.msg).show();
										}
									},
									error:function(xhr){NProgress.done();alert(xhr.responseText)}
								});
								e.preventDefault();
									//md.close();
							}
							},
					{
						caption: 'Cancel', callback: function(e) {
						md.close();
					}
					}
			]
			});
		});

	});

</script>
</body>
</html>
