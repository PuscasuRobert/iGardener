<!DOCTYPE html>

<html>
	<head>
		<?php include('../phpScripts/Includes.php'); ?>
	</head>
	
	<body>
		<div id="pageContent">
		
			<?php include('Header.php');?>
			
			<div id="formDiv">
				<div>
					<p class="title">Buyer data</p>
				</div>
				<div>
					<div class="formWrapper">
						<form method="post" >
							<div>
								<div class="line">
									<div class="leftSide"><p class="text">Phone number:</p></div>
									<div class="rightSide"><input class="textBox" type="text" name="phoneNumber" <?php echo ('value="' . getBuyerPhoneNumber() . '"');?> ></div>
								</div>
							</div>
							<div>
								<div class="line">
									<div class="leftSide"><p class="text">Address:</p></div>
									<div class="rightSide"><input class="textBox" type="text" name="address" <?php echo ('value="' . getBuyerAddress() . '"');?> ></div>
								</div>
							</div>
							
							<div class="submit">
								<button type="submit" name="submit">Save</button>
							</div>
							<p id="Error">
								<?php include('../controllers/LogInError.php'); ?>
							</p>
						</form>
					</div>
				</div>
			</div>
			
			<?php include('../views/footer.php'); ?>
		</div>
	</body>
</html>