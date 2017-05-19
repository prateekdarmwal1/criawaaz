<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AdminAppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class UsersController extends AdminAppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    var $name = "Users";
    public $uses = array("Admin.User");
    var $layout = "admin";
    public $components = array('RequestHandler', 'Paginator');
    public $helpers = array('Js' => array('Jquery'), 'Paginator');

    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function beforeFilter() {
        try {
            parent::beforeFilter();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
    public function ajax_users(){
        $this->paginate = array(
            'limit' => 2,
            "conditions"=>["is_login"=>"Y"],
            "order" => array("login_time"=>"DESC")
	);
        debug($this->paginate);die;
        //$this->layout = "";
        //$this->loadModel("Admin.User");
        //$this->Components->load(["Paginator"]);
        
        $onlineUsers = $this->paginate();
        $this->set("onlineUsers",$onlineUsers);
    }
    public function get_online_users(){
        $ajax = isset( $this->params['named']['ajax'] ) ? $this->params['named']['ajax'] : "";
        if($ajax){
            //$this->layout = "ajax";
        }
        $this->layout = "";
        $this->loadModel("Admin.User");
        $this->paginate = array(
            'limit' => 2,
            "conditions"=>["is_login"=>"Y"],
            "order" => array("login_time"=>"DESC")
	);
        $onlineUsers = $this->paginate("User");
        $this->set("onlineUsers",$onlineUsers);
    }


}
