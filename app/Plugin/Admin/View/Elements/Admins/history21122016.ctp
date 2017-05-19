<div class="mws-panel-header">
    <span style="width:100px;float:left" class="mws-i-24 mws-report-icon mws-ic-16 ic-calculator">History</span>
</div>
<div class="mws-panel-body">
    <!--    <div id="obj">Object</div>-->
    <form class="mws-form" action="widgets.html">
        <div class="mws-form-inline assumption assumption-panel">
            <br>
            <div class="mws-form-block grid_2">
                <div class="">
                    <label>Overs</label>
                    <div class="mws-form-item large">
                       <input type="text" id="over-text" class="target-overs mws-textinput">
                    </div>
                </div>
            </div>
            <div class="mws-form-block grid_1">
                <label>Inning</label>
                <div class="mws-form-item large">
                    <?php
                    echo $this->Form->select('inning', $InningSelect, ["value" => $inning, "id" => "target-inning", "class" => "target-inning mws-textinput"]);
                    ?>
                </div>
            </div>
            <div class="mws-form-block grid_1">
                <label>Score</label>
                <div class="mws-form-item large">
                    <input type="text" id="score-text" class="target-overs mws-textinput">
                    <?php
                    //echo $this->Form->select('teams', $teamsSelect, ["empty" => "Team", "value" => $inning, "id" => "target-teams-select", "class" => "target-teams-select mws-textinput"]);
                    ?>
                </div>
            </div>
            <div class="mws-form-block grid_1">
                <label>Teams</label>
                <div class="mws-form-item large">
                    <input type="text" id="team-text" class="target-overs mws-textinput">
                </div>
            </div>
            <div class="mws-form-block grid_1">
                <label>&nbsp;</label>
                <div class="mws-form-item large">
                    <input type="button" action="target-text"  class="mws-button red" id="history-edit" value="Edit">
                </div>
            </div>
            <div class="clearfix"></div>
    </form>
</div>
<br>
<!--<div id="basePanel">Base</div>-->
</div>
<script type="text/javascript">
    // $(function () {
    //     $('#history-edit').on('click', function() {
    //         if($("#" + ))




    //     });




    // });













</script>