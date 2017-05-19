<div class="admin_bar admin_bar_color">
    <h2> Rating
        <i class="fa fa-bar-chart-o"></i>
    </h2>
</div>
<div class="admin_table">
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="innerAll bg-primary text-white margin-none">
                <span> <i class="fa fa-reorder"></i> View Rating</span>
        <span class="float_r margin-top8">
                </span>
                <?php echo $this->Html->link('<span class="float_r"><i class="fa fa-fw icon-chevron-down-thick column_font " style="margin-top:5px "></i>
        </span>',array('action'=>'#'),array('escape'=>false));?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="portlet-body form margin" >
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
                    <th>Sr.no</th>

                    <th>Name</th>
                    <th>Rating Count</th>
                    <th>Rating For</th>
                    <th>Details</th>
                    <th>Status</th>

                    <th class="last">Actions</th>
                </tr>
                </thead>
                <tbody align="center">
                 <?php
            $sr_no = 0;

           foreach ($ratings as $rating) {
            $sr_no++;
          ?>
                <tr>
                    <td nowrap="nowrap"><?php echo $sr_no; ?></td>
                    <td nowrap="nowrap"> <?php echo $rating['Rating']['name']; ?> </td>
                    <td> <?php   echo $rating['Rating']['rating_count'];?></td>
                    <td><?php echo $rating['Rating']['rating_for'];?> </td>
                     <td> <?php echo $rating['Rating']['msgs'];?></td>
                    <td nowrap="nowrap" width="10%">
                        <?php
                        if ($rating['Rating']['status'] > 0) {
                            echo $this->Html->image('icon/status_active.png');
                        }
                        else {
                            echo $this->Html->image('icon/status_inactive.png');

                        }
                        ?>
                    </td>
                    <td class="last">
                        <?php
                        $url = array('controller' => 'ratings', 'action' => 'manage_rating/' . $rating['Rating']['id']);
                        echo $this->Html->image('icon/pencil.png', array('url' => $url));

                        ?>

                    </td>
                </tr>
             <?php }?>

                </tbody>
            </table>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>
