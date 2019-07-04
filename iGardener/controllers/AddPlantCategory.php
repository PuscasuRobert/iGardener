<?php
	session_start();
	
	include('../models/AddPlantCategory.php');
	include('../views/AddPlantCategory.php');

	if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
		include('../phpScripts/connectDatabase.php');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

	if(isset($_SESSION['sellerUsername']))
		if(isset($_POST['submit']))
		{
			
			$sellerUsername= '"' . $_SESSION['sellerUsername'] . '"';
			$name= '"' . $_POST['name'] . '"';
			$price=$_POST['price'];
			$color= '"' . $_POST['color'] . '"';
			$minTemperature=$_POST['minTemperature'];
			$maxTemperature=$_POST['maxTemperature'];
			$minHumidity=$_POST['minHumidity'];
			$maxHumidity=$_POST['maxHumidity'];
			$logoPicture= '"' . $_POST['logoPicture'] . '"';

			$sql='INSERT INTO plantsView (sellerUsername,name,price,color,minTemperature,maxTemperature,minHumidity,maxHumidity,picture) values('.$sellerUsername.','.$name.','.$price.','.$color.','.$minTemperature.','.$maxTemperature.','.$minHumidity.','.$maxHumidity.','.$logoPicture.')';
			$result = mysqli_query($db,$sql) or die($db->error);
		}
?>