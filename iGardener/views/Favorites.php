<!DOCTYPE html>

<html>
	<head>
		<?php include('../phpScripts/Includes.php'); ?>
	</head>
	
	<body>
		<div id="pageContent">
		
			<?php include('Header.php');?>
			
			<div id="content">
				<form method="post" >
					<div>		
						<div id="filters">
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
							<?php
								$cond='';
								if(isset($_POST['white']))
									$cond="color='white'";
								else if(isset($_POST['orange']))
									$cond="color='orange'";
								else if(isset($_POST['yellow']))
									$cond="color='yellow'";
								else if(isset($_POST['purple']))
									$cond="color='purple'";
								else if(isset($_POST['blue']))
									$cond="color='blue'";
								else if(isset($_POST['lime']))
									$cond="color='lime'";
								$sql1='SELECT id,name,price,picture FROM favoritePlants f JOIN plantsView p on p.ID=f.plantViewID';;
			
								if(!empty($cond))
									$sql1=$sql1 . ' WHERE ' . $cond;
								showPlantsView($sql1);
							?>
						</div>
					</div>
				</form>
			</div>
			
			<?php include('../views/footer.php'); ?>
		</div>
	</body>
</html>