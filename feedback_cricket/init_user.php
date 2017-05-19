<?php
$db_name ="u691031507_cricz";
$mysql_user="u691031507_crick";
$mysql_pass ="CTGDMvu2MXEz";
$server_name = "mysql.hostinger.in";

$con = mysqli_connect($server_name , $mysql_user ,$mysql_pass,$db_name);

if(!$con){
echo "Connection error...".mysqli_connect_error();

}
else
{
//echo"Database connection Sucess";
}


?>