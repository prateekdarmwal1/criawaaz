<?php
/**
 * This is  parent controller in a relation chain.
 * Created by IntelliJ IDEA.
 * User: USER
 * Date: 3/28/14
 * Time: 12:02 PM
 * To change this template use File | Settings | File Templates.
 */
App::uses('Controller', 'Controller');
App::uses('AppController', 'Controller');

class UserAppController extends AppController
{
	function beforeFilter(){
		parent::beforeFilter();
	}
}

