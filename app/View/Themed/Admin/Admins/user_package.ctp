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
                        <tr class="gradeA">
                            <td>1</td>
                            <td>Nish</td>
                            <td>123456as</td>
                            <td>Fg S123456</td>
                            <td>deepansu.sl@gmail.com</td>
                            <td class="center"> <?php echo $this->Html->image("../img/status_active.png", array("border" => "none", "class" => "", "title" => "Active"));?>
                            </td>
                            <td class="center">
                            <span class="float_l" >
                                <?php echo $this->Html->link('<button class="btn btn-primary hidden-print button_color"  type="button">
                                                           View Invice
                                                      </button>', array('controller' => 'admins', 'action' => '#modal-view_invice'), array('data-toggle' => "modal", 'escape' => false));?>

                            </span>
                            </td>
                        </tr>
                        <tr class="gradeA">
                            <td>1</td>
                            <td>Nish</td>
                            <td>123456as</td>
                            <td>Fg S123456</td>
                            <td>deepansu.sl@gmail.com</td>
                            <td class="center"> <?php echo $this->Html->image("../img/status_active.png", array("border" => "none", "class" => "", "title" => "Active"));?>
                            </td>
                            <td class="center">
                            <span class="float_l" >
                                <?php echo $this->Html->link('<button class="btn btn-primary hidden-print button_color"  type="button">
                                                           View Invice
                                                      </button>', array('controller' => 'admins', 'action' => '#modal-view_invice'), array('data-toggle' => "modal", 'escape' => false));?>
                                <!--pop up box start-->
                                <!--pop up box end-->
                            </span>
                            </td>
                        </tr>
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
<div class="widget-body" id='view_invice'>
                                    <!-- Form Modal 1 -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-view_invice">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal heading -->
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                    Invice
                                                </div>
                                                <!-- // Modal heading END -->
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div>
                                                        Address:
                                                    </div>
                                                    <div>Contact:</div>
                                                    <div class="innerAll">
                                                        <div class="innerLR">
                                                            <form class="form-horizontal" role="form">

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
                                                                                <td>1</td>
                                                                                <td>Nish</td>
                                                                                <td>123456as</td>
                                                                                <td>Fg S123456</td>
                                                                            </tr>

                                                                           <tr>
                                                                                <td colspan='5'>&nbsp;</td>
                                                                            </tr>
                                                                            </tbody>
                                                                            <!-- // Table body END -->
                                                                        </table>
                                                                             <table>
                                                                                 <tbody>
                                                                        <tr>
                                                                            <td>&nbsp;</td>
                                                                            <td colspan='2'>This User Total Paid
                                                                                Amount
                                                                            </td>
                                                                            <td colspan='2'>EUR</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <form method="get" action="index.php"

                                                                                  class="form-horizontal form-row-seperated">
                                                                                <td colspan='3'>Add a request amount
                                                                                    to user for top search
                                                                                </td>
                                                                                <div class="input-append">
                                                                                    <input type="hidden"
                                                                                           name="page_id"
                                                                                           value="users"/>
                                                                                    <td>
                                                                                        <input class="span8 text"
                                                                                               placeholder="User id or Email"
                                                                                               value=""
                                                                                               id="appendedInputButton"
                                                                                               size="16"
                                                                                               name="search"
                                                                                               type="text">
                                                                                    </td>
                                                                                    <td>
                                                                                        <button
                                                                                            class="btn btn-primary hidden-print button_color"
                                                                                            type="button">
                                                                                            <i class=""></i>
                                                                                            Submit
                                                                                        </button>
                                                                                    </td>
                                                                                </div>
                                                                            </form>


                                                                        </tr>
                                                                       </tbody>
                                                                             </table>

                                                                        <!-- // Table END -->
                                                                    </div>
                                                                    <div class="float_l">Payment Method:</div>
                                                                   <div class="float_r">Total Amount:</div>

                                                                </div>

                                                                 </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- // Modal body END -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- // Modal END -->
                                </div>

