<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public function beforeFilter(){
		parent::beforeFilter();
		// $Match = 1;
		//$this->Session->write('Match',3);
		// $match = $this->Session->write('MatchSession',1);

	}
    public $components = array('RequestHandler', 'Paginator');
    public $helpers = array('Js' => array('Jquery'), 'Paginator');
    public $innings = array(1=>"1st Inning",2=>"2nd Inning");
    public $score = array(1=>"1",2=>"2",3=>"3",4=>"4",5=>"5",6=>"6",7=>"7",8=>"8",9=>"9");
    
}
