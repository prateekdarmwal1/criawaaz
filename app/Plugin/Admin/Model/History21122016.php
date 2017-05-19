<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent' , 'Controller/Component/Auth');

class History extnds AppModel{
	var $name="History";
	var $id = "id";
	var $useTable = "history";
}