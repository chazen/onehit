<?php
//Constansts for DB CONFIG 
if (strpos($_SERVER['HTTP_HOST'],".")>0) { // FOR REMOTE SERVER
	define("DB_HOST", "localhost");
	define("DB_NAME", "careerbe_i_onehit");
	define("DB_USER", "careerbe_i1hit");
	define("DB_PASS", "8ldoO5GdxlE8");
	define("SITE_URL", "http://dev.virtual-base.com/iphone/");

} else {
	define("DB_HOST", "localhost");
	define("DB_NAME", "careerbe_i_onehit");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("SITE_URL", "http://localhost/php_basic_web_service/");

}

mysql_connect(DB_HOST,DB_USER, DB_PASS) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());


?>