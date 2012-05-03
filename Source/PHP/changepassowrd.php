<?php
include_once("config.php");
$arrResponse = array();
$email=$_REQUEST['email'];
$passowrd=$_REQUEST['password'];
$npassowrd=$_REQUEST['npassword'];
$result = mysql_query("UPDATE registration SET password='".$npassowrd."' WHERE email ='".$_GET['email']."' AND password='".$passowrd."'"); 
if(mysql_num_rows($result)>0){
$arrResponse['result'] = 'success';
}else
{
$arrResponse['result'] = 'failed';		
}
echo  json_encode($arrResponse);exit;  

?>