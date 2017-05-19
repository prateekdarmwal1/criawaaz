<?php

App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component/Auth');

class Appdetail extends AppModel {

    var $name = "Appdetail";
    var $id = 'id';
    var $useTable = "appdetails";
}