
<?php echo " Dear ,".$data["name"] ?><br/><br/>
<p>You  have successully register with us.</p>
<p>Your Password Is : <strong><?=$data["password"]?></strong></p>
<p>
    <?php echo $this->Html->link(__(' Click here to activate your account'), $data['url_id']);?>
</p>





