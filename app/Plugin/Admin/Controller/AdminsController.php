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
class AdminsController extends AdminAppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    var $name = "Admins";
    public $uses = array("Admin.Score", "Admin.Admin","Admin.Match","Admin.Team","Admin.History","Admin.Appdetail");
    var $layout = "admin";

    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function beforeFilter() {
        try {
            parent::beforeFilter();
            // $this->Auth->allow('login', 'register', 'password','changePassword');
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
    public function update_target(){
      try{
        $this->autoRender = false;
        // $json['error'] = true;
        if ($this->request->is("post")) {
            $this->loadModel('Admin.Inning');
            // $this->Inning->primaryKey = 'match_id';//$this->data['id'];
            $res = $this->Inning->findByMatch_id($this->data['match_id']);
            debug($res);
            if(!empty($res)){
              $this->Inning->set('id',$res["Inning"]["id"]);
            }
            else{
              $this->Inning->create();
            }
            // $this->Inning->set();
            $this->Inning->save($this->data);
        }
      }
      catch(Exception $e)
      {
        $path = $_SERVER["DOCUMENT_ROOT"]."/tmp/logs/custom_exception.log";
          $logfile = fopen($path,'a+');
          $data = "\n".date('Y-m-d H:i:s').": ".$e."\n\n";
          fwrite($logfile,$data);
          fclose($logfile);
      }
    }

    public function update_score() {
      try{
        $this->autoRender = false;
        $json["status"] = false;
        $json["error"] = false;

        $this->Score->set($this->data);
        if ($this->Score->save()) {
            $json["status"] = true;
            $json["error"] = false;
        }
        echo json_encode($json);
      }
      catch(Exception $e)
      {
        $path = $_SERVER["DOCUMENT_ROOT"]."/tmp/logs/custom_exception.log";
          $logfile = fopen($path,'a+');
          $data = "\n".date('Y-m-d H:i:s').": ".$e."\n\n";
          fwrite($logfile,$data);
          fclose($logfile);
      }
    }
    public function index($matchId=null,$inning=1) {
        // echo $matchId;
        // die;
      try{
        if (!$this->Session->check('Auth.User.Admin')) {
          $this->redirect(["controller" => "Admins", "action" => 'login']);
        }
        $this->set("title", "Score Board");
        $appdetail = $this->Appdetail->find('first');
        $result = $this->Score->find('first',["conditions"=>["Score.match_id"=>$matchId,"Score.inning"=>$inning]]);
        $list = array($result["Team1"]["id"]=>$result["Team1"]["name"],$result["Team2"]["id"]=>$result["Team2"]["name"]);
        $this->set('teamsSelect',$list);
        $this->set('match_id',$matchId);
        $this->set('inning',$inning);
        $this->get_online_users();
        $matchResult = $this->Match->findById($matchId);
        $assump = $result['Assumption'];
        // debug(current($assump));die;
        $this->set(array(
            'score' => $result,
            'lastAssump' => current($assump),
            '_serialize' => array('score','lastAssump')
        ));
        $this->set(array(
           'match' => $matchResult,
           'appdetail' => $appdetail,
            '_serialize' => array('match','appdetail')
        ));
      }
      catch(Exception $e)
      {
        $path = $_SERVER["DOCUMENT_ROOT"]."/tmp/logs/custom_exception.log";
          $logfile = fopen($path,'a+');
          $data = "\n".date('Y-m-d H:i:s').": ".$e."\n\n";
          fwrite($logfile,$data);
          fclose($logfile);
      }
    }

    public function create_assumption(){
      try{
          $this->autoRender = false;
                $json['error'] = true;
                if ($this->request->is("post")) {
                    $this->loadModel('Admin.Assumption');
                    $this->Assumption->create();
                    $save = $this->Assumption->save($this->data);
                    if ($save) {
                        $json['error'] = false;
                        return json_encode(array('saveSuccess' => true, 'match_id' => $this->Session->read('MatchSession'), 'inning' => $this->data['inning']));
                    }
                 }
        }
        catch(Exception $e)
        {
          $path = $_SERVER["DOCUMENT_ROOT"]."/tmp/logs/custom_exception.log";
          $logfile = fopen($path,'a+');
          $data = "\n".date('Y-m-d H:i:s').": ".$e."\n\n";
          fwrite($logfile,$data);
          fclose($logfile);;
        }
    }


    public function update_assumption() {
      try{
       $this->autoRender = false;
               $this->loadModel('Admin.Assumption');
               $json['error'] = true;
               if ($this->request->is("post")) {
                   $this->Assumption->set('id',$this->data['id']);
                   $save = $this->Assumption->save($this->data);
                   if ($save) {
                       $json['error'] = false;
                   }
                   echo json_encode($json);
               }
        }
        catch(Exception $e)
        {
          $path = $_SERVER["DOCUMENT_ROOT"]."/tmp/logs/custom_exception.log";
          $logfile = fopen($path,'a+');
          $data = "\n".date('Y-m-d H:i:s').": ".$e."\n\n";
          fwrite($logfile,$data);
          fclose($logfile);
        }
    }


    public function create_history()
    {
      try{
        $this->autoRender = false;
        $this->loadModel('Admin.History');
        $json['error'] = true;
        if (!$this->Session->check('Auth.User.Admin')) {
          return Router::url(["controller" => "Admins", "action" => 'login']);
        }
        if ($this->request->is("post")) {

            $this->History->create();
            $save = $this->History->save($this->data);
            if ($save) {
                $json['error'] = false;
                return json_encode(array('saveSuccess' => true, 'match_id' => $this->data['match_id'], 'inning' => $this->data['innings']));
            }
//            echo json_encode($json);
        }
      }
      catch(Exception $e)
      {
        $path = $_SERVER["DOCUMENT_ROOT"]."/tmp/logs/custom_exception.log";
          $logfile = fopen($path,'a+');
          $data = "\n".date('Y-m-d H:i:s').": ".$e."\n\n";
          fwrite($logfile,$data);
          fclose($logfile);
      }
    }
    public function update_history()
    {
      try{
        $this->autoRender = false;
        $this->loadModel('Admin.History');
        $json['error'] = true;
        if ($this->request->is("post")) {
            $this->History->set('id',$this->data['id']);
            $save = $this->History->save($this->data);
            if ($save) {
                $json['error'] = false;
            }
            echo json_encode($json);
        }
      }
      catch(Exception $e)
      {
        $path = $_SERVER["DOCUMENT_ROOT"]."/tmp/logs/custom_exception.log";
          $logfile = fopen($path,'a+');
          $data = "\n".date('Y-m-d H:i:s').": ".$e."\n\n";
          fwrite($logfile,$data);
          fclose($logfile);
      }
    }

    function delete_history(){
      try{
        $this->autoRender = false;
        $this->loadModel('Admin.History');
        $json['error'] = true;
        if ($this->request->is("post")) {
            if ($this->History->delete($this->data['id'])) {
                $json['error'] = false;
            }
            echo json_encode($json);
        }
      }
      catch(Exception $e)
      {
        $path = $_SERVER["DOCUMENT_ROOT"]."/tmp/logs/custom_exception.log";
          $logfile = fopen($path,'a+');
          $data = "\n".date('Y-m-d H:i:s').": ".$e."\n\n";
          fwrite($logfile,$data);
          fclose($logfile);;
      }
    }




    public function get_online_users(){
      try{
        $ajax = isset( $this->params['named']['ajax'] ) ? $this->params['named']['ajax'] : "";
        if($ajax){
            //$this->layout = "ajax";
        }

        $this->loadModel("Admin.User");
        $this->paginate = array(
            //'limit' => 2,
            "conditions"=>["is_login"=>"Y"],
            "order" => array("login_time"=>"DESC")
	      );
        $onlineUsers = $this->paginate("User");
        $this->set("onlineUsers",$onlineUsers);
      }
      catch(Exception $e)
      {
        $path = $_SERVER["DOCUMENT_ROOT"]."/tmp/logs/custom_exception.log";
          $logfile = fopen($path,'a+');
          $data = "\n".date('Y-m-d H:i:s').": ".$e."\n\n";
          fwrite($logfile,$data);
          fclose($logfile);
      }
    }

    public function delete_assumption(){
      try{
        $this->autoRender = false;
        $json['error'] = true;
        if ($this->request->is("post")) {
            $this->loadModel('Admin.Assumption');
            if($this->Assumption->delete($this->data['id'])){
                $json['error'] = false;
            }
        }
        echo json_encode($json);
      }
      catch(Exception $e)
      {
        $path = $_SERVER["DOCUMENT_ROOT"]."/tmp/logs/custom_exception.log";
          $logfile = fopen($path,'a+');
          $data = "\n".date('Y-m-d H:i:s').": ".$e."\n\n";
          fwrite($logfile,$data);
          fclose($logfile);
      }
    }
    public function newmatchform(){
      try{
        $this->autoRender = false;
        $flag1 = 0;
        $flag2 = 0;

        $paths = $this->saveTeamImage([$_FILES["team1_img"],$_FILES["team2_img"]]);
        $this->Match->create();
        $this->Match->set("team1_image",$paths[0]);
        $this->Match->set("team2_image",$paths[1]);
        $match = $this->Match->save($this->data);


        $this->Session->delete('MatchSession');
        $matchsession = $this->Session->write('MatchSession',$this->Match->id);
        $name =$this->Session->read('MatchSession') ;

        $team_name1 = $this->Team->find('all');
        $len = sizeof($team_name1);
        // ($i);die;
        for ($i=0; $i<$len; $i++) {

            if(mb_strtolower($team_name1[$i]['Team']['name'])==strtolower($match['Match']['team1_name']))
            {

                $team_id = $this->Team->findByName($match['Match']['team1_name']);
                $match['Match']['team1']=$team_id['Team']['id'];
                $this->Match->set('team1', $match['Match']['team1'] );
                $this->Match->save();
                $flag1=1;
                break;
            }
        }
        if($flag1==0)
        {
            // debug($match['Match']['team1_name']);die;
            $this->Team->create();
            $this->Team->set('name',$match['Match']['team1_name']);
            $this->Team->set('short_name',strtoupper(substr($match['Match']['team1_name'], 0,3)));
            $this->Team->save();

            $rs1 = $this->Team->findById($this->Team->getLastInsertId());
            $match['Match']['team1']=$rs1['Team']['id'];
            $this->Match->set('team1', $match['Match']['team1'] );
            $this->Match->save();

        }
        $team_name2 = $this->Team->find('all');
        $len1 = sizeof($team_name2);
        for ($j=0; $j<$len1; $j++) {
            if(strtolower($team_name2[$j]['Team']['name'])==strtolower($match['Match']['team2_name']))
            {
                $team_id = $this->Team->findByName($match['Match']['team2_name']);

                $match['Match']['team2']=$team_id['Team']['id'];
                //debug($match['Match']['team2']);die;
                $this->Match->set('team2', $match['Match']['team2'] );
                $this->Match->save();
                $flag2=1;
                break;
            }
        }
        if($flag2==0)
        {
            $this->Team->create();
            $this->Team->set('name',$match['Match']['team2_name']);
            $this->Team->set('short_name',strtoupper(substr($match['Match']['team2_name'], 0,3)));
            $this->Team->save();
            $rs2 = $this->Team->findById($this->Team->getLastInsertId());
            $match['Match']['team2']=$rs2['Team']['id'];
            $this->Match->set('team2', $match['Match']['team2'] );
            $this->Match->save();


        }

        $this->Score->create();
        $this->Score->set('match_id',$match['Match']['id']);
        $this->Score->set('team',$match['Match']['teams']);
        $this->Score->set('team1',$match['Match']['team1']);
        $this->Score->set('team2',$match['Match']['team2']);
        $this->Score->set('inning',"1");
        $this->Score->save();
        $this->Score->create();
        $this->Score->set('match_id',$match['Match']['id']);
        $this->Score->set('team',$match['Match']['teams']);
        $this->Score->set('team1',$match['Match']['team1']);
        $this->Score->set('team2',$match['Match']['team2']);
        $this->Score->set('inning',"2");
        $save = $this->Score->save();
        if($save){
            return json_encode(array('saveSuccess' => true, 'matchid' => $name));
        }
      }
      catch(Exception $e)
      {
        $path = $_SERVER["DOCUMENT_ROOT"]."/tmp/logs/custom_exception.log";
          $logfile = fopen($path,'a+');
          $data = "\n".date('Y-m-d H:i:s').": ".$e."\n\n";
          fwrite($logfile,$data);
          fclose($logfile);
      }
    }

    public function update_field(){
      try{
        $this->autoRender = false;
        if ($this->request->is("post")) {
            $this->loadModel('Admin.Assumption');
            $this->Assumption->id = $this->data['id'];
           // $this->Score->set('fav_team',$this->data['favTeam']);
            $arr = explode('@',$this->data['field']);
            $this->Assumption->set($arr[1],$arr[0]);
            $this->Assumption->save();
        }
      }
      catch(Exception $e)
      {
        $path = $_SERVER["DOCUMENT_ROOT"]."/tmp/logs/custom_exception.log";
          $logfile = fopen($path,'a+');
          $data = "\n".date('Y-m-d H:i:s').": ".$e."\n\n";
          fwrite($logfile,$data);
          fclose($logfile);
      }
    }


    public function password() {
      try{
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data["Admin"]["password"] = $this->data["password"];
            $this->Admin->id = 1;
            if ($this->Admin->save($this->request->data)) {
                $this->redirect(['controller' => 'admins', 'action' => 'index']);
            } else
                $this->Session->setFlash(__('Username or password is incorrect'), 'flash_error_notification', array());
        }
      }
      catch(Exception $e)
      {
        $path = $_SERVER["DOCUMENT_ROOT"]."/tmp/logs/custom_exception.log";
          $logfile = fopen($path,'a+');
          $data = "\n".date('Y-m-d H:i:s').": ".$e."\n\n";
          fwrite($logfile,$data);
          fclose($logfile);
      }
    }

    public function login() {
        try {
            $this->layout = "login";
            $this->loadModel("Admin.Admin");
            $this->loadModel("Admin.Match");
            $this->set("title", "Login");
            if ($this->Session->check('Auth.User.Admin')) {
                $json['status'] = true;
                return $this->redirect(["controller"=>"admins","action"=>"index",$this->Session->read('MatchSession'),1]);
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->request->data["Admin"]["email"] = $this->data["Admin"]["email"];
                $this->request->data["Admin"]["password"] = $this->data["password"];
                $result = $this->Admin->findByEmail($this->request->data["Admin"]["email"]);
                if (!empty($result)) {
                    $hashedPassword = $this->Auth->password($this->data['password']);
                    if ($hashedPassword == $result['Admin']['password'] && !empty($result['Admin'])) {
                        $json['msg'] = "post";
                        $this->Session->setFlash(__('Welcome, ' . $this->Auth->user('name')));
                        $user["User"] = $this->Session->read("Auth.User.User");
                        $user["Admin"] = $result["Admin"];
                        $this->Auth->login($user);
                        $json['status'] = true;
                        $match= $this->Match->find('first', array('order' => array('id' => 'DESC')));
                        $this->Session->write('MatchSession',$match['Match']['id']);
                        $this->set("matchId",$this->Session->read('MatchSession'));
                        // echo $match['Match']['id'];
                        // die;
                        return $this->redirect(["controller"=>"admins","action"=>"index",$this->Session->read('MatchSession'),1]);
                    }
                } else {
                    $this->Session->setFlash(__('Username or password is incorrect'), 'flash_error_notification', array());
                }
            } else {

            }
        }
        catch(Exception $e)
        {
          $path = $_SERVER["DOCUMENT_ROOT"]."/tmp/logs/custom_exception.log";
          $logfile = fopen($path,'a+');
          $data = "\n".date('Y-m-d H:i:s').": ".$e."\n\n";
          fwrite($logfile,$data);
          fclose($logfile);
        }
    }

    public function changePassword(){
      try{
          $this->autoRender = false;
          $this->loadModel('Admin.Admin');
          if($this->request->is('post')){
            if($this->request->data){
              $this->request->data['password'] = $this->Auth->password($this->request->data['password']);
                if ($this->Session->check('Auth.User.Admin')){

                  $result = $this->Admin->findByEmail($this->Session->read('Auth.User.Admin.email'));
                  if (!empty($result)) {
                    $this->Admin->set('id',$result['Admin']['id']);
                    $this->Admin->set('password',$this->request->data['password']);
                    $this->Admin->set('modified_time', date('Y-m-d H:i:s'));
                    if($this->Admin->save()){
                      return true;
                    }
                    else{
                      return false;
                    }
                  }
                }
            }
        }
      }
        catch(Exception $e)
        {
          $path = $_SERVER["DOCUMENT_ROOT"]."/tmp/logs/custom_exception.log";
          $logfile = fopen($path,'a+');
          $data = "\n".date('Y-m-d H:i:s').": ".$e."\n\n";
          fwrite($logfile,$data);
          fclose($logfile);
        }
    }

    public function changeAppVersion(){
      try{
          $this->autoRender = false;
          if($this->request->is('post')){
            if($this->request->data){
              $result = $this->Appdetail->find('first');
              if(empty($result))
              {
                $this->Appdetail->create();
              }
              else{
                $this->Appdetail->set('id',$result['Appdetail']['id']);
              }
              if($this->Appdetail->save($this->request->data)){
                return true;
              }
              else{
                return false;
              }

            }
        }
      }
        catch(Exception $e)
        {
          $path = $_SERVER["DOCUMENT_ROOT"]."/tmp/logs/custom_exception.log";
          $logfile = fopen($path,'a+');
          $data = "\n".date('Y-m-d H:i:s').": ".$e."\n\n";
          fwrite($logfile,$data);
          fclose($logfile);
        }
    }




    /**
     * Saves the team image to the disk.
     * @param array images.
     * return array imagePaths.
     */

    private function saveTeamImage($images = []){
      $imagePaths = [];
      $destination = $_SERVER["DOCUMENT_ROOT"]."/app/webroot/img/teams";
      if(!is_dir($destination)){
        mkdir($destination);
      }
      // debug($destination);
      foreach ($images as $image) {
        # code...
        if($image){
          if(move_uploaded_file($image["tmp_name"], $destination."/".$image["name"])){
            $imagePaths[] = "http://".$_SERVER["HTTP_HOST"]."/img/teams/".$image["name"];
          }
        }
      }
      return $imagePaths;

    }

}
