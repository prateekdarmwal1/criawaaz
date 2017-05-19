<?php echo $this->Html->Script('admin.js');?>
<div class="admin_bar admin_bar_color">
    <h2> Ratings
        <i class="fa fa-group"></i>
    </h2>
</div>
<div class="admin_table">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="innerAll bg-primary text-white margin-none"><span>View Rating</span>
            </div>
        </div>
    </div>
    <?php
    if (!empty($ratings)) {
        $id = $ratings['Rating']['id'];
    }
    $url = array('controller' => 'ratings', 'action' => 'edit_rating' . '/' . $id, 'plugin' => 'admin');
    echo $this->Form->create('Rating', array('url' => $url, "method" => "post",'class'=>'form manageRating'));
    ?>
    <div class="form-group">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
            <?php if (!empty($ratings['Rating']['name'])) {
            ?>
            <?php echo $this->Form->input('name', array('required' => true, 'type' => "text", 'label' => false,'autoFocus' => 'autoFocus', 'placeholder' => 'User Name', 'value' => $ratings['Rating']['name'],'class'=>"col-md-6 form-control"));?>
            <?php
        }?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Rating Count</label>
    <div class="col-sm-10">
        <?php if (!empty($ratings['Rating']['rating_count'])) {
        ?>
        <?php echo $this->Form->input('rating_count', array('required' => true, 'type' => "text", 'label' => false,'autoFocus' => 'autoFocus', 'placeholder' => 'User Name','value' => $ratings['Rating']['rating_count'],'class'=>"col-md-6 form-control"));?>
        <?php
    }?>
    </div>
    <div class="clear"></div>
    </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Rating For</label>
    <div class="col-sm-10">
        <?php if (!empty($ratings['Rating']['rating_for'])) {
        ?>
        <?php echo $this->Form->input('rating_for', array('required' => true, 'type' => "text", 'label' => false,'autoFocus' => 'autoFocus', 'placeholder' => 'User Name','value' => $ratings['Rating']['rating_for'],'class'=>"col-md-6 form-control"));?>
        <?php
    }?>
    </div>
    <div class="clear"></div>
        </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
        <?php if (!empty($ratings['Rating']['email'])) {
        ?>
        <?php echo $this->Form->input('email', array('required' => true, 'type' => "text", 'label' => false,'autoFocus' => 'autoFocus', 'placeholder' => 'User Name','value' => $ratings['Rating']['email'],'class'=>"col-md-6 form-control"));?>
        <?php
    }?>
    </div>
    <div class="clear"></div>
        </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Details</label>
    <div class="col-sm-10">
        <?php if (!empty($ratings['Rating']['msgs'])) {
        ?>
        <?php echo $this->Form->input('msgs', array('required' => true, 'type' => "textarea", 'label' => false,'autoFocus' => 'autoFocus', 'placeholder' => 'User Name','value' => $ratings['Rating']['msgs'],'class'=>"col-md-6 form-control"));?>
        <?php
    }?>
    </div>
    <div class="clear"></div>
        </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">
        <div class="btn-group bootstrap-select open">
            <?php if ($ratings['Rating']['status'] == 0 || $ratings['Rating']['status'] == 1) {
            ?>

            <?php
            $status = array('Deactivate', 'Activate');
            echo $this->Form->select('status', $status, array('empty' => __('Change Status'), 'value' => $ratings['Rating']['status'],'class'=>'selectpicker')); ?>

            <?php } ?>
        </div>
    </div>
    <div class="clear"></div>
        </div>
    <div class="form-group">
    <div class="add_new">
       <span class="float_l admin_bar">
   <button class="btn btn-primary hidden-print button_color" type="submit">
       Save changes
   </button>
   </span>
   <span class="float_l ">
       <button class="btn btn-primary hidden-print button_color" type="button">
           Cancel
       </button>
   </span>
    </div>
</div>
  <?php $this->Form->end(); ?>
</div>


