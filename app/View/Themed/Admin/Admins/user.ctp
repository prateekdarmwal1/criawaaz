_use<div class="admin_bar admin_bar_color">
    <h2> User
        <i class="fa fa-group"></i>
    </h2>
</div>
<div class="admin_table">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="innerAll bg-primary text-white margin-none"><span>View User</span>
             <span class="float_r">

                 <?php echo $this->Html->link('
<button class="btn btn-primary hidden-print button_color"
       type="button">
   <i class=""></i>
   Add User
</button>', array('action' => 'manage_user'), array('escape' => false));?>

</span>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="table-scrollable">
                <table class="table table-striped table-bordered table-pricing table-pricing-2" id="sample_1">
                    <tfoot>
                    <tr>
                        <td colspan="7">
                        </td>
                    </tr>
                    </tfoot>
                    <thead>
                    <tr>
                        <th>
                            <?php echo $this->Html->link('Sr. No.', array('controller' => '', 'action' => '#'), array('title' => "linkname", 'class' => 'column_font'));?></th>
                        <th><?php echo $this->Html->link('Company', array('controller' => '', 'action' => '#'), array('title' => "linkname", 'class' => 'column_font'));?></th>
                        <th><?php echo $this->Html->link('User Password', array('controller' => '', 'action' => '#'), array('title' => "linkname", 'class' => 'column_font'));?></th>
                        <th><?php echo $this->Html->link('Full Name', array('controller' => '', 'action' => '#'), array('title' => "linkname", 'class' => 'column_font'));?></th>
                        <th><?php echo $this->Html->link('Email', array('controller' => '', 'action' => '#'), array('title' => "linkname", 'class' => 'column_font'));?></th>
                        <th>Status</th>
                        <th class="last">Actions</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    <?php
                    $sr_no = 0;
                    foreach ($users as $user) {
                        $sr_no++;
                        ?>
                    <tr>
                        <td><?php echo $sr_no; ?></td>
                        <td><?php echo $user['User']['company']; ?></td>
                        <td><?php echo $user['User']['userpass']; ?></td>
                        <td><?php echo $user['User']['userfname']; ?>
                            &nbsp;<?php echo $user['User']['userlname']; ?></td>
                        <td><?php echo $user['User']['useremail'];?></td>
                        <td nowrap="nowrap"
                            width="10%"> <?php
                            if ($user['User']['status'] == 1)
                                echo $this->Html->image("icon/status_active.png", array("border" => "none", "class" => "", "title" => "Active"));
                            else
                                echo $this->Html->image("icon/status_inactive.png", array("border" => "none", "class" => "", "title" => "Active"));?>
                        </td>
                        <td class="last">
                            <?php
                            $url = array('controller' => 'Admins', 'action' => 'manage_user' . '/' . $user['User']['userid']);
                            echo $this->Html->image('icon/pencil.png', array('url' => $url));
                            $url = array('controller' => 'Admins', 'action' => 'delete_user' . '/' . $user['User']['userid']);
                            echo $this->Html->image('icon/cross.png', array('url' => $url));
                            ?>
                        </td>
                    </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
