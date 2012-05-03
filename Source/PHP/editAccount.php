<?
include_once("config.php");
$arrResponse = array();
$email=$_REQUEST['email'];
 $passowrd=$_REQUEST['password'];
 $npassowrd=$_REQUEST['newPassword'];
$countsql = "select token from registration where token='".$_GET['token']."' and password ='".$passowrd."'";
$query = mysql_query($countsql);
$count_match = mysql_num_rows($query);
if($count_match>0){
  $result = mysql_query("UPDATE registration SET password='".$npassowrd."' WHERE token='".$_GET['token']."'"); 
  $arrResponse['result'] = 'success';
} else {
  $arrResponse['result'] = 'failed';		
}
echo  json_encode($arrResponse);exit;  

?>