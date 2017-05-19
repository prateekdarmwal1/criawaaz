<div id="mws-sidebar">

	<div id="mws-navigation">
		<ul>
			<li><?=$this->Html->link("Dashboard",["controller"=>"Admins","action"=>"index"],["class"=>"mws-i-24 i-home"])?></li>

			<a class="mws-report" href="#" style="">
        <span class="mws-report-icon mws-ic ic-walk"></span>

        <!-- Statistic Content -->
        <span class="mws-report-content">
            <span class="mws-report-title">Total Runs</span>
            <span class="mws-report-value" id="box-run"><?= $score["Score"]["runs"] ?></span>
        </span>
    </a>
    <a class="mws-report" href="#" style="">
        <!-- Statistic Icon (edit to change icon) -->
        <span class="mws-report-icon mws-ic ic-user-delete"></span>

        <!-- Statistic Content -->
        <span class="mws-report-content">
            <span class="mws-report-title">Wicket</span>
            <span class="mws-report-value" id="box-wicket"><?= $score["Score"]["wickets"] ?></span>
        </span>
    </a>
    <a class="mws-report" href="#" style="">
        <span class="mws-report-icon mws-ic ic-sport-tennis"></span>

        <!-- Statistic Content -->
        <span class="mws-report-content">
            <span class="mws-report-title">Overs</span>
            <span class="mws-report-value" id="box-over"><?= $score["Score"]["overs"] ?></span>
        </span>
    </a>
    <a class="mws-report" href="#">
        <!-- Statistic Icon (edit to change icon) -->
        <span class="mws-report-icon mws-ic ic-group-link"></span>

        <!-- Statistic Content -->
        <span class="mws-report-content">
            <span class="mws-report-title">Team</span>
            <span class="mws-report-value" style="font-size:1.3em" id="box-team"><?= $score["Score"]["team"] ?></span>
        </span>
    </a>

		<!-- change password -->
    <a class="mws-report" onclick="showModal('changePasswordModal')">
        <!-- Statistic Icon (edit to change icon) -->
        <span class="mws-report-icon mws-ic ic-lock-edit"></span>

        <!-- Statistic Content -->
        <span class="mws-report-content">
            <span class="mws-report-title" style="font-size:14px;font-weight:bold">Change<br> password</span>
            <span class="mws-report-value" style="font-size:1.3em;display:none;" id="box-current-innings"><?= $score["Score"]["innings_over"] ?></span>
        </span>
    </a>
    <!-- app version -->
    <a class="mws-report" onclick="showModal('appVersionModal')">
        <!-- Statistic Icon (edit to change icon) -->
        <span class="mws-report-icon mws-ic ic-blackboard-steps"></span>

        <!-- Statistic Content -->
        <span class="mws-report-content">
            <span class="mws-report-title">App&nbsp;Version<br/></span>
            <span class="mws-report-value" style="font-size:1.3em">v.&nbsp;<version id="appVersion"><?= !empty($appdetail) ? $appdetail['Appdetail']['appversion'] : "0" ?></version><br>change..</span>
        </span>
    </a>
		</ul>
	</div>
</div>




<!-- change Password Modal -->
<div id="changePasswordModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="closeModal('changePasswordModal')">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">
				<div class="form-group" id="confirmationError">
					<p style="font-size:12px; font-weight:bolder; color:red"></p>
				</div>
				<div class="form-group">
	        <label for="password">New Password</label>
					<input type="password" id="password" autocomplete="off" class="form-control"/>
				</div>
				<div class="form-group">
	        <label for="passwordConfirmation">Confirm Password</label>
					<input type="password" id="passwordConfirmation" autocomplete="off" class="form-control"/>
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="changeAdminPassword()" class="btn btn-primary" >Update</button>
      </div>
    </div>

  </div>
</div>

