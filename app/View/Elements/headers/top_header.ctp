	<div class="row">
		<div class="col-lg-12">
			<div class="top-header">
				<div class="pull-left">Contact For Query</div>
				<div class="pull-right">
					<ul>
						<?php
						if(isset($logged_in["id"])){?>
						<li><a href="javascript:void(0)">My Account</a></li>
						<li><a href="javascript:void(0)">My Order</a></li>
						<li><?=$this->Html->link('Logout',["Controller"=>"users","action"=>"logout"])?></li>
						<?php }else{ ?>
							<li>
								<a href="javascript:void(0)" class="user-login-btn">Login &nbsp;<i class="fa fa-user"></i>
							</a>
							</li>
						<?php } ?>

						<li><a href="#">Basket &nbsp;<i class="fa fa-shopping-cart"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-12" style="margin-bottom: 2%;">
			<div class="col-md-6">
				<div class="middle-header">
					<h4>REALDUCK.DE-</h4>
					<h4>REALDUCK.DE-</h4>
					<h4 class="green">MASTERARBEIT</h4>
				</div>
			</div>
			<div class="col-md-6">
				<div class="search-class">
					<input type="text" class="form-control" placeholder="Search">
				</div>
			</div>
		</div>
	</div>
