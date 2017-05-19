<style>
    .assumption label{
        width:75px !important;
        margin-left: 10px;
    }
    .ui-icon-trash{
        margin-top: 7px !important;
        float: left !important;
    }
    .grid_4 .select{
        width: 20% !important;
    }
    .grid_4 .grid-4-item{
        width: 14% !important;
    }
    .grid_4 .sessions{
        width: 14% !important;
    }
</style>
<div class="mws-panel-body">
    <?php
    $history = 0;
    if(!empty($match["History"]))
    {
        $history = count($match["History"]);
        foreach($match["History"] as $history)
        {?>
        <!--    <div id="obj">Object</div>-->
    <div id="view-history-<?= $history['id'] ?>">
        <form class="mws-form" action="widgets.html">
            <div class="mws-form-block grid_1">
                <label>Delete</label>
                <div class="mws-form-item large"><span class="ui-icon ui-icon-trash" onclick="deleteHistoryRow(<?= $history['id'] ?>)"></span></div>
            </div>
            <div class="mws-form-block grid_1">
                <label>Inning</label>
                <div class="mws-form-item large">
                    <?php
                    echo $this->Form->select('inning', $InningSelect, ["value" => $history["innings"], "id" => "history-innings-".$history['id'], "class" => "history-inning mws-textinput readonly"]);
                    ?>
                </div>
            </div>
            <div class="mws-form-block grid_1">
                <label>Playing Team</label>
                <div class="mws-form-item large">
                    <input type="text" id="history-playing-team-<?=$history['id']?>" class="target-overs mws-textinput readonly" value="<?= $history['playing_team'] ?>">
                </div>
            </div>
            <div class="mws-form-block grid_1">
                <label>Overs</label>
                <div class="mws-form-item large">
                    <input type="text" id="history-over-<?=$history['id']?>" class="target-overs mws-textinput readonly" value="<?= $history['over'] ?>">
                </div>
            </div>
            <div class="mws-form-block grid_1">
                <label>Score</label>
                <div class="mws-form-item large">
                    <input type="text" id="history-score-<?=$history['id']?>" class="target-score mws-textinput readonly" value="<?= $history['score'] ?>">
                </div>
            </div>
            <div class="mws-form-block grid_1">
                <label>&nbsp;</label>
                <div class="mws-form-item large">
                    <input type="button" action="target-text"  class="mws-button red" id="history-submit-<?=$history['id']?>" value="Edit History" onClick="changeHistory(<?= $history['id'] ?>)">
                </div>
            </div>
            <div class="clearfix"></div>

    </form><hr/>
</div>


    <?php
        }
    } ?>

<!--</div>-->
<!---->
<!---->
<!--<div class="mws-panel-body">-->
    <!--    <div id="obj">Object</div>-->
    <form class="mws-form" action="widgets.html">
<div class="mws-form-block grid_1">
    <label>Inning</label>
    <div class="mws-form-item large">
        <?php
        echo $this->Form->select('inning', $InningSelect, ["value" => $inning, "id" => "history-inning", "class" => "history-inning mws-textinput readonly"]);
        ?>
    </div>
</div>
<div class="mws-form-block grid_1">
    <label>Playing Team</label>
    <div class="mws-form-item large">
        <input type="text" id="history-playing-team" class="target-overs mws-textinput readonly" value="<?= $score["Score"]["playing_team"] ?>">
    </div>
</div>
<div class="mws-form-block grid_1">
    <label>Overs</label>
    <div class="mws-form-item large">
        <input type="text" id="history-overs" class="target-overs mws-textinput readonly" value="<?= $score["Score"]["overs"] ?>">
    </div>
</div>
<div class="mws-form-block grid_1">
    <label>Score</label>
    <div class="mws-form-item large">
        <input type="text" id="history-score" class="target-score mws-textinput readonly" value="<?= $score["Score"]["runs"] ?>/<?= $score["Score"]["wickets"] ?>">
    </div>
</div>
<div class="mws-form-block grid_1">
    <label>&nbsp;</label>
    <div class="mws-form-item large">
        <input type="button" action="target-text"  class="mws-button red" id="history-submit" value="Add History">
    </div>
</div>
<div class="clearfix"></div>
</div>
</form>
</div>


<script>
//script for deleting history starts...
    var deleteHistory = function() {}; //callback variable for delete history
    function deleteHistoryRow(id){
        callHistoryDelete(deleteHistory,id);
        $("#view-history-"+id).html("");
    }

