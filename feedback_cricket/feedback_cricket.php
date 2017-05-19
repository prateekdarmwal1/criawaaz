<?php
require "init_user.php";

if($_SERVER['REQUEST_METHOD']=='POST')
{
 $name =$_POST["name"];
$email =$_POST["email"];
$feedback =$_POST["feedback"];

 
$sql ="insert into feedback(name,email,feedback) values ('$name','$email','$feedback');";
 
 
 if(mysqli_query($con,$sql))
{
 echo "Thanks for submitting feedback...";
 }else
{
 echo " oops !! server error ";
 
 }
 }
else
{
echo 'error';
}



?>