<?php //die;?>
<div id="mws-login">
   
    <?php echo $this->Session->flash(); ?>
    <div id="mws-login-form">
        <?php $url = Router::url(["controller"=>"admins",'action'=>'password']); ?>
        <?=$this->Form->create("Admin",[$url,"class"=>"mws-form"])?>
            <div class="mws-form-row">
                <div class="mws-form-item large">

                    <input type="password" name="password" id="password" class="mws-login-password mws-textinput required" placeholder="password" />
                </div>
            </div>
            <div class="mws-form-row">
                <input type="submit" value="Change Password" class="mws-button green mws-login-button" />
            </div>
        <?=$this->Form->end()?>
    </div>
</div>

<script>

    (function($) {
        $(document).ready(function() {

            $("#mws-login-form form").validate({
                rules: {
                    email: {required: true},
                    password: {required: true}
                },
                errorPlacement: function(error, element) {
                },
                invalidHandler: function(form, validator) {
                    if($.fn.effect) {
                        $("#mws-login").effect("shake", {distance: 6, times: 2}, 35);
                    }
                }

            });


            if($.fn.placeholder) {
                $('[placeholder]').placeholder();
            }
        });
    }) (jQuery);

</script>