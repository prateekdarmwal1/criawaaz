<?php

App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component/Auth');

class Score extends AppModel {

    var $name = "Score";
    var $id = 'id';
    var $useTable = "scoreboard";
    
    public $hasOne = array(
        'Balldetail' => array(
            'className' => 'Balldetail',
            'foreignKey' => "scoreboard_id"
        )
    );

    var $belongsTo = array(
        "Team1" => array(
        "className" => "Team",
            "foreignKey" => "team1",
        ),
        "Team2" => array(
            "className" => "Team",
            "foreignKey" => "team2",
        )
    );
    var $hasMany = array(
        'Assumption' => array(
            'className' => 'Assumption',
            'foreignKey' => "scoreboard_id",
            "order" => "overs DESC"
        ),
        'Inning' => array(
            'className' => 'Inning',
            'foreignKey' => "match_id", 
        )
    );

}
