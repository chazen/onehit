<?php
session_start(); 
include_once("config.php");
$arrResponse = array();
session_start();

if(isset($_REQUEST['email']))
{
$email=$_REQUEST['email'];
$result = mysql_query("UPDATE registration SET token='' WHERE email ='".$_GET['email']."'"); 
$arrResponse['result'] = 'success';
}else
{
$arrResponse['result'] = 'failed';		
}
echo  json_encode($arrResponse);exit;  



//if (trim($_REQUEST['email'])!='')
	//{  
//if(isset($_SESSION['email']))
  //  unset($_SESSION['email']); 
//$result = mysql_query("UPDATE registration SET token='' WHERE token ='".$_GET['token']."'"); 			
			
//			$arrResponse['result'] = 'logout';		
//}else

?>