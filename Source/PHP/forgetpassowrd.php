<?php
include_once("config.php");
$arrResponse = array();
if  (isset($_REQUEST['email']))
{
$res = mysql_query("SELECT password  FROM registration WHERE email ='".mysql_real_escape_string(trim($_REQUEST['email']))."' ");
		if (mysql_num_rows($res) > 0) {
			$rs = mysql_fetch_array($res, MYSQL_ASSOC);
			$arrResponse['result'] = 'success';		
			$arrResponse['password'] = $rs['password'];
			//$arrResponse['lname'] = $rs['lname'];
		} else {
			$arrResponse['result'] = 'failed';		
		}
	} 
	

$to=$_REQUEST['email'];

// Your subject
$subject="Recover Password";

// From
$header="from: Onehit";

// Your message
$message="Hi, \r\n\n";
$message.="You have successfully recovered your password.\n";

$message.="Your password is ".$rs['password']."\n\n";

$message.="Thanks\n";
$message.="Team Onehit\n";

// send email
$sentmail = mail($to,$subject,$message,$header);
// if your email succesfully sent
	echo  json_encode($arrResponse) ;exit;  
?>