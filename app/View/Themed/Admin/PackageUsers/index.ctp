<div class="admin_bar admin_bar_color">
    <h2>User_Package
    </h2>
</div>
<div class="admin_table">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="innerAll bg-primary text-white margin-none">
                <span><i class="fa fa-reorder"></i> View_package</span>
                <?php echo $this->Html->link('<span class="float_r"><i class="fa fa-fw icon-chevron-down-thick column_font margin-top5 "></i>
                        </span>', array('action' => '#sidebar-collapse-rating_click'), array('data-toggle' => "collapse", 'escape' => false));?>
            </div>
        </div>
    </div>
    <div class="collapse" id='sidebar-collapse-rating_click'>
        <div class="innerLR">
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                    <!-- Table -->
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->
                        <thead>
                        <tr>
                            <th>Package_id</th>
                            <th>Package_Name</th>
                            <th>User_Name</th>
                            <th>User_Mail</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>
                        <!-- Table row -->
                        <?php
                        $count = 0;
                        foreach ($payments as $payment) {
                            ?>
                        <tr class="gradeA">
                            <td><?php echo $payment['PackageUsers']['id']; ?></td>
                            <td><?php echo $payment['PackageUsers']['package_name']; ?></td>
                            <td><?php echo $payment['User']['userfname'];?> <?php echo $payment['User']['userlname']; ?></td>
                            <td><?php echo $payment['User']['useremail']; ?></td>
                            <td>EUR <?php echo $payment['PackageUsers']['price']; ?></td>
                            <td><?php echo date("d-M-Y", strtotime($payment['PackageUsers']['date'])); ?></td>
                            <td class="center"> <?php echo $this->Html->image("../img/icon/status_active.png", array("border" => "none", "class" => "", "title" => "Active"));?>
                            </td>
                            <td class="center">
                            <span class="float_l" style="margin-top: -8px;">
                                <?php

                                echo $this->Html->link('<button class="btn btn-primary hidden-print button_color"  type="button">
                                                           View Invoice
                                                      </button>', array('controller' => 'admins', 'action' => '#modal-view_invice_' . $count), array('data-toggle' => "modal", 'escape' => false));?>
                                <!--pop up box start-->
                                <!--pop up box end-->

                            </span>
                            </td>

                        </tr>
                            <?php
                            $count++;
                        } ?>

                        <!-- // Table row END -->
                        </tbody>
                        <!-- // Table body END -->
                    </table>
                    <!-- // Table END -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$count = 0;
foreach ($payments as $payment) {
    ?>
<div class="widget-body" id="view_invice_<?php echo $count ?>">
    <!-- Form Modal 1 -->
    <!-- Modal -->
    <div class="modal fade" id="modal-view_invice_<?php echo $count++;?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal heading -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    Invoice #<?php echo $payment['PackageUsers']['id']; ?>
                </div>
                <!-- // Modal heading END -->
                <!-- Modal body -->
                <div class="modal-body">
                    <div>
                        Address: <?php echo $payment['User']['company']; ?>,<?php echo $payment['User']['city']; ?>
                    </div>
                    <!--    <div>Contact:</div>-->
                    <div class="innerAll">
                        <div class="innerLR">
                            <div class="widget">
                                <div class="widget-body innerAll inner-2x">
                                    <!-- Table -->
                                    <table
                                        class="table table-striped table-responsive swipe-horizontal table-primary">
                                        <!-- Table heading -->
                                        <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>Reference</th>
                                            <th>Package Type</th>
                                            <th>Validity</th>
                                            <th>Total Price</th>
                                        </tr>
                                        </thead>
                                        <!-- // Table heading END -->
                                        <!-- Table body -->
                                        <tbody>
                                        <!-- Table row -->
                                        <tr class="gradeA">
                                            <td></td>
                                            <td><?php echo $payment['PackageUsers']['id']; ?></td>
                                            <td><?php echo $payment['PackageUsers']['package_name']; ?></td>
                                            <td><?php echo date("d-M-Y", strtotime($payment['PackageUsers']['date']));?>
                                                To <?php echo date("d-M-Y", strtotime($payment['PackageUsers']['end_date'])); ?></td>
                                            <td>EUR <?php echo $payment['PackageUsers']['price']; ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan='3'>Payment
                                                Method: <?php echo $payment['PackageUsers']['paymenttype']; ?></td>
                                            <td colspan='2'>Total Amount:
                                                EUR <?php echo $payment['PackageUsers']['price']; ?></td>
                                        </tr>
                                        </tbody>
                                        <!-- // Table body END -->
                                    </table>
                                    <!-- // Table END -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- // Modal body END -->
            </div>
        </div>
    </div>
    <!-- // Modal END -->
</div>
<?php } ?>
