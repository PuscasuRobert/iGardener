<?php
	include('../global.php');
	include('connectDatabase.php');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	
	session_start(); 
	
	$buyerUsername=$_SESSION['buyerUsername'];
	$phoneNumber=$_POST['phoneNumber'];
	$date=date_create('now')->format('Y-m-d H:i:s');
	
	$sql1='INSERT INTO history (sellerUsername,buyerUsername,date,planViewID) VALUES(' . $sellerUsername . ',' . $buyerUsername . ',' . $date . ',' .  $plantViewID . ');';
	$result1=mysqli_query($db,$sql1) or die($db->error);
	
?>