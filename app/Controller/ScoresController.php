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

App::uses('UserAppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class ScoresController  extends UserAppController {

	var $layout = "home";
	public $uses = array('Score');
        public function beforeFilter() {
            parent::beforeFilter();
        }

        public function get_appdetails(){
            try{

                $this->set('title',"App Details");
                $this->loadModel("Appdetail");
                $app = $this->Appdetail->find('first',['fields' => ['appversion']]);
                $this->set(array(
                    'appversion' => !empty($app) ? $app['Appdetail']['appversion'] : "",
                    '_serialize' => array('appversion'),
                ));

            }
            catch(Exception $e){
                if(Configure::read('debug')){
                    throw $e;
                }
            }
        }

        public function get_history($match_id=null){
            try {
                $this->set("title","History");
                $this->loadModel("History");
                $result = $this->History->find('all', ["conditions" => ["match_id" => $match_id ]]);
                //debug($result);die;
                $this->set(array(
                    'response' => $result,
                    '_serialize' => array('response')
                ));
            }
            catch (MissingViewException $e) {
                if (Configure::read('debug')) {
                    throw $e;
                }
            }
        }

        public function get_match(){
            try {
                    $this->set("title","Home");
                    $this->loadModel("Match");
                    $result = $this->Match->find('first', array('order' => array('id' => 'DESC')));
                                    //debug($result);die;
                    $this->set(array(
                        'response' => $result,
                        '_serialize' => array('response')
                    ));
                }
            catch (MissingViewException $e) {
                if (Configure::read('debug')) {
                    throw $e;
                }
            }
        }

        public function get_score($id=1) {
             //debug($id);
             //die;
            try {
                //$this->loadModel("Match");
                //$result = $this->Match->findById(1);
                //debug($result);die;
                $this->set("title","Home");
		        $result = $this->Score->find('all',["conditions"=>["match_id"=>$id]]);
                //  debug($result);die;
            //die;
                $data = array();
                //debug($result);die;
                //$data["Inning"]=count($result);
                    for($i=0;$i<count($result);$i++){

                        $data["Inning".$result[$i]["Score"]["inning"]]['innings_over'] = ($result[$i]["Score"]["innings_over"]) ? 'true' : 'false';
                        $data["Inning".$result[$i]["Score"]["inning"]]['team'] = $result[$i]["Score"]["team"];
                        $data["Inning".$result[$i]["Score"]["inning"]]['playing_team'] = $result[$i]["Score"]["playing_team"];
                        $data["Inning".$result[$i]["Score"]["inning"]]['runs'] = $result[$i]["Score"]["runs"];
                        $data["Inning".$result[$i]["Score"]["inning"]]['winner_team'] = $result[$i]["Score"]["winner_team"];
                        $data["Inning".$result[$i]["Score"]["inning"]]['overs'] = $result[$i]["Score"]["overs"];
                        $data["Inning".$result[$i]["Score"]["inning"]]['wickets'] = $result[$i]["Score"]["wickets"];
                        $data["Inning".$result[$i]["Score"]["inning"]]['team1_name'] = $result[$i]["Team1"]["name"];
                        $data["Inning".$result[$i]["Score"]["inning"]]['team1_short_name'] = $result[$i]["Team1"]["short_name"];
                        $data["Inning".$result[$i]["Score"]["inning"]]['team2_name'] = $result[$i]["Team2"]["name"];
                        $data["Inning".$result[$i]["Score"]["inning"]]['team2_short_name'] = $result[$i]["Team2"]["short_name"];
                        $data["Inning".$result[$i]["Score"]["inning"]]['match_detail'] = $result[$i]["Score"]["match_detail"];
                        $data["Inning".$result[$i]["Score"]["inning"]]['ball_status'] = $result[$i]["Score"]["ball_status"];
                        $data["Inning".$result[$i]["Score"]["inning"]]['session_detail'] = $result[$i]["Score"]["session_detail"];
                        $data["Inning".$result[$i]["Score"]["inning"]]['Assumption'] = !empty($result[$i]["Assumption"]) ? [$result[$i]["Assumption"][0]] : [];
                        $data["Inning".$result[$i]["Score"]["inning"]]['Summery'] = $result[$i]["Inning"];

                    }


                        $this->set(array(
                            'Score' => $data,
                            '_serialize' => array('Score')
            ));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
        public function get_assumptions($id=1) {

            try {
                $this->set("title","Home");
                $this->loadModel("Assumption");
		$result = $this->Assumption->find('all',['conditions'=>["match_id"=>$id]]);
                        //debug($result);die;
                        $this->set(array(
                            'response' => $result,
                            '_serialize' => array('response')
            ));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

}
