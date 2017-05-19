<?php echo $this->Html->script("/assets/js/jquery-1.10.2.min.js");?>
<?php echo $this->Html->script('admin.js');?>
<div class="admin_bar admin_bar_color">

    <h2> User
        <i class="fa fa-group"></i>
    </h2>

</div>
<div class="admin_table">

<div class="portlet box blue">

    <div class="portlet-title">

        <div class="innerAll bg-primary text-white margin-none"><span>View User</span>
          <span class="float_r margin-top8" >

      <button class="btn btn-primary hidden-print button_color" data-target="#pdfTarget"
              data-toggle="button-loading pdf"
              type="button">
          <i class=""></i>
          Add User
      </button>
      </span>
        </div>
    </div>
</div>

<!--<form class="form-horizontal" role="form">-->
<?php
if (!empty($edit_user)) {
    $type = 'edit';
    $id = $edit_user['User']['userid'];
    $url = array('controller' => 'admins', 'action' => 'add_user' . '/' . $type . '/' . $id, 'plugin' => 'admin');
    echo $this->Form->create('User', array('url' => $url, "method" => "post",'class'=>'form manageUser'));
}
else
{

    $url = array('controller' => 'admins', 'action' => 'add_user', 'plugin' => 'admin');
    echo $this->Form->create('User', array('url' => $url, "method" => "post",'class'=>'form manageUser'));
}
?>