//ajax function definition for deleting history
    function callHistoryDelete(callback, id) {
        var data = {
            id: id
        };
        NProgress.start();
        $.ajax({
            type: "post",
            data: data,
            dataType: "JSON",
            url: '<?= Router::url(["controller" => "Admins", "action" => 'delete_history']); ?>',
            success: function (result) {
                NProgress.done();
                callback(result);
            },
            error: function (x) {
                NProgress.done();
                if(x.status == 403){
                    window.location.href = '<?= Router::url(["controller" => "Admins", "action" => 'login']); ?>';
                }
            }
        });

    }


//script for deleting history ends ...


//script for editing history start ...
    function changeHistory(id){
        if ($("#history-score-".concat(id)).is(':disabled')) {
            $("#history-score-".concat(id)).attr('disabled',false);
            $("#history-over-".concat(id)).attr('disabled',false);
            $("#history-innings-".concat(id)).attr('disabled',false);
            $("#history-playing-team-".concat(id)).attr('disabled',false);
            $("#history-submit-"+id).val("Submit");

        }
        else{
            $("#history-score-".concat(id)).attr('disabled',true);
            $("#history-over-".concat(id)).attr('disabled',true);
            $("#history-innings-".concat(id)).attr('disabled',true);
            $("#history-playing-team-".concat(id)).attr('disabled',true);
            $("#history-submit-"+id).val("Edit History");
            callHistoryUpdate(editHistory,id);
        }
    }


    var editHistory = function() {}; //callback variable for editing history

// ajax function definition for Updating edited History on database
    function callHistoryUpdate(callback, id) {
        var data = {
            id: id,
            innings: $("#history-innings-"+id).val(),
            playing_team: $("#history-playing-team-"+id).val(),
            over: $("#history-over-"+id).val(),
            score: $("#history-score-"+id).val()
        };
        NProgress.start();
        $.ajax({
            type: "post",
            data: data,
            dataType: "JSON",
            url: '<?= Router::url(["controller" => "Admins", "action" => 'update_history']); ?>',
            success: function (result) {
                NProgress.done();
                callback(result);
            },
            error: function (x) {
                NProgress.done();
                if(x.status == 403){
                    window.location.href = '<?= Router::url(["controller" => "Admins", "action" => 'login']); ?>';
                }
            }
        });

    }

//script for editing history ends ...





//script for creating new history starts...
    $(function () {


        var newHistory = function() {}; //new history callback variable



        $('#history-submit').click(function () {
            // alert("hello");

            if ($("#history-score").is(':disabled')) {
                $("#history-score").attr('disabled', false);
                $("#history-overs").attr('disabled', false);
                $("#history-playing-team").attr('disabled', false);
                $("#history-inning").attr('disabled', false);
                $(this).val('Submit');
            } else {
                $("#history-score").attr('disabled', true);
                $("#history-overs").attr('disabled', true);
                $("#history-playing-team").attr('disabled', true);
                $("#history-inning").attr('disabled', true);
                $(this).val('Add History');
                // $('#box-playing-team').html($('#playing-team-text').val());
                callHistoryCreate(newHistory);

            }

        });

        //ajax function definition for creating new history in database
        function callHistoryCreate(callback) {
            var data = {
                match_id: '<?=$this->Session->read('MatchSession')?>',
                innings: $('#history-inning').val(),
                playing_team: $('#history-playing-team').val(),
                over: $('#history-overs').val(),
                score: $('#history-score').val()
            };
            NProgress.start();
            var redirect_url = '<?= Router::url(["controller"=>"admins","action"=>"index"])?>';
            $.ajax({
                type: "post",
                data: data,
                dataType: "JSON",
                url: '<?= Router::url(["controller" => "Admins", "action" => 'create_history']); ?>',
                success: function (result) {
                    NProgress.done();
//                    callback(result);
                    if(result.saveSuccess)
                    {
                        // alert("hello data has been saved with matchid: "+result.matchid);
                        // the redirect
                        sessionStorage.activeTab = "history";
                        window.location.href = redirect_url+"/index/"+result.match_id+"/"+result.inning;
                    }
                },
               error: function (x) {
                    NProgress.done();
                    if(x.status == 403){
                        window.location.href = '<?= Router::url(["controller" => "Admins", "action" => 'login']); ?>';
                    }
                }
            });

        }

    });

    //script for new history ends here...

</script>