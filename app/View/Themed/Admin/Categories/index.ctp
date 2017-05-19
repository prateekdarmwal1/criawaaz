<div class="admin_bar admin_bar_color">
    <h2>Category<i class="fa fa-briefcase"></i></h2>
</div>
<div class="admin_table">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="innerAll bg-primary text-white margin-none">
                <span> <i class=""></i> View Category</span><span class="float_r margin-top8">
                <div class="hasSubmenu">
                    <?php echo $this->Html->link('<button class="btn btn-primary hidden-print button_color" type="button">
                                Add New
                           </button>', array('controller' => 'categories', 'action' => 'manage_category'), array('escape' => false));?>
                </div>
        </span>
            </div>
        </div>
        <div class="clear"></div>
        <div class="portlet-body form margin">
            <div class="table-scrollable">
                <?php if (!empty($categories)) { ?>
                <table class="table table-striped table-bordered table-pricing table-pricing-2" id="sample_1">
                    <tfoot>
                    <tr>
                        <td colspan="7">
                        </td>
                    </tr>
                    </tfoot>
                    <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th class="last">Actions</th>
                    </tr>
                    </thead>
                    <tbody align="center">

                        <?php $sr_no = 0;

                        foreach ($categories as $category) {
                            $sr_no++;

                            ?>
                        <tr>
                            <td>
                                <?php echo $sr_no; ?>
                            </td>
                            <td>
                                <?php echo $category['Category']['category_name'] ?>
                            </td>
                            <td nowrap="nowrap" width="10%">
                                <?php

                                if ($category['Category']['status'] > 0) {

                                    echo $this->Html->image('icon/status_active.png');
                                }
                                else {


                                    echo $this->Html->image('icon/status_inactive.png');

                                }
                                ?>

                            </td>
                            <td class="last">
                                <?php
                                $url = array('controller' => 'Categories', 'action' => 'manage_category' . '/' . $category['Category']['id']);
                                echo $this->Html->image('icon/pencil.png', array('url' => $url));
                                $url = array('controller' => 'Categories', 'action' => 'delete_category' . '/' . $category['Category']['id']);
                                echo $this->Html->image('icon/cross.png', array('url' => $url));
                                ?>
                            </td>
                        </tr>
                            <?php } ?>
                    </tbody>
                </table>
                <?php } else { ?>
                <h3>No Record Found</h3>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<div id="sidebar-collapse-Addnew" class="collapse ">
    <div class="admin_table">
        <!-- image box-->
        <form class="form-horizontal" role="form">
            <!-- image box-->
            <div class="form-group">
                <label class="col-sm-2 control-label">Image Title</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('', array('placeholder' => __(''), 'type' => "text", "required" => true, 'id' => "inputTitle", 'class' => "col-md-6 form-control"));?>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Content Image</label>
                <div class=" col-sm-10">
                    <samp>
                        <input id="html_btn" type='file'/></samp>
                </div>
                <div class="clear"></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                    <div class="btn-group bootstrap-select open">
                        <select class=" selectpicker">
                            <option>Active</option>
                            <option>Inactive</option>
                            <option>Pending</option>
                        </select>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
    </div>
    <!--save change button-->
    <div> <span class="float_l admin_bar">
      <button class="btn btn-primary hidden-print button_color" data-target="add_new" data-toggle="button-loading pdf"
              type="button">
          Save changes
      </button>               </span>
      <span class="float_l "><button class="btn btn-primary hidden-print button_color" data-target="add_new"
                                     data-toggle="button-loading pdf" type="button">
          Cancel
      </button>                      </span>
    </div>
</div>
<div class="clear"></div>
<div class="admin_table hide">
    <div class="portlet box green">

<span><div class="alert alert-success">
    <button class="close" data-dismiss="alert" type="button">×</button>
    <strong>Warning!</strong>
    No Record Found .
</div>
    </span>
    </div>
</div>