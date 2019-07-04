<!DOCTYPE html>

<html>
	<head>
		<?php include('../phpScripts/Includes.php'); ?>
	</head>
	
	<body>
		<div id="pageContent">
		
			<?php include('Header.php');?>
			
			<table>			
			 <tr>
				<th>Company</th>
				<th>Contact</th>
				<th>Country</th>
			 </tr>
			<?php
				$orders=getOrders();
				while($row=mysqli_fetch_array($orders))
				{
					$sellerUsername=$row['a'];
					$date=$row['b'];
					$plantViewID=$row['c'];
					$plantID=$row['d'];
					$price=$row['e'];
					echo('
					  <tr>' .
						'<td>' . $sellerUsername . '</td>' .
						'<td>' . $date . '</td>' .
						'<td>' . $plantViewID . '</td>' .
						'<td>' . $plantID . '</td>' .
						'<td>' . $price . '</td>' .
					  '</tr>');
				}
					
			?>
			</table>
			<?php include('../views/Footer.php'); ?>
		</div>
	</body>
</html>