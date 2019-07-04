<?php
	function showSellerAccount()
	{
		$sellerUsername=$_SESSION['sellerUsername'];						
		if(isset($_POST['Plants']))
		{
			$sql='SELECT p.id,p.plantViewID FROM plants p JOIN plantsView pv on pv.ID=p.plantViewID WHERE sellerUsername=\'' . $sellerUsername . '\';';
			showPlants($sql);
		}
		else if(isset($_POST['ReadyPlants']))
		{
			$sql='SELECT p.id,p.plantViewID FROM plants p JOIN plantsView pv on pv.ID=p.plantViewID WHERE sellerUsername=\'' . $sellerUsername . '\' and  ready=1';
			showPlants($sql);
		}
		else if(isset($_POST['NotReadyPlants']))
		{
			$sql='SELECT p.id,p.plantViewID FROM plants p JOIN plantsView pv on pv.ID=p.plantViewID WHERE sellerUsername=\'' . $sellerUsername . '\' and  ready=0';
			showPlants($sql);
		}
		else if(isset($_POST['Temperature']))
		{
			$sql='SELECT p.id,p.plantViewID FROM plants p JOIN plantsView pv on pv.ID=p.plantViewID WHERE sellerUsername=\'' . $sellerUsername . '\' and !(temperature>=minTemperature and temperature<=maxTemperature);';
			showPlants($sql);
		}
		else if(isset($_POST['Humidity']))
		{
			$sql='SELECT p.id,p.plantViewID FROM plants p JOIN plantsView pv on pv.ID=p.plantViewID WHERE sellerUsername=\'' . $sellerUsername . '\' and !(temperature>=minHumidity and temperature<=maxHumidity);';
			showPlants($sql);
		}
		else 
		{
			$sql='SELECT id,name,price,picture,minTemperature,maxTemperature,minHumidity,maxHumidity FROM plantsView WHERE sellerUsername=\'' . $sellerUsername . '\';';
			showSellerPlantsView($sql);
		}
	}
?>