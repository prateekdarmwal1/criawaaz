<div class="admin_bar admin_bar_color">
    <h2> User
        <i class="fa fa-group"></i>
    </h2>
</div>
<div class="admin_table">
    <div class="portlet box blue">
        <div class="portlet-title">

          <span class="float_r margin-top10">
      <form method="get" action="index.php" class="form-horizontal form-row-seperated float_r margin3">
          <div class="input-append">
              <input type="hidden" name="page_id" value="users"/>
              <input class="span8 text" placeholder="User id or Email" value="" id="appendedInputButton" size="16"
                     name="search" type="text">
              <button class="btn btn-primary hidden-print button_color" data-target="#pdfTarget"
                      data-target="button-loading pdf" type="button">
                  <i class=""></i>
                  Go!
              </button>
          </div>
      </form>
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
    <form class="form-horizontal" role="form">

        <!-- image box-->
        <div class="form-group">
            <label class="col-sm-2 control-label">Event Title</label>

            <div class="col-sm-10">

                <?php echo $this->Form->input('', array('placeholder' => __(''), 'type' => "text", "required" => true, 'id' => "inputTitle", 'class' => "col-md-6 form-control"));?>
            </div>
            <div class="clear"></div>
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label">Company</label>

            <div class="col-sm-10">


                <?php echo $this->Form->input('', array('placeholder' => __(''), 'type' => "text", "required" => true, 'id' => "inputTitle", 'class' => "col-md-6 form-control"));?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Address</label>

            <div class="col-sm-10">

                <?php echo $this->Form->input('', array('placeholder' => __(''), 'type' => "text", "required" => true, 'id' => "inputTitle", 'class' => "col-md-6 form-control"));?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Country </label>

            <div class="col-sm-10">


                <?php echo $this->Form->input('', array('placeholder' => __(''), 'type' => "text", "required" => true, 'id' => "inputTitle", 'class' => "col-md-6 form-control"));?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">City </label>

            <div class="col-sm-10">
                <?php echo $this->Form->input('', array('placeholder' => __(''), 'type' => "text", "required" => true, 'id' => "inputTitle", 'class' => "col-md-6 form-control"));?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Post-Code </label>

            <div class="col-sm-10">

                <?php echo $this->Form->input('', array('placeholder' => __(''), 'type' => "text", "required" => true, 'id' => "inputTitle", 'class' => "col-md-6 form-control"));?>

            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Phone </label>

            <div class="col-sm-10">

                <?php echo $this->Form->input('', array('placeholder' => __(''), 'type' => "text", "required" => true, 'id' => "inputTitle", 'class' => "col-md-6 form-control"));?>
                <div class="clear"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Fax </label>

            <div class="col-sm-10">
                <?php echo $this->Form->input('', array('placeholder' => __(''), 'type' => "text", "required" => true, 'id' => "inputTitle", 'class' => "col-md-6 form-control"));?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Mobile </label>

            <div class="col-sm-10">
                <?php echo $this->Form->input('', array('placeholder' => __(''), 'type' => "text", "required" => true, 'id' => "inputTitle", 'class' => "col-md-6 form-control"));?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Email </label>

            <div class="col-sm-10">
                <?php echo $this->Form->input('', array('placeholder' => __(''), 'type' => "text", "required" => true, 'id' => "inputTitle", 'class' => "col-md-6 form-control"));?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">User Password </label>

            <div class="col-sm-10">
                <?php echo $this->Form->input('', array('placeholder' => __(''), 'type' => "text", "required" => true, 'id' => "inputTitle", 'class' => "col-md-6 form-control"));?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Title</label>

            <div class="btn-group bootstrap-select open col-sm-10">
                <select class=" selectpicker">
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">First Name</label>

            <div class="col-sm-10">
                <?php echo $this->Form->input('', array('placeholder' => __(''), 'type' => "text", "required" => true, 'id' => "inputTitle", 'class' => "col-md-6 form-control"));?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Last Name</label>

            <div class="col-sm-10">
                <?php echo $this->Form->input('', array('placeholder' => __(''), 'type' => "text", "required" => true, 'id' => "inputTitle", 'class' => "col-md-6 form-control"));?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Status</label>

            <div class="btn-group bootstrap-select open col-sm-10">
                <select class=" selectpicker">
                    <option>Active</option>
                    <option>Inactive</option>
                    <option>Pending</option>
                </select>
            </div>
            <div class="clear"></div>
        </div>
        <!--save change button-->
        <div class="form-group">
        <span class="col-sm-2">
    <button class="btn btn-primary hidden-print button_color" data-target="add_new" data-toggle="button-loading pdf"
            type="button">
        Save changes
    </button>
    </span>
    <span class="col-sm-2">
        <button class="btn btn-primary hidden-print button_color" data-target="add_new"
                data-toggle="button-loading pdf" type="button">
            Cancel
        </button>
    </span>
        </div>
    </form>
</div>