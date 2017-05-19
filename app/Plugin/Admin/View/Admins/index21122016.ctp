 <style>
    .ui-tabs .ui-tabs-panel{padding:1em !important}
    hr{margin-bottom: 5px !important;}
    .ui-button .ui-button-text{color:black}
</style>

<?= $this->element("Admins/notification"); 
?>
<div class="mws-panel grid_8">
    <div class="mws-tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
        <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" style="padding: 2px;">
            <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="#scoreboard">Score Board</a></li>
            <li class="ui-state-default ui-corner-top"><a href="#usersonline">User Online</a></li>
            <li class="ui-state-default ui-corner-top"><a href="#history">History</a></li>
            <!-- <buttton id="match" class="mws-button green" style="float:right;margin-top:4px;margin-right: 13px;" data-toggle="modal" data-target="#matchForm">New Match</button> -->
            <input id="mws-form-dialog-mdl-btn" class="mws-button green" value="New Match" type="button" style="float:right">
        </ul>
        <div id="scoreboard" class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" style="padding: .8em">
            <div class="grid_8">
                <?= $this->element("Admins/overs_ball"); ?>
            </div>
            <div class="grid_4">
                <?= $this->element("Admins/score"); ?>
            </div>
            <div class="grid_2">
                <?= $this->element("Admins/over"); ?>
            </div>
            <div class="grid_2">
                <?= $this->element("Admins/teams"); ?>
            </div>
            <div class="grid_8">
                <?= $this->element("Admins/assumptions"); ?>
            </div>
         <div class="clearfix"></div>
        </div>
        <div id="usersonline" class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide">
            <div class="grid_8" id="contentsReplace">
                <?php
                
                echo $this->element("Users/get_online_users"); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="history" class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide">
            <div class="grid_8" id="contentsReplace">
                <?php
                
                echo $this->element("Admins/history"); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
<div>
     <?= $this->element("Admins/newmatchform"); ?>
</div>
<script>
    var UpdateWickets = function(result) {};
    var UpdateInnings = function() {};
    $(function () {
        $(".readonly").attr('disabled', true);
        $('#match').on('click', function(){
            var dataval = 0;
            $('#')
        });
    });
    function callAjax(callback) {
        NProgress.start();
        var data = {
            id: '<?= $score["Score"]["id"] ?>',
            innings_over: $('#box-current-innings').html(),
            commentrator: ($('#box-comment').html()),
            wickets: $('#box-wicket').html(),
            overs: $('#box-over').html(),
            runs: $('#box-run').html(),
            team: $('#box-team').html(),
            playing_team: $('#box-playing-team').html()
           
        };
        $.ajax({
            type: "post",
            data: data,
            dataType: "JSON",
            url: '<?= Router::url(["controller" => "Admins", "action" => 'update_score']); ?>',
            success: function (result) {
                NProgress.done();
                callback(result);
            },
            error: function (x) {
                alert(x.responseText);
                NProgress.done();
            }
        });
    }

    
</script>