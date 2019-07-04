<?php
	include('../global.php');
	include('connectDatabase.php');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	
	session_start(); 
	
	if(isset($_SESSION['buyerUsername']))
	{
		$buyerUsername=$_SESSION['buyerUsername'];
		$plantViewID=$_POST['plantViewID'];
		$increase=$_POST['increase'];
		$sql1 = 'SELECT nrOfPlants FROM cart WHERE buyerUsername=\'' . $buyerUsername . '\' and plantViewID=' . $plantViewID . ';';
		$result1 = mysqli_query($db,$sql1) or die($db->error);
		if(mysqli_num_rows($result1)==0)
		{
			$sql2 = 'INSERT INTO cart (buyerUsername,plantViewID,nrOfPlants) VALUES (\'' . $buyerUsername . '\',' . $plantViewID . ',1);';
			$result2 = mysqli_query($db,$sql2) or die($db->error);
		}
		else
		{
			$sql2 = 'SELECT count(plantViewID) as "nrOfReadyPlants" FROM plants WHERE plantViewID=' . $plantViewID . ' and ready=1 GROUP BY plantViewID;';
			$result2 = mysqli_query($db,$sql2) or die($db->error);
			$count=mysqli_fetch_array($result2);
			$nrOfPlants=mysqli_fetch_array($result1)['nrOfPlants']+$increase;
			if($nrOfPlants>=1&&$nrOfPlants<=$count['nrOfReadyPlants'])
			{
				$sql3 = 'UPDATE cart SET nrOfPlants=' . $nrOfPlants . ' WHERE buyerUsername=\'' . $buyerUsername . '\' and plantViewID=' . $plantViewID . ';';
				$result3 = mysqli_query($db,$sql3) or die($db->error);
			}
		}
		echo getCartData();
	}
	else 
		header("Location:logIn.php");
?>