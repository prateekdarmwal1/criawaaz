<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AdminAppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class HomeContentsController extends AdminAppController {

	/**
	 * This controller does not use a model
	 *
	 * @var array
	 */
	public $uses = array("Admin.HomeContent");
	var $layout = "admin";
	public $name = "HomeContents";
	/**
	 * Displays a view
	 *
	 * @param mixed What page to display
	 * @return void
	 * @throws NotFoundException When the view file could not be found
	 *	or MissingViewException in debug mode.
	 */
	public function beforeFilter()
	{
		try {
			parent::beforeFilter();
		}
		catch(Exception $exception){
			echo $exception->getMessage();
		}
	}
	function index(){
		//$this->layout = false;
		$this->set("title","List");
		$this->items_list();
	}
	public function items_list(){
		$this->set("title","List");
		$ajax = isset( $this->params['named']['ajax'] ) ? $this->params['named']['ajax'] : "";
		$sort = isset($this->params['named']['sortby']) ? $this->params['named']['sortby'] : 'HomeContent.id';
		if(is_array($sort))
			$sort = $sort[0];
		$type = isset($this->params['named']['sorttype']) ? $this->params['named']['sorttype'] : 'desc';
		$this->set('listingBy',array('id'=>$sort,'order'=>'asc'));
		$sortType = $sort;
		switch( $type ){
			case "asc":
				$sortAcc = 'DESC';
				$this->set('listingBy',array('id'=>$sort,'order'=>'desc'));
				break;
			case "desc":
				$sortAcc = 'ASC';
				$this->set('listingBy',array('id'=>$sort,'order'=>'asc'));
				break;
			default:
				$sortAcc = 'ASC';
				$this->set('listingBy',array('id'=>$sort,'order'=>''));
		}
		//$limit = ($this->Session->read('limit') ) ? $this->Session->read('limit') : 1;
		$this->paginate = array(
			'limit' => 10,
			"order" => array($sortType => $sortAcc)
		);
		//debug($this->paginate);
		$results = $this->paginate('HomeContent');
		$this->set(array(
			'lists' => $results,
			'_serialize' => array('lists')
		));
		if ( $ajax ){
			$this->layout="ajax";
			$this->render('ajax_list');
		}
	}
	function edit($id=null){
		$this->set("title","Edit Record");
		$this->layout=null;
		$this->request->data = $this->HomeContent->read(null, $id);

	}
	function delete(){
		if($this->request->is('post') ||$this->request->is('put')){
			$this->autoRender = false;
			$this->HomeContent->deleteAll(["HomeContent.id"=>explode(',',$this->data["ids"])]);
		}
	}
	function add(){

		if($this->request->is('post') ||$this->request->is('put')){
			$this->autoRender = false;
			$json['status']=false;
			if($this->HomeContent->save($this->request->data)){
				$json['status']=true;
				$json['msg']="Saved";
			}
			echo json_encode($json);
		}
	}
	function change_status(){
		if($this->request->is('post') ||$this->request->is('put')){
			$this->autoRender = false;
			$this->HomeContent->id=$this->data["id"];
			$json['status']=false;
			if($this->HomeContent->save(["is_active"=>$this->data["status"]])){
				$json['status']=true;
				$json['msg']="Status Successfully Changed";
			}
			echo json_encode($json);
		}
	}

}
