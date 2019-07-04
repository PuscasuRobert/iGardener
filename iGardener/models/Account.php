<?php
	
	function saveSellerPhoneNumber($phoneNumber)
	{
		$sellerUsername=$_SESSION['sellerUsername'];
		
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		$sql='UPDATE sellers SET phoneNumber=\'' . $phoneNumber . '\' WHERE username=\'' . $sellerUsername . '\';';
		$result = mysqli_query($db,$sql) or die($db->error);
	}
		
	function saveBuyerPhoneNumber($phoneNumber)
	{
		$buyerUsername=$_SESSION['buyerUsername'];
		
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		$sql='UPDATE buyers SET phoneNumber=\'' . $phoneNumber . '\' WHERE username=\'' . $buyerUsername . '\';';
		$result = mysqli_query($db,$sql) or die($db->error);
	}
	
	function saveBuyerAddress($address)
	{
		$buyerUsername=$_SESSION['buyerUsername'];
		
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		$sql='UPDATE buyers SET address=\'' . $address . '\' WHERE username=\'' . $buyerUsername . '\';';
		$result = mysqli_query($db,$sql) or die($db->error);
	}
?>