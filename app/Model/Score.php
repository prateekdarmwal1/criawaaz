<?php

App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component/Auth');

class Score extends AppModel {

    var $name = "Score";
    var $id = 'id';
    var $useTable = "scoreboard";
    var $recursive = 2;
    var $hasMany = array(
        'Assumption' => array(
            'className' => 'Assumption',
            'foreignKey' => "scoreboard_id",
            "order" => "overs DESC"
        ),
        'Inning' => array(
            'className' => 'Inning',
            'foreignKey' => "match_id",
            
        )
    );
    var $belongsTo = array(
        "Team1" => array(
            "className" => "Team",
            "foreignKey" => "team1",
            "condition" => ['Match.team1' => 'Team.id']
        ),
        "Team2" => array(
            "className" => "Team",
            "foreignKey" => "team2",
            "condition" => ['Match.team2' => 'Team.id']
        )
    );
    public function getMatch($id){
        return $this->find("all",["condition"=>["match_id"=>$id]]);
    }
//	public function beforeSave($options = array()) {
//		// hash our password
//		if (isset($this->data["User"]['password']) && trim($this->data["User"]['password'])!='') {
//			$this->data["User"]['password'] = AuthComponent::password($this->data["User"]['password']);
////			$passwordHasher = new BlowfishPasswordHasher();
////			$this->data[$this->alias]['password'] = $passwordHasher->hash(
////					$this->data[$this->alias]['password']
////			);
//		}
//		return parent::beforeSave($options);
//	}
}
