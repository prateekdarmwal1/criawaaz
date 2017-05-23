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
            <li class="ui-state-default ui-corner-top" id="itemMatchSchedule"><a href="#matchSchedule">Match Schedule</a></li>
            <label>&nbsp;&nbsp;&nbsp;Match&nbsp;Interrupt&nbsp;&nbsp;&nbsp;</label>
            <input type="text" class="mws-textinput readonly" id="match-interrupt-text" value="" style="width:150px;">&nbsp;&nbsp;
            <input type="button" class="mws-button red" id="match-interrupt-edit" value="Edit" style="margin-top: -0px;">
            &nbsp;&nbsp;
            <label>&nbsp;&nbsp;&nbsp;Target&nbsp;Score&nbsp;&nbsp;&nbsp;</label>
            <input type="text" class="mws-textinput targets" id="total_target_score" value="<?= !empty($score["Score"]["target_score"]) ? $score["Score"]["target_score"] : '' ?>" style="width:50px;">&nbsp;&nbsp;
            <label>&nbsp;&nbsp;&nbsp;Total&nbsp;Overs&nbsp;&nbsp;&nbsp;</label>
            <input type="text" class="mws-textinput targets" id="total_overs" value="<?= !empty($score["Score"]["target_overs"]) ? $score["Score"]["target_overs"] : '' ?>" style="width:50px;">&nbsp;&nbsp;
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
        <div id="matchSchedule" class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide">
            <div class="grid_8" id="contentsReplace">
                <?php

                echo $this->element("Admins/match_schedule"); ?>
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

    $('#total_overs').change(function(){
        callAjax(UpdateScore);
    })
    $('#total_target_score').change(function(){
        callAjax(UpdateScore);
    });    
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
        var pageUrl = window.location.href;
        var splitArr = pageUrl.split("/");
        var currInning = splitArr[splitArr.length-1];
        if(currInning.trim() == "2"){
                var total_overs = (isNaN(parseFloat($("#total_overs").val())) ? "" : parseFloat($("#total_overs").val()).toFixed(2));
                var targetScore = (isNaN(parseInt($("#total_target_score").val())) ? "" : parseInt($("#total_target_score").val()));
            if(total_overs!="" && targetScore!=""){
                var requiredRunrate = parseFloat(parseFloat(targetScore)/total_overs).toFixed(2);
                var currRunrate = (parseFloat($('#run-text').val())/parseFloat($('#overs-text').val())).toFixed(2);
                var runsRem = parseInt(targetScore)-parseInt($('#run-text').val());
                var ballArr =  total_overs.split('.');
                var totalBalls = parseInt(ballArr[0])*6+(isNaN(ballArr[1]) ? 0 : parseInt(ballArr[1]));
                ballArr =  $('#overs-text').val().split('.');
                var currBalls = parseInt(ballArr[0])*6+(isNaN(ballArr[1]) ? 0 : parseInt(ballArr[1]));
                var ballsRem = parseInt(totalBalls-currBalls);
            }
        }
        var data = {
            id: '<?= $score["Score"]["id"] ?>',
            innings_over: $('#box-current-innings').html(),
            wickets: $('#box-wicket').html(),
            overs: $('#box-over').html(),
            runs: $('#box-run').html(),
            team: $('#box-team').html(),
            match_detail: $('#match_detail').val().trim(),
            session_detail: $('#session_comment').val().trim(),
            ball_status: $('#ball_status').text().trim(),
            cur_runrate: (currRunrate!=null ? currRunrate : ""),
            req_runrate: (requiredRunrate!=null ? requiredRunrate : ""),
            ball_remains: (ballsRem!=null ? ballsRem : ""),
            runs_needed: (runsRem!=null ? runsRem : ""),
            target_overs: parseFloat($("#total_overs").val()),
            target_score: parseInt($("#total_target_score").val()),
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
        if(sessionStorage.activeTab == "matchSchedule"){
            $('#itemScoreboard').removeClass("ui-tabs-selected ui-state-active");
            $('#scoreboard').addClass("ui-tabs-hide");
            $('#itemMatchSchedule').addClass("ui-tabs-selected ui-state-active");
            $('#matchSchedule').removeClass("ui-tabs-hide");
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
    $('#match-interrupt-edit').on('click', function () {
        if ($("#match-interrupt-text").is(':disabled')) {
            $("#match-interrupt-text").attr('disabled', false);
            $(this).val('Submit');
        } else {
            $("#match-interrupt-text").attr('disabled', true);
            $(this).val('Edit');
            $('#ball_status').text($("#match-interrupt-text").text());
            callAjax(UpdateWickets);
        }
    });

</script>
