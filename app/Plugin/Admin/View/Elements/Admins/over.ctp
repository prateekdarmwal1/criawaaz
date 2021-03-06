<div class="mws-panel-header">
    <span class="mws-i-24 mws-report-icon mws-ic-16 ic-sport-tennis">Overs</span>
</div>
<div class="mws-panel-body">
    <form class="mws-form" onsubmit="return false">
        <div class="mws-form-row">
           
            <div class="mws-form-item">
                <div id="mws-ui-button-radio">
                    <button id="overs-min">&nbsp;-&nbsp;</button>
                    <input type="text" class="mws-textinput pull-lef readonly"  style="width:25%"  id="overs-text" value="<?= $score["Score"]["overs"] ?>"/>
                    <button id="overs-plus" class="pull-left" style="margin-left: -3px;" >&nbsp;+&nbsp;</button>
                    <input type="button" action="overs-text"  class="mws-button red" style="margin-left: 2%" id="over-edit" value="Edit">
                </div>
            </div>
            
        </div>
    </form>
</div>
<script>
    
    $(function () {
        $('#over-edit').on('click', function () {
            if ($("#" + $(this).attr('action')).is(':disabled')) {
                $("#" + $(this).attr('action')).attr('disabled', false);
                $(this).val('Submit');
            } else {
                $("#" + $(this).attr('action')).attr('disabled', true);
                $(this).val('Edit');
                $('#box-over').html($('#overs-text').val());
                updateScoreOvers(<?= $lastAssump['id'] ?>);
                callAssumptionUpdate(assumpUpdate,<?= $lastAssump['id'] ?>);
                callAjax(UpdateWickets);
            }
        });
        $("#overs-min").on('click', function () {
            var currentOver = $("#overs-text").val();
            currentOver = (parseFloat(currentOver) - 0.1).toFixed(1);
            var over = parseInt(currentOver);
            var balls = (currentOver - over).toFixed(1);
            if (currentOver == -0.1)
                return;
            if (balls == 0.9) {
                currentOver = over + 0.5;
            }
            $("#overs-text").val(currentOver);
            $('#box-over').html(currentOver);
            overOld = currentOver;
            $("#overs-text").trigger('change');
            updateScoreOvers(<?= $lastAssump['id'] ?>);
            callAssumptionUpdate(assumpUpdate,<?= $lastAssump['id'] ?>);
            callAjax(UpdateWickets);
        });
        $("#overs-plus").on('click', function () {
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
            overOld = currentOver;
            updateScoreOvers(<?= $lastAssump['id'] ?>);
            callAssumptionUpdate(assumpUpdate,<?= $lastAssump['id'] ?>);  
            callAjax(UpdateWickets);
        });
    });
</script>
