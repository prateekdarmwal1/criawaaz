<?php
$controller = strtolower($this->request->params["controller"]);

?>
<div class="row" style="margin-bottom: 3px;">
<div class="col-lg-12">
		<div class="navigation-bar">
			<ul class="">
				<?php
					$class = "";
					if(strtolower($title)=="home")
						$class = "active";
				?>
				<li class="<?=$class?>"><?=$this->Html->link("Home",["controller"=>"homes","action"=>"index"])?></li>
				<?php
				$class = "";
				if(strtolower($title)=="products")
					$class = "active";
				?>
				<li class="<?=$class?>"><?=$this->Html->link("Products",["controller"=>"products"])?></li>

				<?php
				$class = "";
				if(strtolower($title)=="bonds")
					$class = "active";
				?>
				<li class="<?=$class?>"><?=$this->Html->link("Bonds",["controller"=>"homes",'action'=>"bonds"])?></li>
				<?php
				$class = "";
				if(strtolower($title)=="payment")
					$class = "active";
				?>
				<li class="<?=$class?>"><?=$this->Html->link("Payment",["controller"=>"homes",'action'=>"payment"])?></li>
				<?php
				$class = "";
				if(strtolower($title)=="faq")
					$class = "active";
				?>
				<li class="<?=$class?>"><?=$this->Html->link("Faq",["controller"=>"homes",'action'=>"faqs"])?></li>
				<?php
				$class = "";
				if(strtolower($title)=="about us")
					$class = "active";
				?>
				<li class="<?=$class;?>"><?=$this->Html->link("About Us",["controller"=>"homes",'action'=>"aboutus"])?></li>
				<?php
				$class = "";
				if(strtolower($title)=="contact us")
					$class = "active";
				?>
				<li class="<?=$class;?>"><?=$this->Html->link("Contact",["controller"=>"contactpersons"],["style"=>'padding-left: 72px;'])?></li>
			</ul>
		</div>
</div>
</div>
