<div class="mws-panel-header" style="min-height:30px;">
    <span class="mws-i-24 i-table-1" style="width:900px;">
    Update Runs/Balls/Wickets&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
    <button class="head-fast-btns mws-button green" data-text="Bye">&nbsp;Bye&nbsp;</button>
    <button class="head-fast-btns mws-button green" data-text="Stump">&nbsp;S.T.&nbsp;</button>
    <button class="head-fast-btns mws-button green" data-text="Run Out">&nbsp;R.O.&nbsp;</button>
    <button class="head-fast-btns mws-button green" data-text="Catch Out">&nbsp;C.O.&nbsp;</button>
    <button class="head-fast-btns mws-button green" data-text="L.B.W.">&nbsp;L.B.W.&nbsp;</button>
    <button class="head-fast-btns mws-button green" data-text="Free Hit">&nbsp;F.H.&nbsp;</button>
    <button class="head-fast-btns mws-button green" data-text="Third Umpire">&nbsp;T.U.&nbsp;</button>
    </span>

    <button id="end-inning" class="mws-button green" style="float:right;margin-top:-35px;">End Inning</button>
</div>
<div class="mws-panel-body">
    <div class="mws-panel-toolbar top clearfix">
        <div class="mws-form-row mws-form-col-4-8">
            <label>Click to update runs and balls</label>
            <div class="mws-form-item">
                <div id="mws-ui-button-radio">
                    <button class="fastbtns">&nbsp;&nbsp;&nbsp;Ball&nbsp;&nbsp;&nbsp;</button>
                    <?php for ($i = 0; $i < 9; $i++) { ?>
                    <button class="fast-btns" run="<?= $i ?>">&nbsp;&nbsp;&nbsp;<?= $i ?>&nbsp;&nbsp;&nbsp;</button>
                    <?php } ?>
                </div>
            </div>
        </div>



<div class="mws-form-row mws-form-col-1-8">
            <label>Wide Ball</label>
            <div class="mws-form-item">
                <div id="mws-ui-button-radio">
                    <button class="" id="wide-no-ball">&nbsp;&nbsp;&nbsp;Wide&nbsp;&nbsp;&nbsp;</button>
                    <input type="text" id="extra-wide-runs" style="width:20px;">
                </div>
            </div>
        </div>
        <div class="mws-form-row mws-form-col-1-8">
            <label>No Ball</label>
            <div class="mws-form-item">
                <div id="mws-ui-button-radio">
                    <button class="" id="no-ball">&nbsp;&nbsp;&nbsp;No Ball&nbsp;&nbsp;&nbsp;</button>
                    <input type="text" id="extra-no-runs" style="width:20px;">
                </div>
            </div>
        </div>
        <div class="mws-form-row mws-form-col-1-8">
            <label>Update Wickets</label>
            <div class="mws-form-item">
                <div id="mws-ui-button-radio">
                    <button class="fastbtns" id="wicket-btn-plus">&nbsp;&nbsp;&nbsp;Wicket&nbsp;&nbsp;&nbsp;</button>
                </div>
            </div>
        </div>





        <div class="mws-form-row mws-form-col-1-8">
            <label>Hawa Mein</label>
            <div class="mws-form-item">
                <div id="mws-ui-button-radio">
                    <button class='fastbtns' id="hawa-mein">&nbsp;&nbsp;&nbsp;Hawa Mein&nbsp;&nbsp;&nbsp;</button>
                </div>
            </div>
        </div>

        <span id="ball_status" hidden></span>
    </div>
