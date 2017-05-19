<?php echo $this->Html->Script('/user/js/jquery-1.10.2.min.js'); ?>
<?php echo $this->Html->Script('admin.js');?>
<div class="admin_bar admin_bar_color">
    <h2>Gift Code
        <i class="fa fa-briefcase"></i>
    </h2>
</div>
<div class="portlet-body form">
  <?php
    $url = array('controller' => 'gift_codes', 'action' => 'generate_code', 'plugin' => 'admin');
    echo $this->Form->create('GiftCode', array('url' => $url, "method" => "post",'class'=>'form giftCode'));
  ?>
    <div class="form-group">
    <label class="col-sm-2 control-label">Type</label>
    <div class="col-sm-10">
        <div class="btn-group bootstrap-select open">
            <?php
            $type=array();
                    $type = array('Monthly', 'Weekly','Day Wise');
                    echo $this->Form->select('type', $type, array('empty' => __('Choose Type'),'class'=>'selectpicker')); ?>
        </div>
    </div>
    <div class="clear"></div>
</div>
    <div class="clear"></div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Number of code</label>

        <div class="col-sm-10">
            <div class="btn-group bootstrap-select open">
                <?php
                $type=array();
                $type = array('5','10','50');
                echo $this->Form->select('number', $type, array('empty' => __('Choose Number of Code'),'class'=>'selectpicker')); ?>

            </div>
        </div>
        <div class="clear"></div>
    </div>
<!--save change button-->
<div class="add_new">
       <span class="float_l admin_bar">
   <button class="btn btn-primary hidden-print button_color" type="submit">
   Gnerate Code
   </button>
   </span>

</div>
    <?php echo $this->Form->end() ?>
</div>
<!--<script type="text/javascript">


</script>


-->