<!-- app version modal-->
<div id="appVersionModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="closeModal('appVersionModal')">&times;</button>
        <h4 class="modal-title">App Version</h4>
      </div>
      <div class="modal-body">
				<div class="form-group" id="versionChangeError">
					<p style="font-size:12px; font-weight:bolder; color:red"></p>
				</div>

				<div class="form-group">
					<label>Current App Version</label>
					<h4 id="currentAppVersion"><?= !empty($appdetail) ? $appdetail['Appdetail']['appversion'] : "0" ?></h4>
				</div>

				<div class="form-group">
	        		<label for="password">Change App Version</label>
					<input type="text" id="newAppVersion" autocomplete="off" class="form-control"/>
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="changeAppVersion()" class="btn btn-primary" >Update</button>
      </div>
    </div>

  </div>
</div>


<script>
var modal;
// var modal = $('#changePasswordModal');

function showModal(modalId){
	modal = document.getElementById(modalId);
	$('#'+modalId).show();
}
function closeModal(modalId){
	$('#'+modalId).hide();
}

//hiding modal on clicking anywhere else than modal
window.onclick = function(event){
	if(event.target == modal){
		$(modal).hide();
		// modal.style.display = "none";
	}
};

//hiding confirmationError

$('#password').focus(function(){
	$('#confirmationError').hide();
});
// change password
function changeAdminPassword(){
	if($('#password').val().length < 6){
		$('#confirmationError p').text("Password should have a minimum length of 6 characters");
		$('#password').val("");
		$('#passwordConfirmation').val("");
		$('#confirmationError').show('slow');
		return;
	}

	if($('#password').val() == $('#passwordConfirmation').val()){
		var data={
			password: $('#password').val()
		};
		NProgress.start();
		$.ajax({
			data: data,
			type: "post",
			url: '<?= Router::url(["controller" => "Admins", "action" => 'changePassword']); ?>',
			success: function(result){
				NProgress.done();
				closeModal('changePasswordModal');
				if(result == true){
					alert("Password changed successfully");
				}
				else if (result == false) {
					alert("Password cannot be changed please try again.");
				}
			},
			error: function(x){
				closeModal('changePasswordModal');
				NProgress.done();
				if(x.status == 403){
                	window.location.href = '<?= Router::url(["controller" => "Admins", "action" => 'login']); ?>';
                }
				// alert("Something went wrong please try again.");
			}
		});
	}
	else{
		$('#confirmationError p').text("Password not matched.");
		$('#password').val("");
		$('#passwordConfirmation').val("");
		$('#confirmationError').show('slow');
		return;
	}
}


//hiding versionChangeError
$('#newAppVersion').focus(function(){
	$('#versionChangeError').hide();
});

// change app version
function changeAppVersion(){
	if($('#newAppVersion').val()==""){
		$('#versionChangeError p').text("App Version can't be left blank.");
		$('#versionChangeError').show('slow');
		return;
	}
	if(parseFloat($('#newAppVersion').val()) < parseFloat($('#currentAppVersion').text())) {
		$('#versionChangeError p').text("New App Version can't be less than Current Version.");
		$('#newAppVersion').val("");
		$('#versionChangeError').show('slow');
		return;
	}
	var newversion = $('#newAppVersion').val().trim();
	var data={
			appversion: newversion
		};
		NProgress.start();
		$.ajax({
			data: data,
			type: "post",
			url: '<?= Router::url(["controller" => "Admins", "action" => 'changeAppVersion']); ?>',
			success: function(result){
				NProgress.done();
				closeModal('appVersionModal');
				if(result == true){
					$('#currentAppVersion').text(newversion);
					$('#appVersion').text(newversion);
					alert("App Version changed successfully");
				}
				else if (result == false) {
					alert("App Version cannot be changed please try again.");
				}
			},
			error: function(x){
				closeModal('appVersionModal');
				NProgress.done();
				if(x.status == 403){
                	window.location.href = '<?= Router::url(["controller" => "Admins", "action" => 'login']); ?>';
                }
				// alert("Something went wrong please try again.");
			}
		});
	}

</script>
