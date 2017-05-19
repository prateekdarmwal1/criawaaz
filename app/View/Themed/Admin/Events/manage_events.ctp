<?php echo $this->Html->script("/assets/js/jquery-1.10.2.min.js");?>
<?php echo $this->Html->Script('admin.js');?>
<div class="admin_bar admin_bar_color">
    <h2>Event
        <i class="fa fa-briefcase"></i>
    </h2>
</div>
<div class="admin_table">
<div class="portlet box blue">
    <div class="portlet-title">

        <div class="innerAll bg-primary text-white margin-none">
            <span><i class="fa fa-reorder"></i> Add Event</span>

        </div>
    </div>
</div>
<div class="portlet-body form">
<?php
if (!empty($edit_event)) {
    $type = 'edit';
    $id = $edit_event['Event']['event_id'];
    $url = array('controller' => 'events', 'action' => 'add_event' . '/' . $type . '/' . $id, 'plugin' => 'admin');
    echo $this->Form->create('Event', array('url' => $url, "method" => "post", 'class' => 'form manageEvent'));
}
else
{

    $url = array('controller' => 'events', 'action' => 'add_event', 'plugin' => 'admin');
    echo $this->Form->create('Event', array('url' => $url, "method" => "post", 'class' => 'form manageEvent'));
}
?>


