<!-- Content -->
       <div id="content">
       <nav class="navbar hidden-print main " role="navigation">
       <!--   header side button                    -->
                   <div class="navbar-header pull-left">
                       <div class="user-action user-action-btn-navbar pull-left border-right">
                           <button class="btn btn-sm btn-navbar btn-inverse btn-stroke"><i class="fa fa-bars fa-2x"></i>
                           </button>
                       </div>
                   </div>
       <!-- Right side icon pic and etc  -->
                   <ul class="main pull-right ">
                       <li class="dropdown notif notifications hidden-xs">
                              <?php echo $this->Html->link('',array('controller'=>'','action'=>''),array('escape'=>false));  ?>
          <!-- right side icon with drop down photo-->
                           <ul class="dropdown-menu chat media-list pull-right">
                               <li class="media">
                                   <?php echo $this->Html->image("../assets/images/people/100/15.jpg", array("border" => "none", "class" => "media-object thumb pull-left", "alt"=>"50x50" ,"width"=>"50",'url'=>'javascript:void(0)'));?>
                                   <div class="media-body">
                                       <span class="label label-default pull-right">5 min</span>
                                       <h5 class="media-heading">Adrian D.</h5>
                                       <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing
                                           elit.</p>
                                   </div>
                               </li>
                               <li class="media">
                                       <?php echo $this->Html->image("../assets/images/people/100/16.jpg", array("border" => "none", "class" => "pull-left", "alt"=>"50x50" ,"width"=>"50",'url'=>'javascript:void(0)'));?>
                                   <div class="media-body">
                                       <span class="label label-default pull-right">2 days</span>
                                       <h5 class="media-heading">Jane B.</h5>
                                       <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing
                                           elit.</p>
                                   </div>
                               </li>
                               <li class="media">
                                       <?php echo $this->Html->image("../assets/images/people/100/17.jpg", array("border" => "none", "class" => "pull-left", "alt"=>"50x50" ,"width"=>"50",'url'=>'javascript:void(0)'));?>

                                   <div class="media-body">
                                       <span class="label label-default pull-right">3 days</span>
                                       <h5 class="media-heading">Andrew M.</h5>
                                       <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing
                                           elit.</p>
                                   </div>
                               </li>
                               <li><?php  echo $this->Html->link('<i class="fa fa-list"></i> <span>View all messages</span>',array('controller'=>'','action'=>'#'),array('class'=>"btn btn-primary",'escape'=>False));       ?>
                               </li>
                           </ul>
                       </li>
                       <?php $admin=explode(',',$this->Session->read('USER_NAME_ROLE')); ?>
                      <li class="dropdown username">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                           <?php echo $admin[0]; ?>
                               <span class="caret"></span>
                           </a>
                           <ul class="dropdown-menu pull-right">
                                                            <li><?php echo $this->Html->link('<i></i>Logout',array('controller'=>'admins','action'=>'logout'),array('class'=>"glyphicons lock no-ajaxify",'escape'=>false));?>
                               </li>
                           </ul>
                       </li>
                   </ul>



               </nav>
           <!-- // END navbar -->
           <?php echo $content_for_layout;?>
       </div>
       <!-- // Content END -->
<div class="clearfix"></div>