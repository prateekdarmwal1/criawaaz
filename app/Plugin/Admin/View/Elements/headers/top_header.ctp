<div id="mws-header" class="clearfix">
	<!-- Logo Container -->
	<div id="mws-logo-container">

		<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
		<div id="mws-logo-wrap">
			<?=$this->Html->image("logo.png")?>
		</div>

	</div>
	<a class="mws-report" href="#" style="width: 70% !important; height:5% !important">
        <!-- Statistic Icon (edit to change icon) -->
        <!-- <span class="mws-report-icon mws-ic ic-group-link"></span> -->

        <!-- Statistic Content -->
        <span class="mws-report-content">
            
            <span class="mws-report-value" style="font-size:14px" id="box-tournament">Tournament :&emsp;&emsp;<?= $match['Match']['tournament'] ?></span>
        </span>
    </a>

	<!-- User Tools (notifications, logout, profile, change password) -->
	<div id="mws-user-tools" class="clearfix">

		<div id="mws-user-info" class="mws-inset">

			<!-- User Photo -->
<!--			<div id="mws-user-photo">-->
<!--				<img src="example/profile.jpg" alt="User Photo" />-->
<!--			</div>-->

			<!-- Username and Functions -->
			<div id="mws-user-functions">
				<div id="mws-username">
                                    Hello, <?php echo $logged_in["Admin"]["username"]?>
				</div>
				<ul>
<!--					<li><a href="#">Profile</a></li>-->
<!--					<li><a href="#">Change Password</a></li>-->
					<li><?=$this->Html->link("Logout",["controller"=>"Admins","action"=>"logout"])?></li>
				</ul>
			</div>
		</div>
	</div>
</div>
