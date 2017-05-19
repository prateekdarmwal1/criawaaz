<style>
    .assumption label{width:75px !important;margin-left: 10px}
    .ui-icon-trash{ margin-top: 7px !important;float: left !important}
    .grid_4 .select{width: 20% !important}
    .grid_4 .grid-4-item{width: 16% !important}
    .grid_4 .sessions{width: 14% !important}
    .grid_4 .alpha_sessions{width: 13% !important}

</style>

<div class="mws-panel-header">
    <span style="width:100px;float:left" class="mws-i-24 mws-report-icon mws-ic-16 ic-calculator">Assumption</span>
</div>
<div class="mws-panel-body">
    <!--    <div id="obj">Object</div>-->
  <form class="mws-form" action="widgets.html">
    <div id="demo-form">
        <div class="mws-form-block grid_4 ">
                    <div class="mws-form-col-2-8 select">
                        <div class="mws-form-item">
                            <?php
                            echo $this->Form->select('inning', $InningSelect, ["empty" => "Inning","id" => "assump-inning" ,"name" => "inning", "class" => "inning mws-textinput readonly"]);
                            ?>
                        </div>
                    </div>
                    <div class="mws-form-col-2-8 grid-4-item">

                        <div class="mws-form-item ">
                            <input type="text"   placeholder="Over" name="overs" class="over mws-textinput readonly" id="assump-overs">
                        </div>
                    </div>
                    <div class="mws-form-col-1-8 alpha sessions grid-3-item">
                        <div class="mws-form-item">
                            <input type="text" placeholder="Session" name="session" class="session mws-textinput readonly" id="assump-session" value="Session">
                        </div>
                    </div>
                    <div class="mws-form-col-1-8 alpha grid-1-item">
                        <div class="mws-form-item">
                            <?php
                            echo $this->Form->select('score1Unit', $ScoreUnit, ["empty" => "","id" => "assump-score1-hundreds" ,"name" => "score1Unit", "class" => "mws-textinput readonly"]);
                            ?>
                        </div>
                    </div>
                    <div class="mws-form-col-2-8 alpha grid-4-item">
                        <div class="mws-form-item">
                            <input type="text"     name="score1" class="score1 mws-textinput readonly" id="assump-score1">
                        </div>
                    </div>
                    <div class="mws-form-col-1-8 alpha grid-1-item">
                        <div class="mws-form-item">
                            <?php
                            echo $this->Form->select('score2Unit', $ScoreUnit, ["empty" => "","id" => "assump-score2-hundreds" ,"name" => "score2Unit", "class" => "mws-textinput readonly"]);
                            ?>
                        </div>
                    </div>

                    <div class="mws-form-col-1-8 grid-3-item">
                        <div class="mws-form-item">
                            <input type="text" name="score2" class="score2 mws-textinput readonly" id="assump-score2">
                        </div>
                    </div>
        </div>
        <div class="mws-form-block grid_2 match">
                   <div class="mws-form-col-2-8 "
                    <label>Match Odds</label>
                   </div>

                   <div class="mws-form-col-2-8 ">
                        <div class="mws-form-item">
                            <input type="text"   name="odd1" class="odd-1 mws-textinput readonly" id="assump-odd1" style="margin-left: -14px;">
                        </div>
                   </div>

                   <div class="mws-form-col-2-8">
                        <div class="mws-form-item">
                            <input type="text" name="odd2"  class="mws-textinput odd-2 readonly" id="assump-odd2" style="margin-left: -17px;">
                        </div>
                   </div>

                    <div class="mws-form-col-1-8 alpha grid-4-item ">
                        <div class="mws-form-item">
                            <input type="text"   name="current-over" class="odd-1 mws-textinput readonly" id="assump-current_overs" placeholder="Over" style="margin-left: -22px; width: 47px;" value="<?=$score['Score']['overs'] ?>">
                        </div>
                    </div>
                    <div class="mws-form-col-1-8 alpha grid-4-item ">
                        <div class="mws-form-item">
                            <input type="text" name="current-score" class="odd-1 mws-textinput readonly"
                               id="assump-current_scores" placeholder="Score" style="width: 57px;" value="<?=$score['Score']['runs']?> /<?= $score['Score']['wickets']?>">
                        </div>
                    </div>


        </div>
        <div class="mws-block-form grid_2 fav">
                    <div class="mws-form-col-2-8 alpha">
                        <label style="margin-left: 21px;">Favorite</label>
                    </div>
                    <div class="mws-form-col-3-8 alpha">
                        <div class="mws-form-item">
                            <input type="text" name='favorite' class="mws-textinput favorite readonly" id="assump-fav" style="margin-left: 25px;">

                        </div>

                    </div>
                    <div class="mws-form-col-3-8 alpha">
                        <div class="mws-form-items">
                          <!-- <input type="button" id="submit-btn" value="Edit" class="mws-button red readonly" style="float:right"> -->
     <input type="button" value="Add More" class="mws-button red" style="float:right; margin-right: -14px;" id="assump-create" onfocusin="changeOnFocusIn('add')" onfocusout="changeOnFocusOut('add')">
                        </div>

                    </div>

        </div>


    </div>
    <hr/>


  </form>
    <form class="mws-form" action="widgets.html">
        <div class="mws-form-inline assumption assumption-panel">
            <br>
            <div class="grid_">
                <div id="odds-panel">
                    <?php
                    $assump = 0;
                    if (!empty($score["Assumption"])) {
                        $assump = count($score["Assumption"]);
                        foreach ($score["Assumption"] as $assump) {
                            $assumpScore1 = 0+$assump['score1'];
                            $assumpScore2 = 0+$assump['score2'];
                            //debug($assumpScore1);die;
                            if(intval($assumpScore1/100) > 0 )
                            {
                                //debug(intval($assumpScore1%100));die;
                                $score1unit = "".intval($assumpScore1/100);
                                if(intval($assumpScore1%100) >= 0 && intval($assumpScore1%100) <=9)
                                {
                                    //debug(intval($assumpScore1%100));die;
                                    $score1 = "0".intval($assumpScore1%100);
                                    //debug($score1);die;
                                }
                                else{
                                    $score1 = "".intval($assumpScore1%100);
                                }
                            }
                            else{
                                $score1unit = "";
                                $score1 = "".intval($assumpScore1);
                            }

                            if(intval($assumpScore2/100) > 0 )
                            {
                                $score2unit = "".intval($assumpScore2/100);
                                if(intval($assumpScore2%100) >= 0 && intval($assumpScore2%100) <=9)
                                {
                                    $score2 = "0".intval($assumpScore2%100);
                                }
                                else{
                                    $score2 = "".intval($assumpScore2%100);
                                }
                            }
                            else{
                                $score2unit = "";
                                $score2 = "".intval($assumpScore2);
                            }
                        ?>


                            <div class="odds" id="row-<?= $assump['id'] ?>">
                                <div class="grid_4">
                                    <span class="ui-icon ui-icon-trash" onclick="deleteRow(this)"></span>




                                    <div class="mws-form-item" style="margin-left:27px;!important; ">
                                        <div class="mws-form-cols clearfix">

                                            <div class="mws-form-col-1-8" style="width: 11%!important;">
                                                <div class="mws-form-item">
                                                    <input type="text"  placeholder="over" value="<?= $assump['current_overs'] ?>" class="mws-textinput odd-2" id="assump-current_overs-<?= $assump['id'] ?>" >
                                                </div>
                                            </div>
                                            <div class="mws-form-col-1-8">
                                                <div class="mws-form-item">
                                                    <input type="text"  placeholder="score" value="<?= $assump['current_scores'] ?>" class="mws-textinput odd-2" id="assump-current_scores-<?= $assump['id'] ?>" >
                                                </div>
                                            </div>

                                            <div class="mws-form-col-2-8 select alpha grid-6-item" style="width: 10%!important;">
                                                <div class="mws-form-item margin_left" id="assumptions-data">
                                                    <?php
                                                    echo $this->Form->select('inning', $InningSelect, ["empty" => "Inning", "value" => $assump['inning'], "name" => "inning", "id" => "assump-inning".$assump['id'] , "class" => "inning mws-textinput", "style"=> "width:50px;"]);
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="mws-form-col-1-8 ">

                                                <div class="mws-form-item">
                                                    <input type="text"   value="<?= $assump['overs'] ?>" name="overs"  placeholder="Over" class="over mws-textinput" id="assump-overs-<?= $assump['id'] ?>">
                                                </div>
                                            </div>
                                            <div class="mws-form-col-2-8 alpha  alpha_sessions" style="width: 10%!important;">
                                                <div class="mws-form-item">
                                                    <input type="text" name="session" placeholder="Session" value="<?= $assump['session'] ?>" class="session mws-textinput" id="assump-session-<?= $assump['id'] ?>" >
                                                </div>
                                            </div>
                    <div class="mws-form-col-1-8 alpha grid-1-item" style
                        ="width: 10% !important;">
                        <div class="mws-form-item">
                            <?php
                            echo $this->Form->select('score1Unit', $ScoreUnit, ["empty" => "", "id" => "assump-score1-hundreds-".$assump['id'] ,"value" => $score1unit, "class" => "mws-textinput", "style"=>"width:45px;"]);
                            ?>
                        </div>
                    </div>
                    <div class="mws-form-col-1-8 ">
                        <div class="mws-form-item">
                            <input type="text"  value="<?= $score1 ?>"     name="score1" class="score1 mws-textinput" id="assump-score1-<?= $assump['id'] ?>" >
                        </div>
                    </div>
                     <div class="mws-form-col-1-8 alpha grid-1-item" style="width: 9%!important;    ">
                        <div class="mws-form-item">
                            <?php
                            echo $this->Form->select('score2Unit', $ScoreUnit, ["empty" => "","id" => "assump-score2-hundreds-".$assump['id'] ,"value" => $score2unit ,"class" => "mws-textinput", "style"=>"width:46px;"]);
                            ?>
                        </div>
                    </div>
                                            <div class="mws-form-col-1-8 ">
                                                <div class="mws-form-item">
                                                    <input type="text" value="<?= $score2 ?>" name="score2" class="score2 mws-textinput" id="assump-score2-<?= $assump['id'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid_2 match" style="margin-left:-47px;">
                                    <label style="margin-left: 113px;">Match Odds</label>
                                    <div class="mws-form-item" style="margin-left: 188px;">
                                        <div class="mws-form-cols clearfix">
                                                <div class="mws-form-col-2-8 alpha">
                                                <div class="mws-form-item">
                                                    <input type="text"  value="<?= $assump['odd1'] ?>" name="odd1"      class="odd-1 mws-textinput" id="assump-odd1-<?= $assump['id'] ?>" style="width:50px; margin-left:1px;">
                                                </div>

                                            </div>
                                            <div class="mws-form-col-3-8">
                                                <div class="mws-form-item">
                                                    <input type="text"      name="odd2"  value="<?= $assump['odd2'] ?>" class="mws-textinput odd-2" id="assump-odd2-<?= $assump['id'] ?>" style="width:50px; margin-left: 40px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid_2 fav">
                                    <label style="margin-left: 56px;">Favorite</label>
                                    <div class="mws-form-item" style="margin-left: 147px;">
                                        <div class="mws-form-cols clearfix">
                                            <div class="mws-form-col-4-8 alpha">
                                                <div class="mws-form-item" style="width: 78px; margin-right: -26px;">
                                                    <input type="text" class="mws-textinput favorite" name="favorite" value="<?= $assump['favorite'] ?>" id="assump-fav-<?= $assump['id'] ?>">
                                                </div>
                                            </div>
                                            <div class="mws-form-col-4-8 alpha">
                                                 <input type="button" id="submit-btns-<?= $assump['id'] ?>" value="Submit" class="mws-button red" style="float:right; margin-right: -64px;" onclick="updateAssumption(<?=$assump['id']?>)" onfocusin="changeOnFocusIn(<?=$assump['id']?>)" onfocusout="changeOnFocusOut(<?=$assump['id']?>)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="mws-form-block grid_2">
                <div class="">
                    <label>Team Winner</label>
                    <div class="mws-form-item large">
                        <?php
                        $options = [
                            "First Batting" => "First Batting",
                            "Second Batting" => "Second Batting",
                            "First Bowling" => "First Bowling",
                            "Second Bowling" => "Second Bowling"
                        ];
                        echo $this->Form->select('Score.winner_team', $options, ['id' => 'winner-team', 'value' => $score["Score"]['winner_team'], "class" => "winner-team mws-textinput readonly"]);
                        ?>

                    </div>
                </div>
            </div>
            <div class="mws-form-block grid_1">
                <label>Inning</label>
                <div class="mws-form-item large">
                    <?php
                    echo $this->Form->select('inning', $InningSelect, ["value" => $inning, "id" => "target-inning", "class" => "target-inning mws-textinput readonly"]);
                    ?>
                </div>
            </div>
            <div class="mws-form-block grid_1">
                <label>Team</label>
                <div class="mws-form-item large">
                    <input type="text" id="target-teams" class="target-overs mws-textinput readonly" value="<?= $score["Score"]["playing_team"] ?>">
                    <?php
                    //echo $this->Form->select('teams', $teamsSelect, ["empty" => "Team", "value" => $inning, "id" => "target-teams-select", "class" => "target-teams-select mws-textinput"]);
                    ?>
                </div>
            </div>
            <div class="mws-form-block grid_1">
                <label>Overs</label>
                <div class="mws-form-item large">
                    <input type="text" id="target-overs" class="target-overs mws-textinput readonly" value="<?= $score["Score"]["overs"] ?>">
                </div>
            </div>
            <div class="mws-form-block grid_1">
                <label>Score</label>
                <div class="mws-form-item large">
                    <input type="text" id="target-score" class="target-score mws-textinput readonly" value="<?= $score["Score"]["runs"] ?>/<?= $score["Score"]["wickets"] ?>">
                </div>
            </div>
            <div class="mws-form-block grid_1">
                <label>&nbsp;</label>
                <div class="mws-form-item large">
                    <input type="button" action="target-text"  class="mws-button red" id="target-edit" value="Edit">
                </div>
            </div>
            <div class="clearfix"></div>
    </form>
</div>
<br>
</div>
<div class="mws-panel-header" style="margin-top:10px;">
    <span style="width:300px;float:left" class="mws-i-24 mws-report-icon mws-ic-16 ic-calculator">Match Interrupt</span>
    <button id="matchInterrupt" onclick="matchInteruptToggle()" class="mws-button red" style="float:right;margin-top:-2px">Enable</button>
</div>
<div class="mws-panel-body">
  <div style="padding-top:10px;padding-bottom: 10px;">
      <label style="margin-bottom:10px;font-size:16px;">Please add match comments (if any): </label>
      <textarea style="width:100%;height:100px;"id="match_detail" disabled="true"><?= trim($score['Score']['match_detail'])?></textarea>
  </div>
</div>


<!--<input type="button" onclick="move3d()" value="move">-->
<script>
        function matchInteruptToggle(){
          if($('#match_detail').is(':disabled')){
            $('#match_detail').attr('disabled',false);
            $('#match_detail').focus();
            $("#matchInterrupt").text("Disable");
            // callAjax(UpdateInnings);
          }
          else{
            $('#match_detail').attr('disabled',true);
            $("#matchInterrupt").text("Enable");
            $('#match_detail').val("");
            callAjax(UpdateInnings);
          }
        }
        $('#match_detail').focusout(function(){
          callAjax(UpdateInnings);
        });

        function changeOnFocusIn(id){
            //alert("hello");return;
            if(id=="add"){
                $('#assump-create').css({"border":"2px solid blue"});
            }
            else{
                $('#submit-btns-'+id).css({"border":"2px solid blue"});
            }
        }
        function changeOnFocusOut(id){
            //alert("hello");return;
            if(id=="add"){
                $('#assump-create').css({"border":"none"});
            }
            else{
                $('#submit-btns-'+id).css({"border":"none"});
            }
        }
        function updateAssumption(id){
            callAssumptionUpdate(assumpUpdate,id);
        }
        var assumpUpdate = function() {};

         function callAssumptionUpdate(callback, id) {
                var data = {
                    id: id,
                    overs: $('#assump-overs-'+id).val(),
                    session: $('#assump-session-'+id).val(),
                    score1: $('#assump-score1-hundreds-'+id).val()+$('#assump-score1-'+id).val(),
                    score2: $('#assump-score2-hundreds-'+id).val()+$('#assump-score2-'+id).val(),
                    odd1: $('#assump-odd1-'+id).val(),
                    odd2: $('#assump-odd2-'+id).val(),
                    current_overs: $('#assump-current_overs-'+id).val(),
                    current_scores: $('#assump-current_scores-'+id).val(),
                    favorite: $('#assump-fav-'+id).val()

                };
                NProgress.start();
                $.ajax({
                    type: "post",
                    data: data,
                    dataType: "JSON",
                    url: '<?= Router::url(["controller" => "Admins", "action" => 'update_Assumption']); ?>',
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

        $('#assump-create').on('click',function(){

            if($('#assump-overs').is(':disabled')){
                $('#assump-overs').attr('disabled',false);
                $('#assump-session').attr('disabled',false);
                $('#assump-inning').attr('disabled',false);
                $('#assump-score1-hundreds').attr('disabled',false);
                $('#assump-score1').attr('disabled',false);
                $('#assump-score2-hundreds').attr('disabled',false);
                $('#assump-score2').attr('disabled',false);
                $('#assump-odd1').attr('disabled',false);
                $('#assump-odd2').attr('disabled',false);
                $('#assump-current_overs').attr('disabled',false);
                $('#assump-current_scores').attr('disabled',false);
                $('#assump-fav').attr('disabled',false);
                $('#assump-create').val('Submit');
            }
            else {

                if($("#assump-inning").val()!=""){
                    $('#assump-overs').attr('disabled',true);
                    $('#assump-session').attr('disabled',true);
                    $('#assump-inning').attr('disabled',true);
                    $('#assump-score1-hundreds').attr('disabled',true);
                    $('#assump-score1').attr('disabled',true);
                    $('#assump-score2-hundreds').attr('disabled',true);
                    $('#assump-score2').attr('disabled',true);
                    $('#assump-odd1').attr('disabled',true);
                    $('#assump-odd2').attr('disabled',true);
                    $('#assump-current_overs').attr('disabled',true);
                    $('#assump-current_scores').attr('disabled',true);
                    $('#assump-fav').attr('disabled',true);
                    $('#assump-create').val('Add More');
                    callCreateAssumption(assumpCreate);
                    $('#assump-overs').val("");
                    $('#assump-session').val("");
                    $('#assump-inning').val("");
                    $('#assump-score1').val("");
                    $('#assump-score2').val("");
                    $('#assump-odd1').val("");
                    $('#assump-odd2').val("");
                    $('#assump-current_overs').val("");
                    $('#assump-current_scores').val("");
                    $('#assump-fav').val("");
                }
                else{
                    alert("Inning must not be empty.");
                    $("#assump-inning").focus();
                }
            }

        });
        var assumpCreate = function() {};
        function callCreateAssumption(callback){
             var data = {
                            scoreboard_id: '<?= $score["Score"]["id"] ?>',
                            inning: $('#assump-inning').val(),
                            overs: $('#assump-overs').val(),
                            session: $('#assump-session').val(),
                            score1: $('#assump-score1-hundreds').val()+$('#assump-score1').val(),
                            score2: $('#assump-score2-hundreds').val()+$('#assump-score2').val(),
                            odd1: $('#assump-odd1').val(),
                            odd2: $('#assump-odd2').val(),
                            current_overs: $('#assump-current_overs').val(),
                            current_scores: $('#assump-current_scores').val(),
                            favorite: $('#assump-fav').val()
                        };
                        NProgress.start();
                        var redirect_url = '<?= Router::url(["controller"=>"admins","action"=>"index"])?>';
                        $.ajax({
                            type: "post",
                            data: data,
                            dataType: "JSON",
                            url: '<?= Router::url(["controller" => "Admins", "action" => 'create_assumption']); ?>',
                            success: function (result) {
                                NProgress.done();
            //                    callback(result);
                                if(result.saveSuccess)
                                {
                                    // alert("hello data has been saved with matchid: "+result.matchid);
                                    // the redirect
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


    $(function () {





        var newTarget = function() {};
        $('#target-edit').click(function () {
        // alert("hello");

            if ($("#target-score").is(':disabled')) {
                $("#target-score").attr('disabled', false);
                $("#target-overs").attr('disabled', false);
                $("#target-teams").attr('disabled', false);
                $("#target-inning").attr('disabled', false);
                $("#winner-team").attr('disabled', false);
                $(this).val('Submit');
            } else {
                $("#target-score").attr('disabled', true);
                $("#target-overs").attr('disabled', true);
                $("#target-teams").attr('disabled', true);
                $("#target-inning").attr('disabled', true);
                $("#winner-team").attr('disabled', true);
                $(this).val('Edit');
                // $('#box-playing-team').html($('#playing-team-text').val());
                callTargetUpdate(newTarget);
            }

        });

         var assump = '<?php echo count($score["Assumption"]) ?>';
        $('#target-inning').on('change', function () {
            var url = '<?= Router::url(["controller" => "admins", "action" => "index", $match_id]) ?>' + "/" + $(this).val();
            window.location.href = url;
        });
        function callTargetUpdate(callback) {
            var data = {
                match_id: '<?=$score["Score"]["id"]?>',
                inning: $('#target-inning').val(),
                target_team: $('#target-teams').val(),
                overs: $('#target-overs').val(),
                score: $('#target-score').val()
            };
            NProgress.start();
            $.ajax({
                type: "post",
                data: data,
                dataType: "JSON",
                url: '<?= Router::url(["controller" => "Admins", "action" => 'update_target']); ?>',
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
        if (!assump) {
            $('#odds-panel').append("<div class='odds' style='border-bottom:1px solid #DDD'>" + $('#demo-form').html() + "</div>");
        }
        $(document).on('keyup', '.assumption-panel input', function (e) {
            if (e.keyCode !== 13)
                return;
            var id = $(this).closest('.odds').attr('id');
            if (id !== "") {
                id = id.split('-')[1];
                if (id) {
                    var field = $(this).attr('name');
                    var data = {
                        id: id,
                        field: $(this).val() + "@" + field
                    };
                    NProgress.start();
                    $.ajax({
                        type: "post",
                        data: data,
                        dataType: "JSON",
                        url: '<?= Router::url(["controller" => "Admins", "action" => 'update_field']); ?>',
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
            }
        });
        $('#submit-btns').on('click', function () {

            var data = [];
            var i = 0;
            var permissionToSubmit = true;
            var obj;
            var msg;
            $('.odds').each(function () {
                if ($(this).find('.over').val() === "")
                    return;
                var inning = $(this).find('.inning');
                if (inning.val() == "") {
                    permissionToSubmit = false;
                    obj = inning;
                    msg = "Please select an inning!";
                    return;
                }
                var score1 = $(this).find('.score1');
                var score2 = $(this).find('.score2');
                var session = $(this).find('.session');
                var favorite = $(this).find('.favorite');
                if (typeof score1.val() != 'undefined') {
                    if (score1.val() < 0 || (score1.val()).length > 3 || (score1.val()).length == 0) {
                        permissionToSubmit = false;
                        obj = score1;
                        msg = "Value should be in 3 digits and non-negative!";
                        return;
                    }
                }
                if (typeof score2.val() != 'undefined') {
                    if (score2.val() < 0 || (score2.val()).length > 3 || (score2.val()).length == 0) {
                        permissionToSubmit = false;
                        obj = score2;
                        msg = "Value should be in 3 digits and non-negative!";
                        return;
                    }
                }
                var odd1 = $(this).find('.odd-1');
                if (typeof odd1.val() != 'undefined') {
                    if (odd1.val() < 0 || odd1.val().length > 3 || (odd1.val()).length == 0) {
                        permissionToSubmit = false;
                        obj = odd1;
                        msg = "Value should be in 3 digits and non-negative!";
                        return;
                    }
                }
                var odd2 = $(this).find('.odd-2');
                if (typeof odd2.val() != 'undefined') {
                    if (odd2.val() < 0 || odd2.val().length > 3 || (odd2.val()).length == 0) {
                        permissionToSubmit = false;
                        obj = odd2;
                        msg = "Value should be in 3 digits and non-negative!";
                        return;
                    }
                }
                if (score1.val())
                    data[i++] = {
                        'overs': $(this).find('.over').val(),
                        'session': session.val(),
                        'inning': inning.val(),
                        'score1': score1.val(),
                        'favorite': favorite.val(),
                        'score2': score2.val(),
                        'odd1': odd1.val(),
                        'odd2': odd2.val()
                    };

            });

            if (!permissionToSubmit) {
                alert(msg);
                obj.focus().select();
                return;
            }
            function getResult(result) {}
            var url = '<?= Router::url(["controller" => "Admins", "action" => 'update_assumption']); ?>';
            ajaxData("POST", url, {id: '<?= $score["Score"]["id"] ?>', data: data, winTeam: $('#winner-team').val(), favTeam: $('#fav-team').val()}, '', getResult, datatype = "JSON")
        });
        $('#add-more-btn').on('click', function () {
            var newData = $('#demo-form').html();
            var id=parseInt($('#add-more-btn').data('val'));
             id=id+1;
             $('#add-more-btn').data('val',id);
             $('#submit-btns').addClass(id);
             $('.odd-1').addClass('odd-1-"+id+"');
             $('.odd-2').addClass('odd-2-"+id+"');
             $('.favorite').addClass('favorite-"+id+"');
             $('.score1').addClass('score1-"+id+"');
             $('.score2').addClass('score2-"+id+"');
             $('.session').addClass('session-"+id+"');
             $('.over').addClass('over-"+id+"');
             $('.inning').addClass('inning-"+id+"');
             $('#odds-panel').prepend("<div class='odds id-"+id+"'>" + newData + "<hr></div>");

             //alert("add: "+$('#add-more-btn').data('val'));

        });


    });

    function deleteRow(elem) {
        var obj = $(elem).parent().parent('.odds');

        if (obj.attr('id') != undefined) {
            var id = (obj.attr('id')).split('-')[1];
            function delResult(result) {
                if (result.error) {
                    $('#' + obj.attr('id')).hide(1000, function () {
                        $(this).remove();
                    });
                }
            }
            var url = '<?= Router::url(["controller" => "Admins", "action" => 'delete_assumption']); ?>';
            ajaxData("POST", url, {id: id}, '', delResult, datatype = "JSON")
        } else {
            $(elem).parent().parent('.odds').hide(1000, function () {
                $(this).remove();
            });
        }
    }
    function move3d() {
        var base = $('#basePanel');


        $("#obj1").css({
            'top': base.offset().top,
            'position': 'absolute'
        });

    }
</script>
