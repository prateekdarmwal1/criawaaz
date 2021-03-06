<div class="mws-panel-header">
    <span class="mws-i-24 mws-report-icon mws-ic-16 ic-chart-bar">Score</span>
</div>
<div class="mws-panel-body" style="padding: 5px">
    <form class="mws-form" onsubmit="return false">
        <div class="mws-form-inline">
            <div class="grid_">
                <label style="width:115px">Runs And Wickets</label>
                <div class="mws-form-item">
                    <div class="mws-form-cols clearfix">
                        <div class="mws-form-col-3-8 alpha">
                            <div class="mws-form-item">
                                <div id="mws-ui-button-radio">
                                    <button id="runs-min">&nbsp;-&nbsp;</button>
                                    <input type="text" class="mws-textinput readonly" id="run-text" value="<?= $score["Score"]["runs"] ?>" style="width:40%"/>
                                    <button id="runs-plus">&nbsp;+&nbsp;</button>
                                </div>
                            </div>
                        </div>
                        <div class="mws-form-col-3-8 alpha">
                            <div class="mws-form-item large">
                                <input type="text" class="mws-textinput readonly" id="wicket-text" value="<?= $score["Score"]["wickets"] ?>">
                            </div>
                        </div>
                        <div class="mws-form-col-1-8">
                            <div class="mws-form-item large">
                                <input type="button" action="wicket-text" class="mws-button red" id="score-edit" value="Edit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    // $(function () {
        $('#score-edit').on('click', function () {
            if ($("#" + $(this).attr('action')).is(':disabled')) {
                $('#wicket-text').attr('disabled', false);
                $('#run-text').attr('disabled', false);
                $(this).val('Submit');
            } else {
                $('#wicket-text').attr('disabled', true);
                $('#run-text').attr('disabled', true);
                $(this).val('Edit');
                $('#box-run').html($('#run-text').val());
                $('#box-wicket').html($('#wicket-text').val());
                updateScoreOvers(<?= $lastAssump['id'] ?>);
                callAssumptionUpdate(assumpUpdate,<?= $lastAssump['id'] ?>);
                callAjax(UpdateWickets);
            }

        });
        $("#runs-min").on('click', function () {
            var currentRuns = parseInt($("#run-text").val());
 
            if(currentRuns>0){
                currentRuns = currentRuns-1;
            }
            $("#run-text").val(currentRuns);
            $('#box-run').html(currentRuns);
            updateScoreOvers(<?= $lastAssump['id'] ?>);
            callAssumptionUpdate(assumpUpdate,<?= $lastAssump['id'] ?>);
            callAjax(UpdateWickets);
        });
        $("#runs-plus").on('click', function () {
            var currentRuns = parseInt($("#run-text").val());
 
            currentRuns = currentRuns+1;
            $("#run-text").val(currentRuns);
            $('#box-run').html(currentRuns);
            updateScoreOvers(<?= $lastAssump['id'] ?>);
            callAssumptionUpdate(assumpUpdate,<?= $lastAssump['id'] ?>);
            callAjax(UpdateWickets);
        });
    
    function updateScoreOvers(id){
        $('#target-score').val($('#run-text').val()+"/"+$('#wicket-text').val());
        $('#assump-current_overs').val($('#overs-text').val());
        $('#assump-current_scores').val($('#run-text').val()+"/"+$('#wicket-text').val());

        if($('#assump-session-'.concat(id)).length>0){
            $('#assump-current_overs-'.concat(id)).val($('#overs-text').val());
            $('#assump-current_scores-'.concat(id)).val($('#run-text').val()+"/"+$('#wicket-text').val());
                $('#assump-session-'.concat(id)).focus();
        }
    }



</script>