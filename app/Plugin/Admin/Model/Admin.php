<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component/Auth');
class Admin extends AppModel
{
	var $name = "Admin";
	//public $uses = array('Company',"User","Loyalty",'LoyaltyUser');
	var $useTable = "admins";


// 	public function beforeSave($options = array()) {
// 		// hash our password
// 		if (isset($this->data[$this->alias]['password']) && trim($this->data[$this->alias]['password'])!='') {
// 			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
// //			$passwordHasher = new BlowfishPasswordHasher();
// //			$this->data[$this->alias]['password'] = $passwordHasher->hash(
// //					$this->data[$this->alias]['password']
// //			);
// 		}
// 		return parent::beforeSave($options);
// 	}
}
