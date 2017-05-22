<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent' , 'Controller/Component/Auth');

class Matchschedule extends AppModel{
	var $name="Matchschedule";
	var $id = "id";
	var $useTable = "matchschedules";
}