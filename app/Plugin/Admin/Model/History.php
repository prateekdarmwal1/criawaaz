<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent' , 'Controller/Component/Auth');

class History extends AppModel{
	var $name="History";
	var $id = "id";
	var $useTable = "history";
	var $belongsTo = array(
		'Match' => array(
			'className' => 'Match',
			'foreignKey' => "match_id",
			"order" => "overs DESC"
		)
	);
}