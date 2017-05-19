<div class="admin_bar admin_bar_color">
    <h2>Event
        <i class="fa fa-briefcase"></i>
    </h2>
</div>
<div class="admin_table">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="innerAll bg-primary text-white margin-none">
                <span><i class="fa fa-reorder"></i>View Event</span>
        <span class="float_r margin-top8">
               <?php echo $this->Html->link('<button class="btn btn-primary hidden-print button_color"  type="button">
                       Manage Events
                   </button>', array('action' => 'manage_events'), array('escape' => false));?>

                </span>
            </div>
        </div>
        <div class="portlet-body form margin">
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
                        <th><?php echo $this->Html->link('Title', array('controller' => '', 'action' => '#'), array('title' => "linkname", 'class' => 'column_font'));?></th>
                        <th><?php echo $this->Html->link('Event start date', array('controller' => '', 'action' => '#'), array('title' => "linkname", 'class' => 'column_font'));?></th>
                        <th><?php echo $this->Html->link('Address', array('controller' => '', 'action' => '#'), array('title' => "linkname", 'class' => 'column_font'));?></th>

                        <th>Status</th>

                        <th class="last">Actions</th>
                    </tr>
                    </thead>
                    <tbody align="center">

                    <?php                     $sr_no = 0;
                    foreach ($events as $event) {
                        $sr_no++;

                        ?>
                    <tr>
                        <td>
                            <?php echo $sr_no; ?>
                        </td>
                        <td>
                            <?php echo $event['Event']['title']; ?>
                        </td>
                        <td>
                            <?php   echo $event['Event']['eventstartdate'];?>
                        </td>
                        <td>
                            <?php   echo $event['Event']['address'];?>
                        </td>

                        <td nowrap="nowrap" width="10%">
                            <?php
                            if ($event['Event']['status'] > 0) {
                                echo $this->Html->image('icon/status_active.png');
                            }
                            else {
                                echo $this->Html->image('icon/status_inactive.png');

                            }
                            ?>
                        </td>
                        <td class="last">
                            <?php
                            $url = array('controller' => 'Events', 'action' => 'manage_events' . '/' . $event['Event']['event_id']);
                            echo $this->Html->image('icon/pencil.png', array('url' => $url));
                            $url = array('controller' => 'Events', 'action' => 'delete_events' . '/' . $event['Event']['event_id']);
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








