<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component/Auth');
class User extends AppModel
{
	var $name = "User";
	var $useTable = "users";
        var $primaryKey = "id";
        public function beforeFind($queryData){
		//$queryData['conditions'][]['NOT'][$this->alias . '.is_online'] = 'Y';
		return $queryData;
	}

	public function beforeSave($options = array()) {
		// hash our password
		if (isset($this->data["User"]['password']) && trim($this->data["User"]['password'])!='') {
			//$this->data["User"]['password'] = AuthComponent::password($this->data["User"]['password']);
//			$passwordHasher = new BlowfishPasswordHasher();
//			$this->data[$this->alias]['password'] = $passwordHasher->hash(
//					$this->data[$this->alias]['password']
//			);
		}
		return parent::beforeSave($options);
	}
        
        public function getUserByOnlineStatus($status='Y'){
            try{
                return $this->find('all',["conditions"=>["is_login"=>$status]]);
            }catch(Exception $e){
                debug($e);
            }
        }
}
