<body class="loginWrapper">
<!-- Main Container Fluid -->
<div class="container-fluid menu-hidden">
    <!-- Content -->
    <div id="content">
        <!-- // END navbar -->
        <div class="container">
            <!-- row-app -->
            <div class="row row-app">
                <!-- col -->
                <!-- col-separator.box -->
                <div class="col-separator col-unscrollable box">
                    <!-- col-table -->
                    <div class="col-table">
                        <h4 class="innerAll margin-none border-bottom text-center"><i class="fa fa-lock"></i> Login to
                            your Account</h4>
                        <!-- col-table-row -->
                        <div class="col-table-row">
                            <!-- col-app -->
                            <div class="col-app col-unscrollable">
                                <!-- col-app -->
                                <div class="col-app">
                                    <div class="login">
                                        <div class="panel panel-default col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-4"
                                            >
                                            <div class="panel-body">
                                                <?php
                                                $url = array('controller' => 'admins', 'action' => 'index', 'plugin' => 'admin');
                                                echo $this->Form->create('Manager', array('url' => $url));
                                                ?>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail">Email address</label>
                                                    <?php echo $this->Form->input('user_email', array("required" => True, "type" => "email", "class" => "form-control", "id" => "exampleInputEmail1", 'label' => false,
                                                    "placeholder" => "Enter email"));?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <?php echo $this->Form->input('user_password', array("required" => True, "type" => "password", "class" => "form-control", "id" => "exampleInputEmail1", 'label' => false,
                                                    "placeholder" => "Enter Password", "id" => "exampleInputPassword1"));?>
                                                </div>
                                                <?php echo $this->Form->hidden('pass', array("type" => 'text', "class" => "form-control"));?>
                                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                                                <div class="checkbox">
                                                    <label>
                                                        <?php echo $this->Form->input('', array("type" => "checkbox"));?>
                                                        remember my details
                                                    </label>
                                                </div>
                                                <?php echo $this->Form->end('Admins');  ?>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <!-- // END col-app -->
                            </div>
                            <!-- // END col-app.col-unscrollable -->
                        </div>
                        <!-- // END col-table-row -->
                    </div>
                    <!-- // END col-table -->
                </div>
                <!-- // END col-separator.box -->
            </div>
            <!-- // END row-app -->
            <!-- Global -->