<div class="form-group">
    <label class="col-sm-2 control-label">Company</label>

    <div class="col-sm-10">
        <?php if (!empty($edit_user['User']['company'])) {
        ?>
        <?php echo $this->Form->input('company', array('required' => true, 'type' => "text", 'label' => false,'autoFocus' => 'autoFocus', 'placeholder' => 'Company Details', 'value' => $edit_user['User']['company'],'class'=>"col-md-6 form-control"));?>
        <?php
    } else {
        ?>
        <?php echo $this->Form->input('company', array('required' => true, 'type' => "text", 'label' => false, 'autoFocus' => 'autoFocus', 'placeholder' => 'Company Details','class'=>"col-md-6 form-control"));?>

        <?php } ?>

       </div>
    <div class="clear"></div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Country </label>

    <div class="col-sm-10">
        <?php if (!empty($edit_user['User']['country'])) {
        ?>
        <?php
        echo $this->Form->input('country', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Country', 'value' => $edit_user['User']['country']));
        ?>
        <?php } else { ?>

        <?php
        echo $this->Form->input('country', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Country'));
        ?>
        <?php } ?>

         </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">City </label>

    <div class="col-sm-10">
        <?php if (!empty($edit_user['User']['city'])) {
        ?>

        <?php
        echo $this->Form->input('city', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Brief Description', 'value' => $edit_user['User']['city']));
        ?>
        <?php } else { ?>


        <?php
        echo $this->Form->input('city', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Brief Description'));
        ?>
        <?php } ?>
       </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Post-Code </label>

    <div class="col-sm-10">

        <?php if (!empty($edit_user['User']['zip'])) {
        ?>

        <?php
        echo $this->Form->input('zip', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Brief Description', 'value' => $edit_user['User']['zip']));
        ?>
        <?php } else { ?>


        <?php
        echo $this->Form->input('zip', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Brief Description'));
        ?>
        <?php } ?>

    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Phone </label>

    <div class="col-sm-10">

        <?php if (!empty($edit_user['User']['phone'])) {
        ?>

        <?php
        echo $this->Form->input('phone', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Phone Number', 'value' => $edit_user['User']['phone']));
        ?>
        <?php } else { ?>

        <?php
        echo $this->Form->input('phone', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Phone Number'));
        ?>
        <?php } ?>



    </div>
    <div class="clear"></div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Fax </label>

    <div class="col-sm-10">
        <?php if (!empty($edit_user['User']['fax'])) {
        ?>

        <?php
        echo $this->Form->input('fax', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Fax', 'value' => $edit_user['User']['fax']));
        ?>
        <?php } else { ?>
        <?php
        echo $this->Form->input('fax', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Fax'));
        ?>
        <?php } ?>

        </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Mobile </label>

    <div class="col-sm-10">
        <?php if (!empty($edit_user['User']['mobile'])) {
        ?>

        <?php
        echo $this->Form->input('mobile', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Brief Description', 'value' => $edit_user['User']['mobile']));
        ?>
        <?php } else { ?>

        <?php
        echo $this->Form->input('mobile', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Brief Description'));
        ?>
        <?php } ?>

    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Email </label>

    <div class="col-sm-10">
        <?php if (!empty($edit_user['User']['useremail'])) {
        ?>
        <?php
        echo $this->Form->input('useremail', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Email', 'value' => $edit_user['User']['useremail']));
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
    <label class="col-sm-2 control-label">User Password </label>

    <div class="col-sm-10">
        <?php if (!empty($edit_user['User']['userpass'])) {
        ?>
        <?php
        echo $this->Form->input('userpass', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Password', 'value' => $edit_user['User']['userpass']));
        ?>
        <?php } else { ?>

        <?php
        echo $this->Form->input('userpass', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Password'));
        ?>
        <?php } ?>

         </div>
    <div class="clear"></div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Website</label>

    <div class="col-sm-10">
        <?php if (!empty($edit_user['User']['web'])) {
        ?>
        <?php
        echo $this->Form->input('web', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Web Site', 'value' => $edit_user['User']['web']));
        ?>
        <?php } else { ?>
        <?php
        echo $this->Form->input('web', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Web Site'));
        ?>
        <?php } ?>


         </div>
    <div class="clear"></div>
</div>


<div class="form-group">
    <label class="col-sm-2 control-label">Title</label>

    <div class="btn-group bootstrap-select open col-sm-10">

        <?php if (!empty($edit_user['User']['contact_title'])) {
        ?>

        <div class="controls">
            <?php
            $title = array('Mr.', 'Mrs.');
            echo $this->Form->select('contact_title', $title, array('class'=>'selectpicker','empty' => __('Select Gender'), "required" => true, 'value' => $edit_user['User']['contact_title'], 'class' => 'col-md-6 form-control')); ?>
        </div>

        <?php } else { ?>

        <div class="controls">
            <?php
            $title = array('Mr.', 'Mrs.');
            echo $this->Form->select('contact_title', $title, array('empty' => __('Select Gender'), "required" => true, 'class' => 'col-md-6 form-control')); ?>
        </div>

        <?php } ?>

           </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">First Name</label>

    <div class="col-sm-10">

        <?php if (!empty($edit_user['User']['userfname'])) {
        ?>
        <?php
        echo $this->Form->input('userfname', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Brief Description', 'value' => $edit_user['User']['userfname']));
        ?>
        <?php } else { ?>

        <?php
        echo $this->Form->input('userfname', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Brief Description'));
        ?>
        <?php } ?>
        </div>
    <div class="clear"></div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Last Name</label>

    <div class="col-sm-10">
        <?php if (!empty($edit_user['User']['userlname'])) {
        ?>
        <?php
        echo $this->Form->input('userlname', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Brief Description', 'value' => $edit_user['User']['userlname']));
        ?>
        <?php } else { ?>

        <?php
        echo $this->Form->input('userlname', array('required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Brief Description'));
        ?>

        <?php } ?>

        </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Status</label>

    <div class="btn-group bootstrap-select open col-sm-10">
        <?php if (!empty($edit_user['User']['status'])) {
        ?>

        <?php
        $status = array('Active', 'Deactivate');
        echo $this->Form->select('status', $status, array('class'=>'selectpicker','empty' => __('Change Status'), 'value' => $edit_user['User']['status'], 'class' => 'col-md-6 form-control')); ?>

        <?php } else { ?>
        <?php
        $status = array('Active', 'Deactivate');
        echo $this->Form->select('status', $status, array('empty' => __('Change Status'), 'class' => 'col-md-6 form-control')); ?>
        <?php } ?>
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





