<?php
/**
 * This is  parent controller in a relation chain.
 * Created by IntelliJ IDEA.
 * User: USER
 * Date: 3/28/14
 * Time: 12:02 PM
 * To change this template use File | Settings | File Templates.
 */
App::uses('Controller', 'Controller');
App::uses('AppController', 'Controller');

class AdminAppController extends AppController
{

	/**
	 * $helpers is a declaration of helper used in this controller
	 *
	 */

	public $helpers = array('Session');

	public $components = array(
		'Session','Constant','RequestHandler',"Auth"
	);

	public function beforeFilter(){
                parent::beforeFilter();

                	                $this->set('InningSelect',$this->innings);
                	                $this->set('ScoreUnit',$this->score);
		$this->loadModel('Admin.Admin');
		$this->loadModel('Admin.Match');
		$match = $this->Match->find('first', array('order' => array('id' => 'DESC')));
		$matchId = $match['Match']['id'];
		//AuthComponent::$sessionKey = 'Auth.Admin';
		$this->Auth->loginAction = array( 'controller' => 'Admins', 'action' => 'login','plugin' => 'admin');
		$this->Auth->loginRedirect = array( 'controller' => 'Admins', 'action' => 'index',$matchId,1,'plugin' => 'admin');
		$this->Auth->logoutRedirect = array( 'controller' => 'Admins', 'action' => 'login','plugin' => 'admin');
		$this->Auth->authenticate = array( 'Form' => array('plugin' => 'Admin','userModel' => 'Admin', 'fields' => array( 'username' => 'email', 'password' => 'password')));
		$this->Auth->allow("*");
		$this->set("logged_in",$this->Session->read("Auth.User"));
		// $this->checkLogin();
	}
	public function checkLogin(){
		if($this->request->params['action']!="login"){
			$user = $this->Session->check("Auth.User");
			if(empty($user)){
				return $this->redirect(["controller"=>"Admins","action"=>"login"]);
			}
		}
	}
	public function isAuthorized($user) {
		// Here is where we should verify the role and give access based on role

		return true;
	}
	public function changeImageName ($image){
		$imageName = str_replace(' ','_',$image);
		return $imageName;
	}
	public function deleteDir($dirname){
		if(file_exists($dirname)) {
			array_map('unlink', glob("$dirname/*.*"));
			rmdir($dirname);
		}
	}
	public function logout() {
        // $this->Session->delete('MatchSession');
        $this->Session->destroy();
        $this->redirect(["controller" => "Admins", "action" => "login"]);
    }
}
