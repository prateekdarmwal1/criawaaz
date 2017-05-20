<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component/Auth');
class Team extends AppModel
{
	var $name = "Team";
	var $useTable = "teams";
}
