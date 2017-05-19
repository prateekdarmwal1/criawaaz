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
            <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active" id="itemScoreboard"><a href="#scoreboard">Score Board</a></li>
            <li class="ui-state-default ui-corner-top" id="itemUsersOnline"><a href="#usersonline" >User Online</a></li>
            <li class="ui-state-default ui-corner-top" id="itemHistory"><a href="#history">History</a></li>
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
    var UpdateWickets = function() {};
    var UpdateInnings = function() {};
    var UpdateScore = function() {};
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
            wickets: $('#box-wicket').html(),
            overs: $('#box-over').html(),
            runs: $('#box-run').html(),
            team: $('#box-team').html(),
            playing_team: $('#box-playing-team').html(),
            match_detail: $('#match_detail').val().trim(),
            session_detail: $('#session_comment').val().trim(),
            ball_status: $('#ball_status').text().trim(),
        };
        $.ajax({
            type: "post",
            data: data,
            dataType: "JSON",
            url: '<?= Router::url(["controller" => "Admins", "action" => 'update_score']); ?>',
            success: function (result) {
                NProgress.done();
                // alert(result["session"]);
            },
            error: function (x) {
                NProgress.done();
                if(x.status == 403){
                    window.location.href = '<?= Router::url(["controller" => "Admins", "action" => 'login']); ?>';
                }
            }
        });
    }
    //get an event for change in window scroll position.
    $(window).scroll(function(){
        sessionStorage.scrollTop = $(this).scrollTop();
    });
    jQuery(function(){
        if(sessionStorage.scrollTop != ""){
            $(window).scrollTop(sessionStorage.scrollTop);

        }
        if(sessionStorage.activeTab == "history"){
            $('#itemScoreboard').removeClass("ui-tabs-selected ui-state-active");
            $('#scoreboard').addClass("ui-tabs-hide");
            $('#itemHistory').addClass("ui-tabs-selected ui-state-active");
            $('#history').removeClass("ui-tabs-hide");
            sessionStorage.activeTab = "";
        }
    });
    $("input").focusin(function(){
        $(this).css({"border":"2px solid blue"});
    });
    $("input").focusout(function(){
        $(this).css({"border":"1px solid #c5c5c5"});
    });
    $("select").focusin(function(){
        $(this).css({"border":"2px solid blue"});
    });
    $("select").focusout(function(){
        $(this).css({"border":"1px solid #c5c5c5"});
    });

</script>
