<?php
	session_start(); 
	unset($_SESSION['buyerUsername']);
	unset($_SESSION['sellerUsername']);
	header('Location:Index.php');
?>