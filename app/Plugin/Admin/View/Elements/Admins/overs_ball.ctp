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
                </div>
            </div>
        </div>
        <div class="mws-form-row mws-form-col-1-8">
            <label>No Ball</label>
            <div class="mws-form-item">
                <div id="mws-ui-button-radio">
                    <button class="" id="no-ball">&nbsp;&nbsp;&nbsp;No Ball&nbsp;&nbsp;&nbsp;</button>
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

         $('#wide-no-ball').click(function () {
            $('#run-text').val(parseInt($('#run-text').val()) + 1);
            $('#box-run').html($('#run-text').val());
            updateScoreOvers(<?= $lastAssump['id'] ?>);

            $('#ball_status').text($(this).text());
            callAssumptionUpdate(assumpUpdate,<?= $lastAssump['id'] ?>);
            callAjax(UpdateScore);
        });

        $('#no-ball').click(function () {
            $('#run-text').val(parseInt($('#run-text').val()) + 1);
            $('#box-run').html($('#run-text').val());
            $('#ball_status').text($(this).text());
            updateScoreOvers(<?= $lastAssump['id'] ?>);
            callAssumptionUpdate(assumpUpdate,<?= $lastAssump['id'] ?>);
            callAjax(UpdateScore);
        });



         $('.fastbtns').click(function(){
            $('#ball_status').text($(this).text());
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
            updateScoreOvers(<?= $lastAssump['id'] ?>);
            $('#ball_status').text($(this).text());
            $("#overs-plus").click();
        });
        $('.fast-btns').on('click', function () {
            $('#run-text').val(parseInt($('#run-text').val()) + parseInt($(this).attr('run')));
            $('#box-run').html($('#run-text').val());
            updateScoreOvers(<?= $lastAssump['id'] ?>);
            $('#ball_status').text($(this).text());
            $('#overs-plus').click();
        });
    });
</script>
