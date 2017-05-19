<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Apple iOS and Android stuff (do not remove) -->
    <meta name="apple-mobile-web-app-capable" content="no" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1" />

    <!-- Required Stylesheets -->
    <?php
    echo $this->Html->meta('icon');
    echo $this->Html->css('nprogress.css');
    echo $this->Html->css('modal/reset.css');
    /*MODEL BOX CSS*/
    echo $this->Html->css('modal/default/zebra_dialog.css');

    echo $this->Html->css('css/reset.css');
    echo $this->Html->css('css/text.css');
    echo $this->Html->css('css/fonts/ptsans/stylesheet.css');
    echo $this->Html->css('css/core/form.css');
    echo $this->Html->css('css/core/login.css');
    echo $this->Html->css('css/core/button.css');
    echo $this->Html->css('css/mws.theme.css');

    echo $this->Html->script('js/jquery-1.7.2.min.js');
    echo $this->Html->script('js/jquery.placeholder.js');
    echo $this->Html->script('../jui/js/jquery-ui-effects.min.js');

    echo $this->Html->script('../plugins/validate/jquery.validate-min.js');
    echo $this->Html->script('nprogress.js');
    echo $this->Html->script('modal/zebra_dialog.js');
    echo $this->Html->script('modal/main.js');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
    <title>Login</title>

</head>

<body>

<div id="mws-login-wrapper">

    <?php echo $this->fetch('content'); ?>
</div>

</body>
</html>
