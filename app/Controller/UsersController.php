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
App::uses('AuthComponent', 'Controller/Component/Auth');
class UsersController extends AppController
{
	function beforeFilter(){
		try {
			parent::beforeFilter();
//			$this->Auth->allow('login', 'register');
		} catch (Exception $exception) {
			echo $exception->getMessage();
		}
	}
	public function login(){

		try {
			$this->autoRender = false;
			$successful = "Logged In";
			$emailFailure = "Username is Invalid";
			$passFailure = "Password is Invalid";
			$this->layout = "home";
			$this->loadModel("User");
			$this->set("title", "User Login");
			if ($this->request->is('post') || $this->request->is('put')) {
				$result = $this->User->findByEmail($_POST["email"]);
                                //print_r($result);die;
				if (!empty($result)) {
					//echo "db: ".$_POST['password'];die;
                                        $hashedPassword = $this->User->decryptPass($_POST['password']);
                                        
                                        if ($hashedPassword == $result['User']['password'] ) {
						$this->User->set('id',$result['User']['id']);
						$this->User->set('is_login','Y');
						$this->User->set('login_time',date('y-m-d H:i:s'));
						if($this->User->save()){
							echo $successful;
						}
					}
					else {
						echo $emailFailure;
					}
				} else {
					echo $passFailure;
				}
			}
		else{
			echo "Error!";
		}
	} catch (Exception $e) {
			debug($e);
		}
	}
	public function register()
	{
		
                   try {
			$this->autoRender = false;
			$this->loadModel("User");
			if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data["User"]["email"] = $_POST["email"];
			$this->request->data["User"]["password"] = $_POST["password"];
                        $this->set("title", "User Register");
//				
				$result = $this->User->findByEmail($this->request->data["User"]["email"]);
				
				if (empty($result)) {
					$this->User->create();
					$this->User->set('is_login','N');
                                        $this->User->set('ip',$_POST["ip"]);
                                        $this->User->set('address',$_POST["address"]);
                                        $this->User->set('name',$_POST["name"]);
                                        $this->User->set('mob',$_POST["mob"]);
                                        $this->User->set('device_key',$_POST["device_key"]);
					$this->User->set('login_time',"0000-00-00 00:00:00");
					$this->User->set('last_logout_time',"0000-00-00 00:00:00");
					// debug($this->request->data);die;
					$this->request->data = $this->User->encryptPass($this->request->data);
					//debug($this->request->data);die;
					if($this->User->save($this->request->data)){
						echo "Successfully Registered";
					}
					else
					{
						echo "Registration Failed!";
					}
				}
				else{
					echo "Email is already registered";
				}
			}
			else{
				echo "not post";
				// $this->render("register");
			}
		} catch (Exception $e) {
			echo "exception";
			debug($e);
		}
	}

	public function device_key_info(){
		$this->loadModel("User");
		$this->autoRender = false;
		$email =$_POST["email"];
		$password =$this->User->decryptPass($_POST["password"]);

		$result = $this->User->findByEmail($email);

		if(!empty($result)){
                   if ($password == $result['User']['password'] ) {
		// Do something if valid user show status of the user
		$status = $result['User']['device_key'];
                }
		}

		echo $status;
	}

	public function direct_listen(){
		if($this->request->is('post'))
                {
                //debug($this->request->data);die;
                $this->loadModel("User");
		$this->autoRender = false;
		//$email = $this->request->data["User"]["email"];
                $email = $_POST["email"];
                $status = "";
                $activity = $_POST['activity'];
		$password = $this->User->decryptPass($_POST['password']);
		$device_key = $_POST["device_key"];
               //$password = $this->User->decryptPass($this->request->data["User"]['password']);

		$result = $this->User->findByEmail($email);
                //debug($result);die;
		if(!empty($result)){
                   if ($password == $result['User']['password'] ) {
		    // Do something if valid user show status of the user
		       $status = $result['User']['is_login'];
                   }
                   else{
                    echo "invalid";die;
                   }
                }
                else{
                 echo "invalid";die;
                }
                if($status=="N"){
                  $this->loginUser($email,$password,$device_key);     
                  echo "N";die;
                }
                elseif($status=="Y"){
                 if($device_key == $result["User"]["device_key"]){
                   $this->loginUser($email,$password,$device_key);
                   if($activity=="login"){
                    echo "N";die;
                   }
                   elseif($activity=="server"){
                    echo "Y";die;
                   }
                 }
                 else{
                  if($activity=="login"){
                    echo "Y";die;
                   }
                   elseif($activity=="server"){
                    echo "N";die;
                   }
                 }
                }
                else{
		 echo $status."3";die;
               } 
             }
             else{
               $this->render("login"); 
            }
	}

	public function logout(){
		$this->loadModel("User");
		$this->autoRender = false;
		$email = $_POST["email"];
                //$hashedPassword = $this->User->decryptPass($_POST['password']);
		$device_key = $_POST["device_key"];
                //echo $device_key;die;
		$result = $this->User->findByEmail($email);
                //debug($result);die;
		if(!empty($result)){
			$this->User->set('id',$result['User']['id']);
			$this->User->set('device_key',$device_key);
			$this->User->set('is_login','N');
			$this->User->set('last_logout_time',date('y-m-d H:i:s'));
			if($this->User->save())
			{
				echo "Logout Successfully";
			}
			else
			{
				echo "Could not logout";
			}
      }

	}

     public function loginUser($email,$password,$device_key){
       
       $this->loadModel("User");
       //echo $device_key;die;
       $result = $this->User->findByEmail($email);
       if (!empty($result)) {            
        if ($password == $result['User']['password'] ) {
	  $this->User->set('id',$result['User']['id']);
	  //echo "method";
          $this->User->set('is_login','Y');
          $this->User->set('device_key',$device_key);
	  $this->User->set('login_time',date('y-m-d H:i:s'));
          if($this->User->save()){       
           //echo "changed status";die;                                            
          }
       }
     }
   }
}