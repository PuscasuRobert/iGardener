<?php
	session_start();
	
	if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
		include('../phpScripts/connectDatabase.php');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	
	if(isset($_SESSION['sellerUsername']))
	{
		$sellerUsername=$_SESSION['sellerUsername'];
		$plantViewID=$_POST['plantViewID'];
		
		$sql='SELECT locationNumber FROM plantsLocations WHERE sellerUsername=\'' . $sellerUsername . '\' and plantID is NULL;'; 
		$result = mysqli_query($db,$sql) or die($db->error);
		if(mysqli_num_rows($result)>0)
		{
			$row=mysqli_fetch_array($result1);
			$locationNumber=$row['locationNumber'];
			
			$sql='UPDATE plantsLocations SET plantID=' . $plantViewID . ' WHERE locationNumber=' . $locationNumber . ' and sellerUsername=\'' . sellerUsername . '\''; 
			$result = mysqli_query($db,$sql) or die($db->error);
			
			$sql='INSERT INTO plants (plantViewID,locationNumber,ready) VALUES (' . $plantViewID . ',' . $locationNumber . ',0);'; 
			$result = mysqli_query($db,$sql) or die($db->error);echo $sql;
		}
	}
?>