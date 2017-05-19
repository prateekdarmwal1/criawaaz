<div class="admin_bar admin_bar_color">
    <h2> Pages
        <i class="fa fa-group"></i>
    </h2>
</div>
<div class="admin_table">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="innerAll bg-primary text-white margin-none"><span>View User</span>
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
                        <th><?php echo $this->Html->link('Page', array('controller' => '', 'action' => '#'), array('title' => "linkname", 'class' => 'column_font'));?></th>
                        <th><?php echo $this->Html->link('Title', array('controller' => '', 'action' => '#'), array('title' => "linkname", 'class' => 'column_font'));?></th>
                        <th><?php echo $this->Html->link('Text', array('controller' => '', 'action' => '#'), array('title' => "linkname", 'class' => 'column_font'));?></th>
                        <th class="last">Actions</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    <?php
                    $sr_no = 0;
                    foreach ($contents as $page) {
                        $sr_no++;
                        ?>
                    <tr>
                        <td><?php echo $sr_no; ?></td>
                        <td><?php echo $page['AdminCms']['page']; ?></td>
                        <td><?php echo $page['AdminCms']['fields']; ?></td>
                        <td><?php echo $page['AdminCms']['text']; ?></td>
                        <td class="last">
                            <?php
                            $url = array('controller' => 'Admins', 'action' => 'edit_page' . '/' . $page['AdminCms']['id']);
                            echo $this->Html->image('icon/pencil.png', array('url' => $url));
                            $url = array('controller' => 'Admins', 'action' => 'delete_page' . '/' . $page['AdminCms']['id']);
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
