<?php	
	session_start();
	
	if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
		include('../phpScripts/connectDatabase.php');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
					
	include('../models/SignIn.php');
	
	if(!(isset($_SESSION['buyerUsername']) || isset($_SESSION['sellerUsername'])))
	{
		if(isset($_POST['submit']))
		{		
			$username = mysqli_real_escape_string($db,$_POST['username']);
			$password = mysqli_real_escape_string($db,$_POST['password']); 
			$encPassword= md5($password);
			$repeatPassword = mysqli_real_escape_string($db,$_POST['repeatPassword']); 
			$email = mysqli_real_escape_string($db,$_POST['email']); 
			
			if(isset($_POST['buyer'])&&isset($_POST['seller']))
				header("Location:signIn.php?error=You cant be both an user and an admin");
			if(empty($username))
				header("Location:signIn.php?error=user field is not completed");
			else if(empty($password))
				header("Location:signIn.php?error=password field is not completed");
			else if(empty($repeatPassword))
				header("Location:signIn.php?error=repeat password field is not completed");
			else if(empty($email))
				header("Location:signIn.php?error=email field is not completed");
			else if(preg_match("[a-zA-Z0-9_]",$username))
				header("Location:signIn.php?error=username has invalid characters");
			else if(preg_match("[a-zA-Z0-9_]",$password))
				header("Location:signIn.php?error=password has invalid characters");
			else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
				header("Location:signIn.php?error=email is invalid");
			else if($password!=$repeatPassword)
				header("Location:signIn.php?error=password doest not match");
			
			$sql = "SELECT username FROM buyers WHERE username = '$username' 
			UNION SELECT username FROM sellers WHERE username = '$username'";
			$result = mysqli_query($db,$sql) or die($db->error);
			if($result===false)
				header("Location:signIn.php?error=Query failed");
			
			$count = mysqli_num_rows($result);	
			if($count == 0)
			{
				if(isset($_POST['buyer']))
				{
					$result=insertBuyer($username,$encPassword,$email);
					if($result===false)
						header("Location:signIn.php?error=Account creation failed");
				}
				else if(isset($_POST['seller']))
				{		
					$result=insertSeller($username,$encPassword,$email);
					if($result===false)
						header("Location:signIn.php?error=Account creation failed");
					header("Location:Index.php");
				}
				else 
				{
					header("Location:SignIn.php?error=No account type is selected");
				}
			}
			else
			{
				$error = "Your Login Name or Password is invalid";
			}
		}
		include('../views/SignIn.php');
	}
	else 
		header('Location:Index.php');
?>