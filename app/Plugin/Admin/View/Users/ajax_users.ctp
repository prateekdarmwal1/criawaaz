<?php
echo $this->Html->script('jquery.js');
$this->Paginator->options(
        array("update" => "#contents",
            "before" => $this->Js->get("#ajax_container")
                    ->effect("fadeIn", array("buffer" => false)),
            "complete" => $this->Js->get("#ajax_container")
                    ->effect("fadeOut", array("buffer" => false))));
?>
<div id="ajax_container" style="display: none;">
    <?php echo $this->Html->image("loading.gif", array("id" => "busy-indicator")); ?>
</div>
<table class="mws-table">
    <thead>
        <tr>
            <th title="User Id">id</th>
            <th title="User Name">Name</th>
            <th title="Login Time">Login Time</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($onlineUsers)) {
            foreach ($onlineUsers as $user) {
                ?>
                <tr>
                    <td><?= $user['User']['id'] ?></td>
                    <td>Win 95+</td>
                    <td class="center"><?= $this->Time->niceShort($user['User']['login_time']); ?></td>
                </tr>
            <?php }
        } ?>
    </tbody>
</table>
<?php echo $this->element("pagination");
echo $this->Js->writeBuffer();
?>
