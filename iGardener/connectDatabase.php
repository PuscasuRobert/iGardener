<?php
	if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
	{
		define('DB_SERVER', 'localhost:3306');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', '');
		define('DB_DATABASE', 'iGardener');
	}
?>
