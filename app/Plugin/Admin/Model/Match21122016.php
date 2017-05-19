<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent' , 'Controller/Component/Auth');

class Match extends AppModel{

	var $name = "Match";
	var $id = 'id';
	var $useTable = "matches";

	var $hasMany = array(
        'Score' => array(
            'className' => 'Score',
            'foreignKey' => "match_id",
            "order" => "overs DESC"
        )
    );

}