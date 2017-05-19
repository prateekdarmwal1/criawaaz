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

class RecordingController extends AppController
{

  public function update(){
    $this->autoRender = false;
    //print_r($_REQUEST['path']);die;
    file_put_contents($_SERVER['DOCUMENT_ROOT']."/app/webroot/live.txt",$_REQUEST['path']);

  }

  public function serverdelete(){
    $this->autoRender = false;
    // integer starts at 0 before counting
  // $i = 0;
   $dir = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/live';
  // if ($handle = opendir($dir)) {
   //    while (($file = readdir($handle)) !== false){
    //       if (!in_array($file, array('.', '..')) && !is_dir($dir.$file))
    //           $i++;
    //   }
  // }
   // prints out how many were in the directory
  // echo "There were $i files";


   if(file_exists($dir)){
     array_map("unlink",glob("$dir/*.*"));
   }


   echo "Successfully deleted !";

  }

  public function audioupload(){
    $this->autoRender = false;
    $target_path = $_SERVER['DOCUMENT_ROOT']."/app/webroot/live/";

    $actual_link = "http://".$_SERVER['HTTP_HOST']."/";

    $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
    //print_r($_FILES);die;

    if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
    {
      // echo json_encode(array('url'=>$actual_link.$target_path ));
     //file_put_contents($_SERVER['DOCUMENT_ROOT']."/app/webroot/live.txt",$actual_link.basename( $_FILES['uploadedfile']['name']));
     echo basename( $_FILES['uploadedfile']['name']);


    }


  }


}