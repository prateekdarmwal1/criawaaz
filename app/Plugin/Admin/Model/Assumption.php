<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component/Auth');
class Assumption extends AppModel
{
	var $name = "Assumption";
	//public $uses = array('Company',"User","Loyalty",'LoyaltyUser');
	var $useTable = "assumptions";

}
