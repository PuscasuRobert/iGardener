<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/Cart.css">
		<?php include('../phpScripts/Includes.php'); ?>
	</head>
	
	<body>
		<div id="pageContent">
			
			<?php include('Header.php');?>
			
			<div id="offers" class="">
				<div id="">
					<div id="checkout">
						<?php
							showCartProducts();
						?>
					</div>					
				</div>
			</div>

			<?php include('../views/footer.php'); ?>
		</div>
	</body>
</html>