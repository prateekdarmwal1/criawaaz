<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component/Auth');
App::uses('Security', 'Utility');

class User extends AppModel
{
	var $name = "User";

	var $useTable = "users";

	var $key = "wt1U5MACWJFTXGenFoZoiLwQGrLgdbHA";

	public function encryptPass($options = array()) {
    		if (isset($options['User']['password']) && trim($options['User']['password'])) {
					$options['User']['password'] = Security::hash($options['User']['password'],'sha1',$this->key);
    		}
    		return $options;
    	}
			public function decryptPass($pass = null) {
		    		// hash our password
		    		if (isset($pass) && trim($pass)) {
							$pass = Security::hash($pass,'sha1',$this->key);
		    		}
                                //echo $pass;die;
		    		return $pass;
		    	}
}