</div>
<script>

    $(function () {
        var overOld = (isNaN($('#overs-text').val()) ? 0 : $('#overs-text').val());
        var runOld = (isNaN($('#run-text').val()) ? 0 : $('#run-text').val());
        var wicktOld = (isNaN($('#wicket-text').val()) ? 0 : $('#wicket-text').val());
        var ball1 = '<?= $ballDetail["ball_one"]?>';
        var ball2 = '<?= $ballDetail["ball_two"]?>';
        var ball3 = '<?= $ballDetail["ball_three"]?>';
        var ball4 = '<?= $ballDetail["ball_four"]?>';
        var ball5 = '<?= $ballDetail["ball_five"]?>';
        var ball6 = '<?= $ballDetail["ball_six"]?>';
        <?php if(!empty($ballDetail)){ ?>
            var balls = [];
            if(ball1!=""){
                balls = balls.concat([ball1]);
            }if(ball2!=""){
                balls = balls.concat([ball2]);
            }if(ball3!=""){
                balls = balls.concat([ball3]);
            }if(ball4!=""){
                balls = balls.concat([ball4]);
            }if(ball5!=""){
                balls = balls.concat([ball5]);
            }if(ball6!=""){
                balls = balls.concat([ball6]);
            } 
        <?php } else { ?>
            var balls = [];
        <?php } ?>
        var shiftedValue = "";
        var ballDetailId = "<?= $ballDetail['id'] ?>";


        function addNextBall(ball_status){
            if(balls.length==6){
                    shiftedValue = balls.shift();
            }
            if(ball_status.trim()=="Wicket"){
                ball_status="W";
            }
            balls.push(ball_status.trim());
            console.log("addNextBall: "+balls);
            submitBallDetails(balls);
        }

        function editBalls(){
            balls.pop();
            if(shiftedValue!=""){
                balls.unshift(shiftedValue);
            }
            console.log("editBalls: "+balls);
        }

        function changeBallData(Value){
            if(Value==""){
                balls[balls.length-1]=balls[balls.length-1].replace(/W/,"");
            }
            else if(Value=="W"){
                balls[balls.length-1]+="W";   
            }
            else{
                balls[balls.length-1] = Value.trim();
            }
            console.log("changeBallData: "+balls);
            submitBallDetails(balls);
        }

        function submitBallDetails(balls){
            var data={
                id: ballDetailId,
                scoreboard_id: '<?= $score["Score"]["id"] ?>',
                ball_one: (balls[0]==null ? "" : balls[0].trim()),
                ball_two: (balls[1]==null ? "" : balls[1].trim()),
                ball_three: (balls[2]==null ? "" : balls[2].trim()),
                ball_four: (balls[3]==null ? "" : balls[3].trim()),
                ball_five: (balls[4]==null ? "" : balls[4].trim()),
                ball_six: (balls[5]==null ? "" : balls[5].trim())
            };
            $.ajax({
                type: "post",
                data: data,
                dataType: "JSON",
                url: '<?= Router::url(["controller" => "Admins", "action" => 'ball_details']); ?>',
                success: function (result) {
                    ballDetailId = result.id;
                },
                error: function (x) {
                    if(x.status == 403){
                        window.location.href = '<?= Router::url(["controller" => "Admins", "action" => 'login']); ?>';
                    }
                }
            });
        }

        function incrementOvr(){
            var currentOver = $("#overs-text").val();
            currentOver = (parseFloat(currentOver) + 0.1).toFixed(1);
            var over = parseInt(currentOver);
            var balls = (currentOver - over).toFixed(1);
            if (balls == 0.6) {
                over++;
                currentOver = over;
                balls = 0;
            }
            $("#overs-text").val(currentOver);
            $('#box-over').html(currentOver);
            updateScoreOvers(<?= $lastAssump['id'] ?>);
            callAssumptionUpdate(assumpUpdate,<?= $lastAssump['id'] ?>);  
            callAjax(UpdateWickets);
        }

        $('#overs-text').on('change',function(){
            var curOver = $('#overs-text').val();
            if(parseFloat(overOld) < parseFloat(curOver)){
                addNextBall($('#ball_status').text());    
            }
            else if(parseFloat(overOld) > parseFloat(curOver)){
                editBalls();
            }
            overOld = curOver;
        });


        $('#wicket-text').change(function(){
            if(parseInt($('#wicket-text').val())<parseInt(wicktOld)){
                changeBallData("");
            }
            else if(parseInt($('#wicket-text').val())>parseInt(wicktOld)){
                changeBallData("W");   
            }
        });

        $('#end-inning').on('click',function(){
            var cnf = confirm("Are you sure to end this inning?");
            if(!cnf){
                return;
            }
            var dataval = 0;
             $('#box-current-innings').html("1");

             callAjax(UpdateInnings);
             var url = '<?= Router::url(["controller"=>"admins","action"=>"index",$this->Session->read('MatchSession'),2])?>';
             window.location.href = url;
        });
        $("#wicket-btn-min").on('click', function () {
            if ($('#box-wicket').html() == 0)
                return;
            var wic = parseInt($('#box-wicket').html()) - 1;
            $('#box-wicket').html(wic);
            $('#wicket-text').val(wic);
            $('#history-score').val($('#run-text').val()+"/"+$('#wicket-text').val());
            $('#target-score').val($('#run-text').val()+"/"+$('#wicket-text').val());
            $('#ball_status').text($(this).text());
            $("#overs-min").click();
        });

        $('#extra-wide-runs').change(function(){
            var currentRuns = parseInt($("#run-text").val());
            currentRuns = currentRuns+parseInt($('#extra-wide-runs').val());
            $("#run-text").val(currentRuns);
            $('#box-run').html(currentRuns);
            $('#ball_status').text($('#extra-wide-runs').val()+"\nWide");
            changeBallData($('#extra-wide-runs').val()+"wd");            
            $('#extra-wide-runs').val("");
            callAjax(UpdateScore);
        });

        $('#wide-no-ball').click(function () {
            $('#run-text').val(parseInt($('#run-text').val()) + 1);
            $('#box-run').html($('#run-text').val());
            $('#ball_status').text("Wide");
            addNextBall("wd");
            updateScoreOvers(<?= $lastAssump['id'] ?>);
            callAssumptionUpdate(assumpUpdate,<?= $lastAssump['id'] ?>);
            callAjax(UpdateScore);
        });

        $('#extra-no-runs').change(function(){
            var currentRuns = parseInt($("#run-text").val());
            currentRuns = currentRuns+parseInt($('#extra-no-runs').val());
            $("#run-text").val(currentRuns);
            $('#box-run').html(currentRuns);
            $('#ball_status').text($('#extra-no-runs').val()+"\nNo Ball");
            changeBallData($('#extra-no-runs').val()+"nb");
            $('#extra-no-runs').val("");
            callAjax(UpdateScore);
        });



        $('#no-ball').click(function () {
            $('#run-text').val(parseInt($('#run-text').val()) + 1);
            $('#box-run').html($('#run-text').val());
            $('#ball_status').text("No Ball");
            addNextBall("nb");
            updateScoreOvers(<?= $lastAssump['id'] ?>);
            callAssumptionUpdate(assumpUpdate,<?= $lastAssump['id'] ?>);
            callAjax(UpdateScore);
        });



         $('.fastbtns').click(function(){
            $('#ball_status').text($(this).text().trim());
            callAjax(UpdateScore);
         });
         $('.head-fast-btns').click(function(){
            $('#ball_status').text($(this).data("text"));
            callAjax(UpdateScore);
         });

        $("#wicket-btn-plus").on('click', function () {
            if ($('#box-wicket').html() == 12)
                return;
            var wic = parseInt($('#box-wicket').html()) + 1;
            $('#box-wicket').html(wic);
            $('#wicket-text').val(wic);
            $('#ball_status').text($(this).text());
            wicktOld = wic;
            updateScoreOvers(<?= $lastAssump['id'] ?>);
            incrementOvr();
        });
        $('.fast-btns').on('click', function () {
            $('#run-text').val(parseInt($('#run-text').val()) + parseInt($(this).attr('run')));
            $('#box-run').html($('#run-text').val());
            $('#ball_status').text($(this).text());
            updateScoreOvers(<?= $lastAssump['id'] ?>);
            incrementOvr();
        });
    });
</script>
