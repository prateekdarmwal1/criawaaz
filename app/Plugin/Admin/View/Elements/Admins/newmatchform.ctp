
<!-- Form for new match -->



  <div id="mws-form-dialog" class="ui-dialog-content ui-widget-content" style="width: auto; min-height: 30px; height: auto;" scrolltop="0" scrollleft="0">
    <form id="mws-validate" class="mws-form"  onsubmit="return false">
        <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
        <div class="mws-form-inline">
          <div class="mws-form-row">
                <label>Tournament</label>
                <div class="mws-form-item large">
                    <input name="tournament" class="mws-textinput required" id="tournament" type="text">
                </div>
            </div>
          <div class="mws-form-row">
                <label>Team 1</label>
                <div class="mws-form-item large">
                    <input name="team1_name" class="mws-textinput required" id="team1" type="text">
                    
                </div>
            </div>
            <br>
            <div class="mws-form-row">
                <label>Team 1 image</label>
                <div class="mws-form-item large">
                    <input name="team1_img" class="mws-textinput required" id="team1-img" type="file">  
                </div>
            </div>
            <br>
            <center><h3>VS</h3></center><br>
          <div class="mws-form-row">
              <label>Team 2</label>
              <div class="mws-form-item large">
                  <input name="team2_name" class="mws-textinput required" id="team2" type="text">
              </div>
          </div>
          <br>
          <div class="mws-form-row">
                <label>Team 2 image</label>
                <div class="mws-form-item large">
                    <input name="team2_img" class="mws-textinput required" id="team2-img" type="file">  
                </div>
            </div>
            <br>
        </div>

    </form>

  <div class="ui-resizable-handle ui-resizable-n" style="z-index: 1000;"></div>
  <div class="ui-resizable-handle ui-resizable-e" style="z-index: 1000;"></div>
  <div class="ui-resizable-handle ui-resizable-s" style="z-index: 1000;"></div>
  <div class="ui-resizable-handle ui-resizable-w" style="z-index: 1000;"></div>
  <div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se ui-icon-grip-diagonal-se" style="z-index: 1000;"></div>
  <div class="ui-resizable-handle ui-resizable-sw" style="z-index: 1000;"></div>
  <div class="ui-resizable-handle ui-resizable-ne" style="z-index: 1000;"></div>
  <div class="ui-resizable-handle ui-resizable-nw" style="z-index: 1000;"></div>
  <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
    <div class="ui-dialog-buttonset">
      <button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false" id="newMatchFormSubmit">
        <span class="ui-button-text">Submit</span>
      </button>

      </div>
    </div>
  </div>


<!-- Script to empty the field value each time modal pop -->
<script type="text/javascript">
function validateNewMatchForm(){
  var flag = 1;
  if($('#tournament').val() == "" || $('#team1').val() == "" || $('#team1-img').val() == "" || $('#team2').val() == "" || $('#team2-img').val() == ""){
    flag = 0;
  }
  return flag;
}


    $("#mws-validate").submit(function(e){
      e.preventDefault();
      var validation = validateNewMatchForm();
      if(validation == 0){
        alert("Please Fill all fields.");
        return;
      }
      callMatch(newMatch);
      var dataval = 0;
      var teams = $('#team1').val().concat(" vs ").concat($('#team2').val());
      $("#mws-form-dialog").dialog("option", {
        modal: true
      }).dialog("close");
    });
    var newMatch = function() {};
    function callMatch(callback){
       NProgress.start();
        var form = $("form#mws-validate");
        var formData = new FormData(form[0]);

        var teams = $('#team1').val().concat(" vs ").concat($('#team2').val());
        console.log(formData);
        formData.append("teams", teams);
        var redirect_url = '<?= Router::url(["controller"=>"admins","action"=>"index"])?>';
        $.ajax({
            type: "post",
            data: formData,
            dataType: "JSON",
            url: '<?= Router::url(["controller" => "Admins", "action" => 'newmatchform']); ?>',
            contentType: false,
            processData: false,
            success: function (result) {
                NProgress.done();
                // callback(result);
                // alert(result.saveSuccess);
                if(result.saveSuccess)
                {
                    // alert("hello data has been saved with matchid: "+result.matchid);
                    // the redirect
                    window.location.href = redirect_url+"/index/"+result.matchid+"/1";
                }
                // if(result==="no_errors"){

                // }
                // window.location.href = "http://www.google.com"

            },
            error: function (x) {
                // alert(x.responseText);
                NProgress.done();
                if(x.status == 403){
                    window.location.href = '<?= Router::url(["controller" => "Admins", "action" => 'login']); ?>';
                }
            }
        });
    }
</script>
