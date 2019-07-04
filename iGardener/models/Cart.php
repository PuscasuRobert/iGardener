<?php

function showCartProducts()
{
	if(!(defined('DB_SERVER')&&defined('DB_USERNAME')&&defined('DB_PASSWORD')&&defined('DB_DATABASE')))
		include('../phpScripts/connectDatabase.php');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	
	if(isset($_SESSION['buyerUsername']))
	{
		echo('<div class="cartProducts">');
		
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
						<button style="float:left;" type="button" onclick="changeQuantity(' . $plantViewID . ',\'product' . $i . '\',-1);">
							<i class="fa fa-minus" aria-hidden="true"></i>
						</button>
						
						<p class="nrOfPlants'  . $i . ' nrOfPlants p2">x' . $nrOfPlants . '</p>
						
						<button style="float:left;" type="button" onclick="changeQuantity(' . $plantViewID . ',\'product' . $i . '\',1);">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</button>		
					</div>

					<div class="d4">
						<p class="price p3">' . $price . ' Lei</p>
					</div>
				</div>
				');
			$i++;
		}	
		echo('</div>');
		
		$totalPrice=$s[$i*5];
		echo('
		<div style="border-bottom:0px solid;" id="cart_totalPrice">
			<div class="flexboxContainer">
				<p class="p1"><b>TOTAL</b>:</p>
				<p class="totalPrice p1"><b>'. $totalPrice . ' Lei </b></p>
			</div>
		</div>
		<form method="post">
			<div class="addToCartButtonWrapper" style="margin:0px;">
				<span class="addToCartLogo"><img class="icon-add-to-cart" src="../images/lotus.png" alt="Icon add to cart"></span>
				<button style="width:300px;" class ="addToCartButton" type="submit" name="submit" onclick="submitCommand();">Submit command</button>
			</div>
		</form>
		');
	}
}

?>