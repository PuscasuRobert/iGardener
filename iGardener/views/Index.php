<!DOCTYPE html>

<html>
	<head>
		<?php include('../phpScripts/Includes.php'); ?>
	</head>
	
	<body>
		<div id="pageContent">
		
			<?php include('Header.php');?>
			
			<div id="offers" class="dealOfTheDay">
				<p class="title">Deals of the day</p>
				<div id="discountProductDiv">
					<!--<div class="arrowLeft"><i class="fas fa-chevron-circle-left  fa-3x"></i></div>-->
					<div id="productDiv">
						<?php
							$sql1 = 'SELECT id,name,price,picture from whatOthersAreBuying JOIN plantsView on ID=plantViewID LIMIT 5';
							showPlantsView($sql1);
						?>
					</div>
					<!--<div class="arrowRight"><i class="fas fa-chevron-circle-right fa-3x"></i></div>-->
				</div>
				<!--
				<div class="dots">
					<div class="dotsDiv">
						<div class="dotDiv"><span class="currentDot"></span></div>
						<div class="dotDiv"><span class="dot"></span></div>
						<div class="dotDiv"><span class="dot"></span></div>
					</div>
				</div>
				-->
			</div>
				
			<div id="offers" class="whatOthersAreBuying">
				<p class="title">What others are buying</p>
				<div id="discountProductDiv">
					<div id="productDiv">
						<?php
							$sql1 = 'SELECT id,name,price,picture from whatOthersAreBuying JOIN plantsView on ID=plantViewID LIMIT 5';
							showPlantsView($sql1);
						?>
					</div>					
				</div>
			</div>

			<div id="presentation">
				<p class="title">Flower Delivery for All Occasions and Holidays</p>
				<p class="text">&emsp;Fresh Flowers From Our Fields, Expertly Designed and Delivered by iGardener.Flowers and plants are always appropriate, no matter the occasion. Whether you’re shopping for Easter flowers for your family gathering or you want to surprise your husband at the office with a lush bonsai plant, we’ve got you covered. Browse indoor plants for sale perfect for the hardworking college student, bountiful bouquets filled to bursting with magnificent blooms, and designer floral arrangements you can’t find elsewhere. No matter the occasion our flowers and easy flower delivery will make you shine!
				If you’re gift shopping for a snack fiend, browse our gourmet baskets filled to the brim with tasty eats. Want to complement that savory snack with a sweet treat? Don’t forget to order a delivery of delicious dipped strawberries. Complement your gourmet gift with some gorgeous blooms to sweeten the surprise. Deliver flowers today and brighten the week of a friend, family member, or special someone.</p>
				
				<p class="title">The Perfect Gift and Flower Delivery, Whether It's a Special Day or Any Day</p>

				<p class="text">&emsp;iGardener is the perfect gifting destination for any occasion, whether it’s your most cherished holiday or any ordinary day that calls for a spontaneous show of appreciation. Our birthday flowers can be customized with the vase of your choice or paired with a sweet treat to match the recipient's style. From romantic displays of red roses to stargazer lilies we have flower arrangements for any occasion. Your significant other will swoon from our romantic anniversary flowers and gifts, curated with love by our expert team. And, we're here to support your gifting needs even when the occasion isn't a joyful one. Our funeral flowers are tastefully arranged and hand-delivered with care to help you express your deepest sympathy during a sensitive time. Each and every gift is designed to help you send the right message.</p>
				
				<p class="title">
				More Than Just Floral Experts, We're Gifting Pros</p>

				<p class="text">&emsp;We know how to make a lasting impression with more than just flowers. While our stunning orchids can brighten up any living space, sometimes the occasion calls for chocolate-covered strawberries to satisfy a sweet tooth. For the more health-conscious foodies, we have thoughtfully selected fruit baskets and snack baskets, ideal for any occasion. Just like our floral arrangements, every gourmet food gift is delivered with a personalized message, so your warm wishes shine through.
				If you are new to floral gifting, check out our expert flower guide, the Florapedia, to learn more about different types of flowers, flower and plant tips, and more. Follow iGardener on Facebook, Twitter, Instagram and Pinterest for gifting advice and floral inspiration throughout the year.</p>
			</div>
			
			<?php include('../views/footer.php'); ?>
		</div>
	</body>
</html>