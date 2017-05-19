<!-- Sidebar Menu -->
<div id="menu" class="hidden-print hidden-xs  sidebar-white">
    <div id="sidebar-collapse-wrapper">
        <div id="brandWrapper">
            <a href="/admin/admins/index">
                <span class="text">Event Matador</span>
            </a>
        </div>
        <div id="logoWrapper">
            <div id="logo">
                <a href="/admin/admins/index" class="btn btn-sm btn-inverse"><i
                    class="fa fa-fw icon-home-fill-1"></i></a>
                <a href="email.html?lang=en" class="btn btn-sm btn-inverse pull-right"><i
                    class="fa fa-fw fa-sign-out"></i></a>
            </div>
        </div>
        <ul class="menu list-unstyled hide" id="navigation_components">
        </ul>
        <ul class="menu list-unstyled hide" id="navigation_modules">
        </ul>
        <ul class="menu list-unstyled hide" id="navigation_modules_front">
        </ul>
        <ul class="menu list-unstyled" id="navigation_current_page">
            <li class="hasSubmenu  active">
                <?php echo $this->Html->link('<span class="badge pull-right badge-primary hidden-md">2</span><i></i>
                                                                                               <span>Dashboard</span>', array('controller' => 'admins', 'action' => 'dashboard_users'), array("class" => "glyphicons home", 'escape' => false));  ?>
            </li>

            <li class="hasSubmenu ">
                <?php  echo $this->Html->link('<i class="glyphicons fa fa-cogs padding0" style="padding:0px;" ></i>Content', array('controller' => 'admins', 'action' => '#sidebar-collapse-content'), array("data-toggle" => "collapse", 'escape' => false));?>
                <ul id="sidebar-collapse-content" class="collapse ">
                    <li> <?php echo $this->Html->link('<i class="glyphicons fa fa-cogs"  style="padding:0px;"></i>Category', array('controller' => 'categories', 'action' => 'index'), array('escape' => false)); ?>
                    </li>
                </ul>
            </li>
            <li class="hasSubmenu ">
                <?php echo $this->Html->link('<i class="fa fa-briefcase"></i><span>Manage Event</span>', array('controller' => 'events', 'action' => 'index'), array('escape' => false));?>
            </li>
            <li class="hasSubmenu ">
                <?php echo $this->Html->link('<i class="fa fa-group"></i>
                           <span class="title">User</span>', array('controller' => 'admins', 'action' => 'user'), array('class' => "", 'escape' => false));?>
            </li>
            <li class="hasSubmenu ">
                <?php echo $this->Html->link('<i class="fa fa-group"></i>
                           <span class="title">User Request</span>', array('controller' => 'admins', 'action' => 'user_request_click'), array('escape' => false));?>
            </li>
            <li class="hasSubmenu ">
                <?php echo $this->Html->link('<i class="fa fa-bookmark-o"></i> <span class="title">Members View Data</span> ', array('controller' => 'site_visits', 'action' => 'index'), array('escape' => false));?>
            </li>
            <li class="hasSubmenu ">
                <?php echo $this->Html->link('<i class="fa fa-bookmark-o"></i> <span class="title">Package</span> ', array('controller' => 'admins', 'action' => '#sidebar-collapse-package'), array('data-toggle' => "collapse", 'class' => "", 'escape' => false));?>
                <ul id="sidebar-collapse-package" class="collapse ">
                    <li> <?php echo $this->Html->link(' User Package', array('controller' => 'package_users', 'action' => 'index'), array('class' => "fa fa-circle-o", 'escape' => false));?></li>
                </ul>
            </li>
            <li class="hasSubmenu ">
                <?php echo $this->Html->link('<i class="fa fa-bar-chart-o"></i>
                           <span class="title">Rating</span>', array('controller' => 'ratings', 'action' => 'index'), array('escape' => false));?>
            </li>
            <li class="hasSubmenu ">
                <?php echo $this->Html->link('<i class="fa fa-bar-chart-o"></i><span class="title">CMS</span>', array('controller' => 'admins', 'action' => 'change_contents'), array('escape' => false));?>
            </li>
            <li class="hasSubmenu ">
                <?php echo $this->Html->link('<i class="fa fa-bar-chart-o"></i><span class="title">Gift Code Generate</span>', array('controller' => 'gift_codes', 'action' => 'index'), array('escape' => false));?>
            </li>
            <li class="hasSubmenu ">
            </li>
        </ul>
    </div>
</div>
