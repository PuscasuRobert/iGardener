<?php
	
	function getCartData()
	{	
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		$buyerUsername=$_SESSION['buyerUsername'];
		
		$sql1 = 'SELECT p.ID,p.picture,p.name,c.nrOfPlants,p.price FROM cart c JOIN plantsview p on c.plantViewID=p.ID WHERE buyerUsername=\'' . $buyerUsername . '\';';
		$result1 = mysqli_query($db,$sql1) or die($db->error);
		
		$result2='';
		$totalPrice=0;
		while ($row1 = mysqli_fetch_array($result1))
		{
			$result2 = $result2 . $row1['ID'] . ' ';
			$result2 = $result2 . $row1['picture'] . ' ';
			$result2 = $result2 . $row1['name'] . ' ';
			$result2 = $result2 . $row1['nrOfPlants'] . ' ';
			$result2 = $result2 . $row1['price'] . ' ';
			$totalPrice+=$row1['nrOfPlants']*$row1['price'];
		}
		
		$result2=$result2 . $totalPrice;
		
		return $result2;
	}
 
	function goToCartButton()
	{
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		session_start(); 
		if(isset($_POST['submit']))
		{
			header("Location:cart.php");
		}
	}
	
	function showPlantsView($sql1)
	{		
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		$buyerUsername='';
		if(isset($_SESSION['buyerUsername']))
			$buyerUsername=$_SESSION['buyerUsername'];
		
		$result1 = mysqli_query($db,$sql1) or die($db->error);
		$i=0;
		while ($row1 = mysqli_fetch_array($result1))
		{	
			$plantViewID=$row1['id'];
			
			$nrOfPlants=calculateNrOfPlants($plantViewID);
			if($nrOfPlants==0)
			{
				$addToCartOpacity=0.7;
				$addToCartDisabled="disabled";			
			}
			else
			{
				$addToCartOpacity=1.0;
				$addToCartDisabled="";
			}
			
			$sql3 = 'SELECT plantViewID FROM favoritePlants WHERE buyerUsername="'. $buyerUsername .'" and plantViewID="' . $plantViewID . '";';
			$result3 = mysqli_query($db,$sql3) or die($db->error);	
			if(mysqli_num_rows($result3)==0)
			{
				$followOpacity=1.0;
				$followValue='Follow';
			}
			else 
			{
				$followOpacity=0.7;
				$followValue='Unfollow';
			}
			echo(
				'<div class="productWrapper">
					<div id="product' . $i . '" class="product">' .
						'<div class="imgDiv">
							<img class="imgBorder" src="../flowersLogo/' . $row1['picture'] . '">
						</div>' .
						'<div class="productInfo">
							<p class="name">' . $row1['name'] . '</p>
							<p class="numberOf"><span style="color:red">' . $nrOfPlants . '</span> flowers left</p>
							<p class="price">' . $row1['price'] . ' lei </p>
							<div class="addToCartButtonWrapper">
								<span class="addToCartLogo"><img class="icon-add-to-cart" src="../images/lotus.png" alt="Icon add to cart"></span>
								<input ' . $addToCartDisabled . ' style="opacity:' . $addToCartOpacity . '" class="addToCartButton" type="button" value="Add to cart" onclick="changeQuantity(' . $plantViewID . ',\'product' . $i . '\',1);">
							</div>
							<div class="followButtonWrapper">
								<span class="followLogo"><i class="fas fa-heart fa-2x"></i></span>
								<input class="followButton" style="opacity:' . $followOpacity . '" type="button" name="Follow" value="' . $followValue . '" onclick="followProduct(\'' . $buyerUsername . '\',' . $plantViewID . ',\'product' . $i . '\');">
							</div>												
						</div>
					</div>
				</div>'
				);
			$i++;
		}
	}
	
	function showSellerPlantsView($sql1)
	{
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		if(isset($_SESSION['sellerUsername']))
		{
			$sellerUsername=$_SESSION['sellerUsername'];
		
			$result = mysqli_query($db,$sql1) or die($db->error);	
			
			$i=0;
			while ($row = mysqli_fetch_array($result))
			{
				$plantViewID=$row['id'];
				$name=$row['name'];
				$price=$row['price'];
				$picture=$row['picture'];	
				$minTemperature=$row['minTemperature'];
				$maxTemperature=$row['maxTemperature'];
				$minHumidity=$row['minHumidity'];
				$maxHumidity=$row['maxHumidity'];
				
				$nrOfPlants=calculateNrOfPlants($plantViewID);
				echo(
				'<div class="productWrapper">
					<div id="product' . $i . '" class="product">' .
						'<div class="imgDiv">
							<img class="imgBorder" src="../flowersLogo/' . $picture . '">
						</div>' .
						'<div class="productInfo">
							<p class="name">' . $name . '</p>
							<p class="price">' . $price . ' Lei</p>
							<p class="nrOfPlants">' . $nrOfPlants . ' plants left</p>
							<div class="followButtonWrapper">
								<span class="followLogo"><i class="fas fa-plus-circle"></i></span>
								<input class="followButton" type="button" name="AddPlant" value="Add plant" onclick="addPlant(' . $plantViewID . ');">
							</div>	
							<div class="deleteButtonWrapper">
									<span class="deleteLogo"><i class="fas fa-trash"></i></span>
									<input class="deleteButton" type="button" name="Delete" value="Delete category" onclick="deletePlantView()">
							</div>								
						</div>
							
					</div>
				</div>'
				);
				$i++;
			}
		}	
	}
	
	function showPlants($sql1)
	{
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		$path="/xampp/htdocs../iGardenerAPI/";
		
		$json = file_get_contents($path . "/index.json");
		$arrayData=json_decode($json,true);
		
		if(isset($_SESSION['sellerUsername']))
		{
			$sellerUsername=$_SESSION['sellerUsername'];
		
			$result = mysqli_query($db,$sql1) or die($db->error);	
			
			$i=0;
			while ($row = mysqli_fetch_array($result))
			{
				$plantID=$row['id'];	
				
				$temperature=$humidity=$imagePath=$location=NULL;
				if(!empty($arrayData['plants'][$sellerUsername][$plantID]['temperature']))
					$temperature=$arrayData['plants'][$sellerUsername][$plantID]['temperature'];
				if(!empty($arrayData['plants'][$sellerUsername][$plantID]['humidity']))
					$humidity=$arrayData['plants'][$sellerUsername][$plantID]['humidity'];
				if(!empty($arrayData['plants'][$sellerUsername][$plantID]['livePicture']))
					$imagePath=$path . $arrayData['plants'][$sellerUsername][$plantID]['livePicture'];
				if(!empty($arrayData['plants'][$sellerUsername][$plantID]['location']))
					$location=$arrayData['plants'][$sellerUsername][$plantID]['location'];
				
				$imageData = base64_encode(file_get_contents($imagePath));
							
				echo('
				<div class="productWrapper">
					<div id="product' . $i . '" class="product">' .
						'<div class="imgDiv">
							<img class="imgBorder" src="data:image/jpeg;base64,'.$imageData.'">
						</div>' .
						'<div class="productInfo">
							<p class="location">Location: ' . $location . '</p>
							<p class="temperature">Temperature: ' . $humidity . '</p>
							<p class="hemperature">Humidity: ' . $humidity . '</p>							
						</div>
					</div>
				</div>
				');
				$i++;
			}
		}
	}
	
	function showCart()
	{
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		if(isset($_SESSION['buyerUsername']))
		{
			$buyerUsername=$_SESSION['buyerUsername'];
		
			$sql1 = 'SELECT plantViewID,nrOfPlants FROM cart WHERE buyerUsername=\'' . $buyerUsername . '\';';
			$result1 = mysqli_query($db,$sql1) or die($db->error);
			
			if(mysqli_num_rows($result1)==0)
			{
				
			}
			else
			{
				echo('<div>');
				$i=0;
				while ($row1 = mysqli_fetch_array($result1))
				{
					$plantViewID=$row1['plantViewID'];
					$sql2 = 'SELECT * FROM plantsView WHERE ID=\'' . $plantViewID . '\';';
					$result2 = mysqli_query($db,$sql2) or die($db->error);
					
					$row2 = mysqli_fetch_array($result2);
					
					echo('
						<div class="flexboxContainer">
							<div class="d1">
								<div class="imgDiv">
									<img class="imgBorder" style="width:100%;height:100%;" src="flowersLogo/' . $row2['picture'] . '" alt="companyName">
								</div>
							</div>
							<div class="d2">
								<div><p class="p1">' . $row2['name'] . '</p></div>
							</div>
							<div class="d3">
								<div><p id="nrOfTimes' . $i . '" class="p1" class="text">x' . $row1['nrOfPlants'] . '</p></div>
							</div>
							<div class="d4">
								<div><p class="p2">' . $row2['price'] . ' Lei</p></div>
							</div>
						</div>
						');
					$i++;
				}	
				echo('</div>');
					
				$sql2 = 'SELECT sum(c.nrOfPlants*p.price) as "sum" FROM cart c JOIN plantsview p on c.plantViewID=p.ID WHERE c.buyerUsername=\''. $buyerUsername .'\';';

				$result2 = mysqli_query($db,$sql2) or die($db->error);	
				
				$row= mysqli_fetch_row($result2);											
				if(is_null($row[0]))
					$totalPrice=0;
				else $totalPrice=$row[0];
			
				echo('
					<div id="cart_totalPrice">
						<div class="flexboxContainer">
							<p class="p1"><b>TOTAL</b>: 1 produs</p>
							<p id="totalPrice" class="p1"><b>'. $totalPrice . ' Lei </b></p>
						</div>
					</div>
					<form method="post">
						<div class="addToCartButtonWrapper" style="margin:0px;">
							<span class="addToCartLogo"><img class="icon-add-to-cart" src="../images/lotus.png" alt="Icon add to cart"></span>
							<button class ="addToCartButton" type="submit" name="submit">Cart details</button>
						</div>
					</form>
					');
			}
		}
	}
	
	function showConnectionButtons()
	{
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		if(isset($_SESSION['buyerUsername']))
		{	
			echo('
				<div style="width:100%; height:29px;text-align:right;">
					<a href="../controllers/LogOut.php" id="logOut">Log out</a>
				</div>
				');
		}
		else if(isset($_SESSION['sellerUsername']))
		{	
			echo('
				<div style="width:100%; height:29px;text-align:right;">
					<a href="../controllers/LogOut.php" id="logOut">Log out</a>
				</div>
				');
		}
		else
		{
			echo('
				<div style="width:100%; height:29px;text-align:right;">
					<a href="../controllers/LogIn.php" id="logIn">Log in</a>
					<a href="../controllers/SignIn.php" id="signIn">Sign in</a>
				</div>
				');
		}
	}
	
	function calculateNrOfPlants($plantViewID)
	{
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		$sql2 = 'SELECT count(p.plantViewID) as "nrOfPlants" 
		FROM plants p 
		WHERE p.plantViewID=' . $plantViewID . ' and p.ready=1 
		GROUP BY p.plantViewID;';
		$result2 = mysqli_query($db,$sql2) or die($db->error);
		
		if($result2->num_rows==0)
			return 0;
		return mysqli_fetch_array($result2)['nrOfPlants']; 
	}
	
	function getSellerPhoneNumber()
	{
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		$sellerUsername=$_SESSION['sellerUsername'];
		$sql='SELECT phoneNumber FROM sellers WHERE username=\'' . $sellerUsername . '\';';
		$result = mysqli_query($db,$sql) or die($db->error);
		$row=mysqli_fetch_array($result);
		return $row['phoneNumber'];
	}
		
	function getSellerNrOfLocations()
	{
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		$sellerUsername=$_SESSION['sellerUsername'];
		$sql='SELECT nrOfLocations FROM sellers WHERE username=\'' . $sellerUsername . '\';';
		$result = mysqli_query($db,$sql) or die($db->error);
		$row=mysqli_fetch_array($result);
		return $row['nrOfLocations'];
	}
	
	function getBuyerPhoneNumber()
	{
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		$buyerUsername=$_SESSION['buyerUsername'];
		$sql='SELECT phoneNumber FROM buyers WHERE username=\'' . $buyerUsername . '\';';
		$result = mysqli_query($db,$sql) or die($db->error);
		$row=mysqli_fetch_array($result);
		return $row['phoneNumber'];
	}
	
	function getBuyerAddress()
	{
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		$buyerUsername=$_SESSION['buyerUsername'];
		$sql='SELECT address FROM buyers WHERE username=\'' . $buyerUsername . '\';';
		$result = mysqli_query($db,$sql) or die($db->error);
		$row=mysqli_fetch_array($result);
		return $row['address'];
	}
	
	function showShopProductsAndFilters($sql1)
	{
		echo('
		<div id="content">
			<form method="post">		
				<div id="orderByDiv">
					<div id="contentDiv">
						<div id="nrFilteredProducts">
							<p class="title" style="display:inline;font-family:Helvetica;">Flowers:21</p>
						</div>
					</div>
				</div>
				
				<div>		
					<div id="filters">
						<div class="filterCategory">
							<div class="filterDiv"><button type="submit" name="PlantSpecies"><p class="categories">Plant species</p></button></div>
							<div class="addToCartButtonWrapper">
								<span class="addToCartLogo"><img class="icon-add-to-cart" src="../images/lotus.png" alt="Icon add to cart"></span>
								<input class="addToCartButton" type="button" value="Add plant category" onclick=\'window.open("AddPlantCategory.php","_self","","");\'>
							</div>
						</div>
						
						<!--
						<div class="filterCategory">
							<?php getNrOfLocations();?>
						</div>
						-->
						
						<div class="filterCategory">
							<div class="filterDiv"><button type="submit" name="Plants"><p class="categories">Plants</p></button></div>
							<div class="filterDiv"><button type="submit" name="ReadyPlants"><p class="categories">Ready plants</p></button></div>
							<div class="filterDiv"><button type="submit" name="NotReadyPlants"><p class="categories">Not ready plants</p></button></div>
							<div class="filterDiv"><button type="submit" name="Temperature"><p class="categories">Temperature</p></button></div>
							<div class="filterDiv"><button type="submit" name="Humidity"><p class="categories">Humidity</p></button></div>
						</div>
						
						<div class="filterCategory">
							<div class="filterName"><p class="p1">Color</p></div>
							<div class="filterDiv"><input class="filterCheckBox" type="checkbox" name="vehicle1" value="Bike"> <p class="p2">White</p></div>
							<div class="filterDiv"><input class="filterCheckBox" type="checkbox" name="vehicle1" value="Bike"> <p class="p2">Orange</p></div>
							<div class="filterDiv"><input class="filterCheckBox" type="checkbox" name="vehicle1" value="Bike"> <p class="p2">Yellow</p></div>
							<div class="filterDiv"><input class="filterCheckBox" type="checkbox" name="vehicle1" value="Bike"> <p class="p2">Purple</p></div>
							<div class="filterDiv"><input class="filterCheckBox" type="checkbox" name="vehicle1" value="Bike"> <p class="p2">Blue</p></div>
							<div class="filterDiv"><input class="filterCheckBox" type="checkbox" name="vehicle1" value="Bike"> <p class="p2">Lime</p></div>
						
						</div>
					</div>
				</div>
				<div id="productDiv">');
					showPlantsView($sql1);
				echo('
				</div>
			</form>
		</div>
		');
	}
	
	function getOrders()
	{
		if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
			include('../phpScripts/connectDatabase.php');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		
		if(isset($_SESSION['buyerUsername']))
		{
			/*'SELECT 
h.sellerUsername as "a",
h.date as "b",
c.plantViewID as "c",
c.plantID as "d",
pv.price as "e" 

FROM history h 
JOIN command c on h.commandID=c.commandID 
JOIN plants p on c.plantID=p.ID 
JOIN plantsView pv on pv.ID=p.plantViewID 
WHERE buyerUsername="user"'*/
			$buyerUsername=$_SESSION['buyerUsername'];
			$sql='SELECT h.sellerUsername as "a",h.date as "b",c.plantViewID as "c",c.plantID as "d",pv.price as "e" 
			FROM history h
			JOIN command c on h.commandID=c.commandID 
			JOIN plants p on c.plantID=p.ID 
			JOIN plantsView pv on pv.ID=p.plantViewID  
			WHERE buyerUsername="' . $buyerUsername . '"';
			echo $sql;
			$result = mysqli_query($db,$sql) or die($db->error);
			return $result;
		}
		return NULL;
	}
	
?>