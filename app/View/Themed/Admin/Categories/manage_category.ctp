<?php echo $this->Html->Script('admin.js');?>
<?php echo $this->Html->script("/assets/js/jquery-1.10.2.min.js");?>
<div class="admin_bar admin_bar_color">
    <h2>Category
        <i class="fa fa-briefcase"></i>
    </h2>
</div>
<div class="admin_table">
<div class="portlet box blue">
    <div class="portlet-title">
        <div class="innerAll bg-primary text-white margin-none">
            <span><i class="fa fa-reorder"></i> Add Category</span>
        </div>
    </div>
</div>
<div class="portlet-body form">
<?php
if (!empty($category)) {
    $type = 'edit';
    $id = $category['Category']['id'];
    $url = array('controller' => 'categories', 'action' => 'add_category' . '/' . $type . '/' . $id, 'plugin' => 'admin');
    echo $this->Form->create('Category', array('url' => $url, "method" => "post",'class'=>'form manageCategory'));
}
else
{
    $url = array('controller' => 'categories', 'action' => 'add_category', 'plugin' => 'admin');
    echo $this->Form->create('Category', array('url' => $url, "method" => "post",'class'=>'form manageCategory'));
}
?>
<!-- image box-->
<div class="form-group">
    <label class="col-sm-2 control-label">Category: </label>

    <div class="col-sm-10">
        <?php if (!empty($category['Category']['category_name'])) {
        ?>
        <?php echo $this->Form->input('category_name', array('required' => true, 'label' => false,'id' => "inputTitle",'type' => "text", 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Title', 'value' => $category['Category']['category_name']));?>


        <?php
    } else {
        ?>
        <?php echo $this->Form->input('category_name', array( 'type' => "text",'required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Title','id' => "inputTitle"));?>

        <?php } ?>
    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Parent</label>

    <div class="col-sm-10">
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
           echo $this->Form->select('is_parent', $cat_array, array('empty' => __('Choose Parent'), 'value' =>$category['Category']['category_name'],'class'=>'selectpicker')); ?>
        <?php } else { ?>
        <?php
        $status = array('Active', 'Deactivate');
        echo $this->Form->select('is_parent', $cat_array, array('empty' => __('Choose Parent'),'class'=>'selectpicker')); ?>
        <?php }
         }
        ?>
     </div>
    <div class="clear"></div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">
        <div class="btn-group bootstrap-select open">
            <?php if (!empty($category['Category']['status'])) {
            ?>

            <?php
            $status = array('Active', 'Deactivate');
            echo $this->Form->select('status', $status, array('empty' => __('Change Status'), 'value' => $category['Category']['status'],'class'=>'selectpicker')); ?>

            <?php } else { ?>

            <?php
            $status = array('Active', 'Deactivate');
            echo $this->Form->select('status', $status, array('empty' => __('Change Status'),'class'=>'selectpicker')); ?>

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

          <a class="btn btn-primary hidden-print button_color"  href="/event_matador/admin/admins/dashboard_users" style="color: white;"> Cancel </a>

   </span>
</div>
<?php echo $this->Form->end() ?>

</div>
    </div>





