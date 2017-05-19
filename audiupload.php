<?php
//header('Content-Type: application/json');
$target_path = "live/";
 
$actual_link = "http://$_SERVER[HTTP_HOST]/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
 //echo json_encode(array('url'=>$actual_link.$target_path ));


if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
{
  // echo json_encode(array('url'=>$actual_link.$target_path ));
 echo basename( $_FILES['uploadedfile']['name']);


} 

else
{
   // echo "There was an error uploading the file, please try again!";
   // echo "filename: " .  basename( $_FILES['uploadedfile']['name']);
   // echo "target_path: " .$target_path;

}



?>