<div class="mws-panel-header">
    <span class="mws-i-24 mws-report-icon mws-ic-16 ic-group">Teams</span>
</div>
<div class="mws-panel-body" style="padding-top:5px">
    
    <form class="mws-form" onsubmit="return false">
        <div class="mws-form-inline">
            
            <div class="mws-form-item" style="margin-left: 10px;">
                <div class="mws-form-cols clearfix">
                    <div class="mws-form-col-6-8 alpha">
                        <div class="mws-form-item">
                            <input type="text" class="mws-textinput readonly" id="team-text" value="<?= $score["Score"]["team"] ?>">
                        </div>
                    </div>
                    <div class="mws-form-col-2-8">
                        <div class="mws-form-item large">
                            <input type="button" action="team-text"  class="mws-button red" id="team-edit" value="Edit">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>
<script>
    ;
    $(function () {
        $('#team-edit').on('click', function () {
            if ($("#" + $(this).attr('action')).is(':disabled')) {
                $("#" + $(this).attr('action')).attr('disabled', false);
                $(this).val('Submit');
            } else {
                $("#" + $(this).attr('action')).attr('disabled', true);
                $(this).val('Edit');
                $('#box-team').html($('#team-text').val());
                callAjax(UpdateWickets);
            }
        });
    });
</script>