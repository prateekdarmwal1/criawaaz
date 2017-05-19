<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component/Auth');
class Inning extends AppModel
{
	var $name = "Inning";
	//public $uses = array('Company',"User","Loyalty",'LoyaltyUser');
	var $useTable = "innings";

}
