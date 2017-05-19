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
        if(!empty($onlineUsers)){
            foreach ($onlineUsers as $user){
        ?>
        <tr>
            <td><?=$user['User']['id']?></td>
            <td>Name</td>
            <td class="center"><?=$this->Time->niceShort($user['User']['login_time']);?></td>
        </tr>
        <?php }} ?>
    </tbody>
</table>
<?php //echo $this->element("pagination")?>
<script>
    $(function(){
        $('.paging_full_numbers span a').addClass('sort');
        $('.mws-table th a').click(function(e){
            e.preventDefault();
        });
        $('.sort').click(function (event){
            event.preventDefault();
            var url = $(this).attr("href");
            alert(url);return;
            if ( url.indexOf('ajax') == -1 ) {
                url += '/ajax:true';
            }
            
            if ( !$(this).hasClass('paginate_active') ) {
                var type = 'get';
                var replace = '#user-online-list';
                ajaxData(type, url, {}, replace);
            }
        });

//        $('.all-chkbox').change(function(){
//            $('.chkbox').prop("checked",$(this).is(":checked"));
//        });
    });
</script>