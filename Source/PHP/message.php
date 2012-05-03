<?php
include_once("config.php");
$arrResponse = array();
if (trim($_REQUEST['registered_reciepents'])!=''&& trim($_REQUEST['nregistered_reciepents'])!=''&& trim($_REQUEST['message'])!='')
	{
	   $res ="INSERT INTO message (message_text,registerd_user,non_registerd_user,file)
VALUES ('".mysql_real_escape_string(trim($_REQUEST['message']))."'
,'".mysql_real_escape_string(trim($_REQUEST['registered_reciepents']))."','".mysql_real_escape_string(trim($_REQUEST['nregistered_reciepents']))."','".mysql_real_escape_string(trim($_REQUEST['file']))."')";
$query=mysql_query($res);
		$arrResponse['result'] = 'record has been added successfully';		
	
	}
	else
	{
	
		$arrResponse['result'] = 'failed';		
	
	}
	
echo  json_encode($arrResponse);exit;  
?>