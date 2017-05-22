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
    if(isset($matchSchedule) && !empty($matchSchedule))
    {
        foreach($matchSchedule as $match)
        {?>
    <div id="view-match-schedule-<?= $match['Matchschedule']['id'] ?>">
        <form class="mws-form" action="widgets.html">
            <div class="mws-form-block grid_1">
                <label>Delete</label>
                <div class="mws-form-item large"><span class="ui-icon ui-icon-trash" onclick="deleteMatchScheduleRow(<?= $match['Matchschedule']['id'] ?>)"></span></div>
            </div>
            <div class="mws-form-block grid_1">
                <label>Teams</label>
                <div class="mws-form-item large">
                    <input type="text" id="match-schedule-teams-<?=$match['Matchschedule']['id']?>" class="target-overs mws-textinput readonly" value="<?= $match['Matchschedule']['teams'] ?>">
                </div>
            </div>
            <div class="mws-form-block grid_1">
                <label>Time</label>
                <div class="mws-form-item large">
                    <input type="text" id="match-schedule-time-<?=$match['Matchschedule']['id']?>" class="target-overs mws-textinput readonly" value="<?= $match['Matchschedule']['time'] ?>">
                </div>
            </div>
            <div class="mws-form-block grid_2">
                <label>Date</label>
                <div class="mws-form-item large">
                    <input type="text" id="match-schedule-date-<?=$match['Matchschedule']['id']?>" class="target-overs mws-datepicker schedule-date readonly" value="<?= $match['Matchschedule']['date'] ?>">
                </div>
            </div>
            <div class="mws-form-block grid_2">
                <label>Venue</label>
                <div class="mws-form-item large">
                    <input type="text" id="match-schedule-venue-<?=$match['Matchschedule']['id']?>" class="target-score mws-textinput readonly" value="<?= $match['Matchschedule']['venue'] ?>">
                </div>
            </div>
            <div class="mws-form-block grid_1">
                <label>&nbsp;</label>
                <div class="mws-form-item large">
                    <input type="button" action="target-text"  class="mws-button red" id="match-schedule-submit-<?=$match['Matchschedule']['id']?>" value="Edit Match" onClick="changeMatchSchedule(<?= $match['Matchschedule']['id'] ?>)">
                </div>
            </div>
            <div class="clearfix"></div>

    </form><hr/>
</div>


    <?php
        }
    } ?>


<form class="mws-form" action="widgets.html">
    <div class="mws-form-block grid_1">
        <label>Teams</label>
        <div class="mws-form-item large">
            <input type="text" id="match-schedule-teams" class="target-overs mws-textinput readonly">
        </div>
    </div>
    <div class="mws-form-block grid_1">
        <label>Time</label>
        <div class="mws-form-item large">
            <input type="text" id="match-schedule-time" class="target-overs mws-textinput readonly">
        </div>
    </div>
    <div class="mws-form-block grid_2">
        <label>Date</label>
        <div class="mws-form-item large">
            <input type="text" id="match-schedule-date" class="target-overs mws-datepicker schedule-date readonly">
        </div>
    </div>
    <div class="mws-form-block grid_2">
        <label>Venue</label>
        <div class="mws-form-item large">
            <input type="text" id="match-schedule-venue" class="target-score mws-textinput readonly">
        </div>
    </div>
    <div class="mws-form-block grid_1">
        <label>&nbsp;</label>
        <div class="mws-form-item large">
            <input type="button" action="target-text"  class="mws-button red" id="match-schedule-submit" value="Add Match">
        </div>
    </div>
    <div class="clearfix"></div>
</form>
</div>

<script>

$('.schedule-date').datepicker( {
    dateFormat: 'dd MM yy'
});

//script for deleting match schedule starts...
    function deleteMatchScheduleRow(id){
        callMatchScheduleDelete(id);
        $("#view-match-schedule-"+id).html("");
    }

//ajax function definition for deleting history
    function callMatchScheduleDelete(id) {
        var data = {
            id: id
        };
        NProgress.start();
        $.ajax({
            type: "post",
            data: data,
            dataType: "JSON",
            url: '<?= Router::url(["controller" => "Admins", "action" => 'delete_match_schedule']); ?>',
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


//script for editing match schedule start ...
    function changeMatchSchedule(id){
        if ($("#match-schedule-teams-".concat(id)).is(':disabled')) {
            $("#match-schedule-teams-".concat(id)).attr('disabled',false);
            $("#match-schedule-time-".concat(id)).attr('disabled',false);
            $("#match-schedule-date-".concat(id)).attr('disabled',false);
            $("#match-schedule-venue-".concat(id)).attr('disabled',false);
            $("#match-schedule-submit-"+id).val("Submit");

        }
        else{
            $("#match-schedule-teams-".concat(id)).attr('disabled',true);
            $("#match-schedule-time-".concat(id)).attr('disabled',true);
            $("#match-schedule-date-".concat(id)).attr('disabled',true);
            $("#match-schedule-venue-".concat(id)).attr('disabled',true);
            $("#match-schedule-submit-"+id).val("Edit Match");
            callMatchScheduleUpdate(id);
        }
    }

// ajax function definition for Updating edited Match schedule on database
    function callMatchScheduleUpdate(id) {
        var data = {
            id: id,
            teams: $("#match-schedule-teams-"+id).val(),
            time: $("#match-schedule-time-"+id).val(),
            date: $("#match-schedule-date-"+id).val(),
            venue: $("#match-schedule-venue-"+id).val()
        };
        NProgress.start();
        $.ajax({
            type: "post",
            data: data,
            dataType: "JSON",
            url: '<?= Router::url(["controller" => "Admins", "action" => 'update_match_schedule']); ?>',
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

//script for creating new macth schedule starts...
    $(function () {

        $('#match-schedule-submit').click(function () {
            // alert("hello");

            if ($("#match-schedule-teams").is(':disabled')) {
                $("#match-schedule-teams").attr('disabled', false);
                $("#match-schedule-time").attr('disabled', false);
                $("#match-schedule-date").attr('disabled', false);
                $("#match-schedule-venue").attr('disabled', false);
                $(this).val('Submit');
            } else {
                $("#match-schedule-teams").attr('disabled', true);
                $("#match-schedule-time").attr('disabled', true);
                $("#match-schedule-date").attr('disabled', true);
                $("#match-schedule-venue").attr('disabled', true);
                $(this).val('Add Match');
                callMatchScheduleCreate();

            }

        });

        //ajax function definition for creating new maatch schedule-date in database
        function callMatchScheduleCreate() {
            var data = {
                teams: $("#match-schedule-teams").val(),
                time: $("#match-schedule-time").val(),
                date: $("#match-schedule-date").val(),
                venue: $("#match-schedule-venue").val()
            };
            var uri = window.location.href;
            // alert(uri);
            NProgress.start();
            var redirect_url = '<?= Router::url(["controller"=>"admins","action"=>"index"])?>';
            $.ajax({
                type: "post",
                data: data,
                dataType: "JSON",
                url: '<?= Router::url(["controller" => "Admins", "action" => 'create_match_schedule']); ?>',
                success: function (result) {
                    NProgress.done();
                    if(result.saveSuccess)
                    {
                        // the redirect
                        sessionStorage.activeTab = "matchSchedule";
                        window.location.href = uri;
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

    //script for new match schedule ends here...

</script>