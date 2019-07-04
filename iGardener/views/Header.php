<?php
	include('../models/Header.php');
?>

	<div id="header">
		<p>FREE SHIPPING INSIDE COUNTRY IN 3 DAYS</p>
		<span>DETAILS</span>
	</div>
	<div id="navMenu" > 
		<div id="navMenuLeft">
			<img src="../images/logo.jpg" alt="companyName">
		</div>
		<div id="navMenuRight">
			<div id="buttonsDiv">
				<div class="navMenuButton">
					<a href="../controllers/Index.php" >
						<div class="buttonContainer">
							<i class="fas fa-home fa-2x"></i>
							<p>HOME</p>
						</div>
					</a>
					<div id="searchDropdown" class="navMenuDropdown">
					</div>
				</div>
				<div class="navMenuButton">
					<a href="../controllers/Search.php" >
						<div class="buttonContainer">
							<i class="fas fa-search fa-2x"></i>
							<p>SEARCH</p>
						</div>
					</a>
					<div id="searchDropdown" class="navMenuDropdown">
					</div>
				</div>
				<div class="navMenuButton">
					<a href="../controllers/Cart.php" >
						<div class="buttonContainer">
							<i class="fas fa-shopping-cart fa-2x"></i>
							<p>CART</p>
						</div>
					</a>
					<div id="cartDropdown" class="navMenuDropdown">
						<div id="cart_recentlyAdded">
							<p>Recently Added</p>
						</div>
						<div id="">
							<?php showMenuButtons();?>
						</div>
					</div>
				</div>
				<div class="navMenuButton">
					<a href="../controllers/Account.php" >
						<div class="buttonContainer">
							<i class="fas fa-user fa-2x"></i>
							<p>ACCOUNT</p>
						</div>
					</a>
					<div id="accountDropdown" class="navMenuDropdown">
					</div>
				</div>
				<div class="navMenuButton">
					<a href="../controllers/Favorites.php" >
						<div class="buttonContainer">
							<i class="fas fa-heart fa-2x"></i>
							<p>FAVORITES</p>
						</div>
					</a>
				</div>
				<div class="navMenuButton">
					<a href="../controllers/History.php" >
						<div class="buttonContainer">
							<i class="fas fa-book-open fa-2x"></i>
							<p>HISTORY</p>
						</div>
					</a>
				</div>
				<?php 
				if(isset($_SESSION['sellerUsername']))
					echo('
					<div class="navMenuButton">
						<a href="../controllers/MyStore.php" >
							<div class="buttonContainer">
								<i class="fas fa-store fa-2x"></i>
								<p>MY STORE</p>
							</div>
						</a>
					</div>');
				?>
				<?php showConnectionButtons();?>
				
			</div>
		</div>
	</div>
	<div id="banner">
		<img id="bannerImg" src="../images/banner.png" alt="banner">
	</div>