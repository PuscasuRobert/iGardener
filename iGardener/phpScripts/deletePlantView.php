<?php
	$plantViewID=$_POST['plantViewID'];
	
	$sql1='DELETE FROM plants WHERE plantViewID=' . $plantViewID . ';';
	$result1 = mysqli_query($db,$sql1) or die($db->error);
	
	$sql1='DELETE FROM cart WHERE plantViewID=' . $plantViewID . ';';
	$result1 = mysqli_query($db,$sql1) or die($db->error);
	
	$sql1='DELETE FROM plantsview WHERE ID=' . $plantViewID . ';';
	$result1 = mysqli_query($db,$sql1) or die($db->error);
?>