<div class="admin_bar admin_bar_color">
    <h2>Member_View_Data
        <i class="fa fa-user"></i>
    </h2>
</div>
<div class="admin_table">
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="innerAll bg-primary text-white margin-none">
                <span><i class="fa fa-reorder"></i> View Rating</span> <span class="float_r margin-top8"></span>
                <?php echo $this->Html->link('<span class="float_r"><i class="fa fa-fw icon-chevron-down-thick column_font margin-top5"></i>
                 </span>',array('action'=>'#sidebar-collapse-rating_click'),array('data-toggle' => "collapse",'escape'=>false));?>
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
                    <th class="color_white"><?php echo $this->Paginator->sort('ndate', 'Date'); ?></th>
                    <th class="color_white" ><?php echo $this->Paginator->sort('ip', 'User IP'); ?></th>
                    <th class="color_white" ><?php echo $this->Paginator->sort('page', 'Website URL'); ?></th>
                    <th class="color_white" ><?php echo $this->Paginator->sort('no', 'Hits'); ?></th>
                </tr>
                </thead>
                <tbody align="center">
                <?php
                $sr=0;
                foreach ($visited_results as $visited_result) {
                    $sr++;?>
                <tr>
                    <td nowrap="nowrap" width="10%;"><?php echo $sr; ?></td>
                    <td ><?php echo $visited_result['SiteVisit']['ndate']?></td>
                    <td ><?php echo $visited_result['SiteVisit']['ip']?></td>
                    <td ><?php echo $visited_result['SiteVisit']['page']?></td>
                    <td ><?php echo $visited_result['SiteVisit']['no']?></td>
                </tr>
                    <?php }?>
                </tbody>
            </table>
            <?php echo $this->element("paginator") ?>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>


