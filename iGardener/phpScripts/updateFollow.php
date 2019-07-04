<?php
	session_start(); 
	include('connectDatabase.php');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	
	if(isset($_SESSION['buyerUsername']))
	{
		$buyerUsername=$_SESSION['buyerUsername'];
		$plantViewID=$_POST['plantViewID'];
		
		$sql1 = 'SELECT buyerUsername FROM favoriteplants WHERE buyerUsername=\'' . $buyerUsername . '\' and plantViewID=' . $plantViewID . ';';
		$result1 = mysqli_query($db,$sql1) or die($db->error);
		
		if(mysqli_num_rows($result1)==0)
		{
			$sql1 = 'INSERT INTO favoriteplants (buyerUsername,plantViewID) VALUES (\'' . $buyerUsername . '\',' . $plantViewID . ');';
			$result1 = mysqli_query($db,$sql1) or die($db->error);	
			echo("You followed");
		}		
		else 
		{
			$sql1 = 'DELETE FROM favoriteplants WHERE buyerUsername=\'' . $buyerUsername . '\' and plantViewID=' . $plantViewID . ';';
			$result1 = mysqli_query($db,$sql1) or die($db->error);	
			echo("You unfollowed");
		}
	}
	else 
		header("Location:logIn.php");
?>