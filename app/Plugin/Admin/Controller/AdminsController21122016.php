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
    public $uses = array("Admin.Score", "Admin.Admin","Admin.Match","Admin.Team");
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
            $this->Auth->allow('login', 'register', 'password');
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
    public function update_target(){
        $this->autoRender = false;
        $json['error'] = true;
        if ($this->request->is("post")) {
            $this->loadModel('Admin.Inning');
            $this->Inning->primaryKey = 'match_id';//$this->data['id'];
            
            $this->Inning->set($this->data);
            $this->Inning->save();
        }
    }
    
    public function update_score() {
        $this->autoRender = false;
        $json["status"] = false;
        $this->Score->set($this->data);
        if ($this->Score->save()) {
            $json["status"] = true;
        }
        echo json_encode($json);
    }
    public function index($matchId=null,$inning=1) {
        // echo $matchId;
        // die;
        $this->set("title", "Score Board");
        $result = $this->Score->find('first',["conditions"=>["Score.match_id"=>$matchId,"Score.inning"=>$inning]]);
        $list = array($result["Team1"]["id"]=>$result["Team1"]["name"],$result["Team2"]["id"]=>$result["Team2"]["name"]);
        $this->set('teamsSelect',$list);
        $this->set('match_id',$matchId);
        $this->set('inning',$inning);
        $this->get_online_users();
        // debug($result);die;
        $this->set(array(
            'score' => $result,
            '_serialize' => array('score')
        ));
    }
    public function update_assumption() {
        $this->autoRender = false;
        $json['error'] = true;
        if ($this->request->is("post")) {
            $this->loadModel('Admin.Assumption');
            $this->Score->id = $match_id = $this->data['id'];
            $this->Score->set('winner_team',$this->data['winTeam']);
            $this->Score->save();
            foreach ($this->data as $data) {
                if (!is_array($data))
                    continue;
                $this->Assumption->create();
                $this->Assumption->set('overs',$data['overs']);
                $this->Assumption->set('scoreboard_id',$match_id);
                $this->Assumption->set('inning',$data['inning']);
                $this->Assumption->set('score1',$data['score1']);
                $this->Assumption->set('score2',$data['score2']);
                $this->Assumption->set('session',$data['session']);
                $this->Assumption->set('favorite',$data['favorite']);
                $this->Assumption->set('odd1',$data['odd1']);
                $this->Assumption->set('odd2',$data['odd2']);
                $rs = $this->Assumption->find('first',['conditions'=>["overs"=>$data['overs'],'inning'=>$data['inning']]]);
                if(!empty($rs)){
                    $this->Assumption->id = $rs['Assumption']['id'];
                }
                if($this->Assumption->save()){
                    $json['error'] = true;
                }
            }
        }
        echo json_encode($json);
    }
    public function get_online_users(){
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
    public function delete_assumption(){
        $this->autoRender = false;
        $json['error'] = false;
        if ($this->request->is("post")) {
            $this->loadModel('Admin.Assumption');
            if($this->Assumption->delete($this->data['id'])){
                $json['error'] = true;
            }
        }
        echo json_encode($json);
    }
    public function newmatchform(){
        $this->autoRender = false;
        $flag1 = 0;
        $flag2 = 0;
        $this->Match->create();
        $match = $this->Match->save($this->data);
        
        $this->Session->delete('MatchSession');
        $matchsession = $this->Session->write('MatchSession',$this->Match->id);
        // $session = $this->request->session();
        $name =$this->Session->read('MatchSession') ;
        // debug($name);die;
        // debu

        //die;

        $team_name1 = $this->Team->find('all');
        $len = sizeof($team_name1);
        // ($i);die;
        for ($i=0; $i<$len; $i++) {
            // debug($team_name[$i]['Team']['name']);die;
            if(mb_strtolower($team_name1[$i]['Team']['name'])==strtolower($match['Match']['team1_name']))
            {
                
                $team_id = $this->Team->findByName($match['Match']['team1_name']);
                // debug($team_id['Team']['id']);die;
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

    public function update_field(){
        $this->autoRender = false;
        $json['error'] = true;
        if ($this->request->is("post")) {
            $this->loadModel('Admin.Assumption');
            $this->Assumption->id = $this->data['id'];
           // $this->Score->set('fav_team',$this->data['favTeam']);
            $arr = explode('@',$this->data['field']);
            $this->Assumption->set($arr[1],$arr[0]);
            $this->Assumption->save();
        }
    }
    

    public function password() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data["Admin"]["password"] = $this->data["password"];
            $this->Admin->id = 1;
            if ($this->Admin->save($this->request->data)) {
                $this->redirect(['controller' => 'admins', 'action' => 'index']);
            } else
                $this->Session->setFlash(__('Username or password is incorrect'), 'flash_error_notification', array());
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
                $this->redirect(array('action' => 'index'));
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
        } catch (Exception $e) {
            debug($e);
        }
    }

    


}