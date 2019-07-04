<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/Account.css">
		<?php include('../phpScripts/Includes.php'); ?>
	</head>
	
	<body>
		<div id="pageContent">
		
			<?php include('Header.php');?>
			<form method="post">
				<div id="content">
				
				<div>		
					<div id="filters">
						<div class="filterCategory">
							<div class="filterDiv"><button type="submit" name="PlantSpecies"><p class="categories">Plant species</p></button></div>
							<div class="addToCartButtonWrapper">
								<span class="addToCartLogo"><img class="icon-add-to-cart" src="../images/lotus.png" alt="Icon add to cart"></span>
								<input class="addToCartButton" type="button" value="Add plant category" onclick='window.open("AddPlantCategory.php","_self","","");'>
							</div>
						</div>
						
						<!--<div class="filterCategory">
							<?php getSellerNrOfLocations();?>
						</div>-->
						
						<div class="filterCategory">
							<div class="filterDiv"><button type="submit" name="Plants"><p class="categories">Plants</p></button></div>
							<div class="filterDiv"><button type="submit" name="ReadyPlants"><p class="categories">Ready plants</p></button></div>
							<div class="filterDiv"><button type="submit" name="NotReadyPlants"><p class="categories">Not ready plants</p></button></div>
							<div class="filterDiv"><button type="submit" name="Temperature"><p class="categories">Temperature</p></button></div>
							<div class="filterDiv"><button type="submit" name="Humidity"><p class="categories">Humidity</p></button></div>
						</div>
						
						<div class="filterCategory">
							<div class="filterName"><p class="p1">Color</p></div>
							<div class="filterDiv"><input class="filterCheckBox" type="radio" name=""> <p class="p2"></p></div>
							<div class="filterDiv"><input class="filterCheckBox" type="radio" name="white"> <p class="p2">White</p></div>
							<div class="filterDiv"><input class="filterCheckBox" type="radio" name="orange"> <p class="p2">Orange</p></div>
							<div class="filterDiv"><input class="filterCheckBox" type="radio" name="yellow"> <p class="p2">Yellow</p></div>
							<div class="filterDiv"><input class="filterCheckBox" type="radio" name="purple"> <p class="p2">Purple</p></div>
							<div class="filterDiv"><input class="filterCheckBox" type="radio" name="blue"> <p class="p2">Blue</p></div>
							<div class="filterDiv"><input class="filterCheckBox" type="radio" name="lime"> <p class="p2">Lime</p></div>
						</div>
						<button type="submit" name="submit">Apply</button>
					</div>
											
					<div id="productDiv">
						<?php showSellerAccount();?>
					</div>
				</div>
			</form>
			
			<?php include('../views/footer.php'); ?>
		</div>
	</body>
</html>