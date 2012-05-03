<?php
include_once("config.php");
$arrResponse = array();
if (trim($_REQUEST['email'])!='')
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
	
		$arrResponse['result'] = 'does not exist';		
	
	}
	}
echo  json_encode($arrResponse);exit;  
?>