<!-- image box-->
<div class="form-group">
    <label class="col-sm-2 control-label">Event Title</label>

    <div class="col-sm-10">
        <?php if (!empty($edit_event['Event']['title'])) {
        ?>
        <?php echo $this->Form->input('title', array('required' => true, 'label' => false, 'id' => "inputTitle", 'type' => "text", 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Title', 'value' => $edit_event['Event']['title'])); ?>


        <?php
    } else {
        ?>
        <?php echo $this->Form->input('title', array('type' => "text", 'required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Title', 'id' => "inputTitle")); ?>

        <?php } ?>

    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Estimated Guest</label>

    <div class="col-sm-10">
        <?php if (!empty($edit_event['Event']['guest'])) {
        ?>

        <?php
        echo $this->Form->input('guest', array('required' => true, 'type' => 'text', 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Estimate Guest', 'value' => $edit_event['Event']['guest']));
        ?>

        <?php } else { ?>

        <?php
        echo $this->Form->input('guest', array('required' => true, 'type' => 'text', 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Estimate Guest'));
        ?>
        <?php } ?>


    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Category</label>

    <div class="col-sm-10">
        <div class="btn-group bootstrap-select open">
            <?php
            $cat_array=array();
            if (!empty($all_categories)) {
                $cat_array[]='Main';
                foreach($all_categories as $temp_category)
                {
                    $cat_array[$temp_category['Category']['id']]=$temp_category['Category']['category_name'];
                }
                ?>
                <?php
                if(!empty($category['Category']['category_name'])){
                    echo $this->Form->select('catid', $cat_array, array('empty' => __('Choose Category'), 'value' =>$category['Category']['category_name'],'class'=>'selectpicker')); ?>
                    <?php } else { ?>
                    <?php
                    $status = array('Active', 'Deactivate');
                    echo $this->Form->select('catid', $cat_array, array('empty' => __('Choose Category'),'class'=>'selectpicker')); ?>
                    <?php }
            }
            ?>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Event Start Date</label>

    <div class="col-sm-10">

        <?php if (!empty($edit_event['Event']['eventstartdate'])) {
        ?>

        <?php
        echo $this->Form->input('eventstartdate', array('required' => true, 'label' => false, 'class' => 'input-block-level', 'autoFocus' => 'autoFocus', 'placeholder' => 'Brief Description', 'value' => $edit_event['Event']['eventstartdate']));
        ?>
        <?php } else { ?>


        <?php
        echo $this->Form->input('eventstartdate', array('required' => true, 'label' => false, 'class' => 'input-block-level', 'autoFocus' => 'autoFocus', 'placeholder' => 'Brief Description'));
        ?>
        <?php } ?>

    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Address Of Event</label>

    <div class="col-sm-10">
        <?php if (!empty($edit_event['Event']['address'])) {
        ?>
        <?php
        echo $this->Form->input('address', array('type' => 'textarea', 'required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'ZIP', 'value' => $edit_event['Event']['address']));
        ?>
        <?php } else { ?>

        <?php
        echo $this->Form->input('address', array('type' => 'textarea', 'required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Address'));
        ?>
        <?php } ?>

        <div class="clear"></div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">City</label>

    <div class="col-sm-10">
        <?php if (!empty($edit_event['Event']['city'])) {
        ?>
        <?php
        echo $this->Form->input('city', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'City', 'value' => $edit_event['Event']['city']));
        ?>
        <?php } else { ?>
        <?php
        echo $this->Form->input('city', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'City'));
        ?>
        <?php } ?>


    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Zip</label>

    <div class="col-sm-10">
        <?php if (!empty($edit_event['Event']['zip'])) {
        ?>

        <?php
        echo $this->Form->input('zip', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'ZIP', 'value' => $edit_event['Event']['zip']));
        ?>
        <?php } else { ?>


        <?php
        echo $this->Form->input('zip', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'ZIP'));
        ?>
        <?php } ?>

    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Brief Description</label>


    <div
        class="col-sm-10">

        <?php if (!empty($edit_event['Event']['description'])) {
        ?>

        <?php
        echo $this->Form->input('description', array('required' => true, 'type' => 'textarea', 'label' => false, 'autoFocus' => 'autoFocus', 'placeholder' => 'Brief Description', 'value' => $edit_event['Event']['description'], 'class' => 'form-control'));
        ?>
        <?php } else { ?>

        <?php
        echo $this->Form->input('description', array('required' => true, 'type' => 'textarea', 'label' => false, 'autoFocus' => 'autoFocus', 'placeholder' => 'Brief Description', 'class' => 'form-control'));
        ?>
        <?php } ?>


    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Event Contact Number</label>

    <div class="col-sm-10">
        <?php if (!empty($edit_event['Event']['eventcontact'])) {
        ?>

        <?php
        echo $this->Form->input('eventcontact', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Event Contact', 'value' => $edit_event['Event']['eventcontact']));
        ?>

        <?php } else { ?>

        <?php        echo $this->Form->input('eventcontact', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Event Contact'));
        ?>
        <?php } ?>


    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Event Contact E-mail</label>

    <div class="col-sm-10">
        <?php if (!empty($edit_event['Event']['useremail'])) {
        ?>

        <?php
        echo $this->Form->input('useremail', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Email', 'value' => $edit_event['Event']['useremail']));
        ?>
        <?php } else { ?>

        <?php
        echo $this->Form->input('useremail', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Email'));
        ?>
        <?php } ?>


    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Gender</label>

    <div class="col-sm-10">
        <div class="btn-group bootstrap-select open">
            <?php if (!empty($edit_event['Event']['gender'])) {
            ?>

            <div class="controls">
                <?php
                $title = array('Mr.', 'Mrs.');
                echo $this->Form->select('gender', $title, array('empty' => __('Select Gender'), "required" => true, 'value' => $edit_event['Event']['gender'], 'class' => 'selectpicker')); ?>
            </div>

            <?php } else { ?>

            <div class="controls">
                <?php
                $title = array('Mr.', 'Mrs.');
                echo $this->Form->select('gender', $title, array('empty' => __('Select Gender'), "required" => true, 'class' => 'selectpicker')); ?>
            </div>

            <?php } ?>

        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">First Name</label>

    <div class="col-sm-10">
        <?php if (!empty($edit_event['Event']['fname'])) {
        ?>

        <?php
        echo $this->Form->input('fname', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'First Name', 'value' => $edit_event['Event']['fname']));
        ?>
        <?php } else { ?>

        <?php
        echo $this->Form->input('fname', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'First name'));
        ?>
        <?php } ?>

    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Last Name</label>

    <div class="col-sm-10">
        <?php if (!empty($edit_event['Event']['lname'])) {
        ?>

        <?php
        echo $this->Form->input('lname', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Last Name', 'value' => $edit_event['Event']['lname']));
        ?>
        <?php } else { ?>

        <?php
        echo $this->Form->input('lname', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Last Name'));
        ?>

        <?php } ?>

    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<div class="form-group">
    <label class="col-sm-2 control-label">Status</label>

    <div class="col-sm-10">
        <div class="btn-group bootstrap-select open">
            <?php if (!empty($edit_event['Event']['status'])) {
            ?>

            <?php
            $status = array('Active', 'Deactivate');
            echo $this->Form->select('status', $status, array('empty' => __('Change Status'), 'value' => $edit_event['Event']['status'], 'class' => 'selectpicker')); ?>

            <?php } else { ?>

            <?php
            $status = array('Active', 'Deactivate');
            echo $this->Form->select('status', $status, array('empty' => __('Change Status'), 'class' => 'selectpicker')); ?>

            <?php } ?>
        </div>
    </div>
    <div class="clear"></div>
</div>

<!--save change button-->
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
<?php echo $this->Form->end() ?>
</div>



