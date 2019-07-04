<?php
	function logIn()
	{
		session_start();
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']); 
		$encPassword= md5($password);
	
		if(isset($_POST['buyer']))
		{
			$sql = "SELECT username FROM buyers WHERE username = '$username' and password = '$encPassword'";
			$result = mysqli_query($db,$sql) or die($db->error);
			$count = mysqli_num_rows($result);	
			if($count == 1)
			{
				$_SESSION['buyerUsername'] = $username;		
				return 1;
			}
			else
			{
				$error = "Your Login Name or Password is invalid";
				echo($error);
			}
		}
		else if(isset($_POST['seller']))
		{
			$sql = "SELECT username FROM sellers WHERE username = '$username' and password = '$encPassword'";
			$result = mysqli_query($db,$sql) or die($db->error);
			$count = mysqli_num_rows($result);	
			if($count == 1)
			{
				$_SESSION['sellerUsername'] = $username;		
				return 1;
			}
			else
			{
				$error = "Your Login Name or Password is invalid";
				echo($error);
			}
		}
		return 0;
	}
?>