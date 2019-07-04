<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/AddPlantCategory.css">
		<?php include('../phpScripts/Includes.php'); ?>
	</head>
	
	<body>
		<div id="pageContent">
		
			<?php include('Header.php');?>
			
			<div id="formDiv">
				<div>
					<p class="title">Add plant category</p>
				</div>
				<div>
					<div class="formWrapper">
						<form method="post">
							<div>
								<div class="line">
									<div class="leftSide"><p class="text">Name:</p></div>
									<div class="rightSide"><input class="textBox" type="text" name="name" ></div>
								</div>
							</div>
							<div>
								<div class="line">
									<div class="leftSide"><p class="text">Price:</p></div>
									<div class="rightSide"><input class="textBox" type="text" name="price" ></div>
								</div>
							</div>
							<div>
								<div class="line">
									<div class="leftSide"><p class="text">Color:</p></div>
									<div class="rightSide"><input class="textBox" type="text" name="color" ></div>
								</div>
							</div>
							<div>
								<div class="line">
									<div class="leftSide"><p class="text">Minimum temperature:</p></div>
									<div class="rightSide"><input class="textBox" type="text" name="minTemperature" ></div>
								</div>
							</div>
							<div>
								<div class="line">
									<div class="leftSide"><p class="text">Maximum temperature:</p></div>
									<div class="rightSide"><input class="textBox" type="text" name="maxTemperature" ></div>
								</div>
							</div>
							<div>
								<div class="line">
									<div class="leftSide"><p class="text">Minimum humidity:</p></div>
									<div class="rightSide"><input class="textBox" type="text" name="minHumidity" ></div>
								</div>
							</div>
							<div>
								<div class="line">
									<div class="leftSide"><p class="text">Maximum humidity:</p></div>
									<div class="rightSide"><input class="textBox" type="text" name="maxHumidity" ></div>
								</div>
							</div>
							<div>
								<div class="line">
									<div class="leftSide"><p class="text">Logo picture:</p></div>
									<div class="rightSide"><input class="fileUpload" type="file" name="logoPicture" accept="image/*"></div>
								</div>
							</div>
							<div class="submit">
								<button type="submit" name="submit">Create</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php include('../views/footer.php'); ?>
		</div>
	</body>
</html>