<?php
	session_start();
	include('../models/Account.php');
	
	if(isset($_SESSION['buyerUsername']))
	{
		if(isset($_POST['submit']))
		{
			$phoneNumber=$_POST['phoneNumber'];
			$address=$_POST['address'];
			
			saveBuyerPhoneNumber($phoneNumber);
			saveBuyerAddress($address);
		}
		include('../views/BuyerAccount.php');
	}
	else if(isset($_SESSION['sellerUsername']))
	{
		$_POST['PlantSpecies']=1;
		
		if(isset($_POST['submit']))
		{
			$phoneNumber=$_POST['phoneNumber'];
			
			saveSellerPhoneNumber($phoneNumber);
		}
		include('../views/SellerAccount.php');
	}
	
	else header('Location:LogIn.php');
?>