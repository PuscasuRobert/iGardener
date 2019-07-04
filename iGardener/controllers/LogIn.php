<?php
	session_start();

	include('../models/LogIn.php');
	
	if(!(isset($_SESSION['buyerUsername']) || isset($_SESSION['sellerUsername'])))
	{
		$answer=0;
		if(isset($_POST['submit']))
		{
			$answer=logIn();
			if($answer==1)
				header('Location:../controllers/Index.php');
		}
		include('../views/LogIn.php');
	}
	else
		header('Location:Index.php');
?>