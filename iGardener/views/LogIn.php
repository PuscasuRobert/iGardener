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
					<p class="title">Log in</p>
				</div>
				<div>
					<div class="formWrapper">
						<form method="post">
							<div>
								<div class="line">
									<div class="leftSide"><p class="text">Username:</p></div>
									<div class="rightSide"><input class="textBox" type="text" name="username" ></div>
								</div>
							</div>
							<div>
								<div class="line">
									<div class="leftSide"><p class="text">Password:</p></div>
									<div class="rightSide"><input class="textBox" type="password" name="password" ></div>
								</div>
							</div>
							<div>
								<div class="line">
									<div class="rightSide"><p class="text">Buyer:</p></div>
									<div class="leftSide"><input class="textBox" type="radio" name="buyer" ></div>
								</div>
							</div>
							<div>
								<div class="line">
									<div class="rightSide"><p class="text">Seller:</p></div>
									<div class="leftSide"><input class="textBox" type="radio" name="seller" ></div>
								</div>
							</div>

							<div class="submit">
								<button type="submit" name="submit">Log in</button>
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