<?php
	function showMenuButtons()
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
				echo('<div id="cart_productPrice">');
				
				$cartProducts=getCartData();
				$s=explode(' ',$cartProducts);
				
				$i=0;
				while($i*5+1<count($s))
				{	
					$plantViewID=$s[$i*5];
					$picture=$s[$i*5+1];
					$name=$s[$i*5+2];
					$nrOfPlants=$s[$i*5+3];
					$price=$s[$i*5+4];
					
					echo('
						<div class="flexboxContainer">
							<div class="d1">
								<div class="imgDiv">
									<img class="picture imgBorder" style="width:100%;height:100%;" src="../flowersLogo/' . $picture . '" alt="companyName">
								</div>
							</div>
							<div class="d2">
								<p class="name p1" style="color:#005eb8;font-weight:900;">' . $name . '</p>
							</div>
							<div class="d3">
								<p class="nrOfPlants'  . $i . ' nrOfPlants p2" style="color:#005eb8;font-weight:900;">x' . $nrOfPlants . '</p>
							</div>
							<div class="d4">
								<p class="price p3" style="color:#005eb8;font-weight:900;text-decoration: none;">' . $price . ' Lei</p>
							</div>
						</div>
						');
					$i++;
				}
				echo('</div>');
			
				$totalPrice=$s[$i*5];
				
				echo('
					<div id="cart_totalPrice">
						<div class="flexboxContainer">
							<p class="p1" style="color:#888888;"><b>TOTAL</b>:</p>
							<p class="totalPrice p1" style="color:#888888;"><b>'. $totalPrice . ' Lei </b></p>
						</div>
					</div>
					<div class="addToCartButtonWrapper" style="margin:0px;">
						<span class="addToCartLogo"><img class="icon-add-to-cart" src="../images/lotus.png" alt="Icon add to cart"></span>
						<button class ="addToCartButton" type="submit" onclick="window.location.href=\'Cart.php\'">Cart details</button>
					</div>
					');
			}
		}
	}
?>