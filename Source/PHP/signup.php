<?php
include_once("config.php");
$arrResponse = array();
if (trim($_REQUEST['password'])!=''&& trim($_REQUEST['email'])!='')
	{
	
	$que="select email from registration where email='".$_REQUEST['email']."'";
	
	$result=mysql_query($que);
	$number=mysql_num_rows($result);
	if($number>0)
	{
		$arrResponse['result'] = 'already exist';		
	
	}
	else
	{
		   $res ="INSERT INTO registration (password ,email)
VALUES ('".mysql_real_escape_string(trim($_REQUEST['password']))."'
,'".mysql_real_escape_string(trim($_REQUEST['email']))."')";
$query=mysql_query($res);
if($query!='')
{
	$arrResponse['result'] = 'Success';		
	 }
	 else {
		$arrResponse['result'] = 'failed';		
	}
	}
	}
echo  json_encode($arrResponse);exit;  
?>