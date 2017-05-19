<?php //die;?>
<div id="mws-login">
    <h1>Login</h1>
    <div class="mws-login-lock">
        <?=$this->Html->image('../css/css/icons/24/locked-2.png');?>

    </div>
    <?php echo $this->Session->flash(); ?>
    <div id="mws-login-form">

        <?=$this->Form->create("Admin",["class"=>"mws-form"])?>
            <div class="mws-form-row">
                <div class="mws-form-item large">
                    <?=$this->Form->input('email',['type'=>"text",'id'=>'email', 'class'=>"mws-login-username mws-textinput required",'placeholder'=>"username"])?>
                </div>
            </div>
            <div class="mws-form-row">
                <div class="mws-form-item large">

                    <input type="password" name="password" id="password" class="mws-login-password mws-textinput required" placeholder="password" />
                </div>
            </div>
<!--            <div class="mws-form-row mws-inset">-->
<!--                <ul class="mws-form-list inline">-->
<!--                    <li><input type="checkbox" /> <label>Remember me</label></li>-->
<!--                </ul>-->
<!--            </div>-->
            <div class="mws-form-row">
                <input type="submit" value="Login" class="mws-button green mws-login-button" />
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