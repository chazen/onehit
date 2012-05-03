<?php
session_start();
include_once("config.php");
$arrResponse = array();
if (trim($_REQUEST['email'])!='' && trim($_REQUEST['password'])!='')
	{
		$res = mysql_query("SELECT login_id,fname, lname  FROM registration WHERE email ='".mysql_real_escape_string(trim($_REQUEST['email']))."' AND password='".mysql_real_escape_string(trim($_REQUEST['password']))."'");
		if (mysql_num_rows($res) > 0) {
			$rs = mysql_fetch_array($res, MYSQL_ASSOC);
			$arrResponse['result'] = 'success';		
			$arrResponse['fname'] = $rs['fname'];
			$arrResponse['lname'] = $rs['lname'];
		    $_SESSION['email'] =$rs['email'];
		    $arrResponse['token']   =rand();
$result = mysql_query("UPDATE registration SET token='".$arrResponse['token']."' WHERE user_name ='".mysql_real_escape_string(trim($_REQUEST['username']))."' AND password='".mysql_real_escape_string(trim($_REQUEST['password']))."'"); 			
			$_SESSION['token']=$arrResponse['token'];
	
	$inactive = 60;
// check to see if $_SESSION['timeout'] is set
if(isset($_SESSION['timeout']) ) {
$session_life = time() - $_SESSION['timeout'];
if($session_life > $inactive)
{ session_destroy();
 $arrResponse['token']='';
$result = mysql_query("UPDATE registration SET token='' WHERE user_name ='".mysql_real_escape_string(trim($_REQUEST['username']))."' AND password='".mysql_real_escape_string(trim($_REQUEST['password']))."'"); 			
 //header("Location:signup.php");
 }
}
$_SESSION['timeout'] = time();
		} else {
			$arrResponse['result'] = 'failed';		
		}
	} else {
		$arrResponse['result'] = 'failed';		
	}
echo  json_encode($arrResponse);exit;  
?>