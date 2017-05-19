<?php echo $this->Html->Script('admin.js');?>
<div class="admin_bar admin_bar_color">
    <h2>Edit Page
        <i class="fa fa-group"></i>
    </h2>
</div>
<div class="admin_table">
    <?php
    $url = array('controller' => 'admins', 'action' => 'save_page_text', 'plugin' => 'admin');
    echo $this->Form->create('AdminCms', array('url' => $url, "method" => "post", 'class' => 'form manageEvent'));
    ?>
    <div class="form-group">
        <label class="col-sm-2 control-label">Page Name</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input('page', array("readonly" => "readonly", 'value' => $edit_page['AdminCms']['page'], 'required' => true, 'type' => "text", 'label' => false, 'autoFocus' => 'autoFocus', 'placeholder' => 'Company Details', 'class' => "col-md-6 form-control"));?>
            <?php echo $this->Form->hidden('id', array('value' => $edit_page['AdminCms']['id'], 'type' => 'hidden', 'required' => true, 'type' => "text", 'label' => false, 'autoFocus' => 'autoFocus', 'placeholder' => 'Company Details', 'class' => "col-md-6 form-control"));?>
            <div class="clear"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Title </label>
            <div class="col-sm-10">
                <?php
                echo $this->Form->input('fields', array('value' => $edit_page['AdminCms']['fields'], 'required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Country'));
                ?>
                <div class="clear"></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Text</label>
                <div class="col-sm-10">
                    <?php
                    echo $this->Form->textarea('text', array("class" => "ckeditor", 'id' => 'editor_id', 'value' => $edit_page['AdminCms']['text'], 'required' => true, 'label' => false, 'class' => 'col-md-6 form-control', 'autoFocus' => 'autoFocus', 'placeholder' => 'Brief Description'));
                    ?>
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
            <script type="text/javascript">

            </script>


