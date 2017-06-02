<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component/Auth');
class Balldetail extends AppModel
{
	var $name = "Balldetail";
	var $useTable = "balldetails";

	var $belongsTo = array(
		"Score" => array(
				'className' => 'Score',
				'foreignKey' => 'scoreboard_id',
			)
	);
}
