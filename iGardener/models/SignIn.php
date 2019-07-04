<?php
	function insertBuyer($username,$encPassword,$email)
	{
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		$sql="INSERT INTO buyers (username,password,email) VALUES ('$username','$encPassword','$email');";
		$result = mysqli_query($db,$sql) or die($db->error);
		return result;
	}

	function insertSeller($username,$encPassword,$email)
	{
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		$sql="INSERT INTO sellers (username,password,email) VALUES ('$username','$encPassword','$email');";
		$result=mysqli_query($db,$sql) or die($db->error);
		return $result;
	}
?>