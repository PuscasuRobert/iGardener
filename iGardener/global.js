function logOut()
{
	var http = new XMLHttpRequest();
	var url = 'logOut.php';
	var params = '';
	http.open('POST', url, true);

	//Send the proper header information along with the request
	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	http.onreadystatechange = function() 
	{//Call a function when the state changes.
		if(http.readyState == 4 && http.status == 200) 
		{
			console.log(http.response);
		}
	}
	http.send(params);
}

function followProduct(buyerUsername,plantViewID,productID)
{
	if(buyerUsername!='')
	{
		var http = new XMLHttpRequest();
		var url = '../phpScripts/updateFollow.php';
		var params = 'buyerUsername='+buyerUsername+'&plantViewID='+plantViewID;
		http.open('POST', url, true);

		//Send the proper header information along with the request
		http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		http.onreadystatechange = function() 
		{//Call a function when the state changes.
			if(http.readyState == 4 && http.status == 200) 
			{
				//console.log(http.response);
				var product=document.getElementById(productID);
				for (var i = 0; i < product.children.length; i++)
				{
					if(product.children[i].className=="productInfo")
					{
						var productInfo=product.children[i];
						for (var j = 0; j < productInfo.children.length; j++)
						{
							if(productInfo.children[j].className=="followButtonWrapper")
							{
								var detailsButtonDiv=productInfo.children[j];
								for (var k = 0; k < detailsButtonDiv.children.length; k++)
								{
									if(detailsButtonDiv.children[k].tagName=="INPUT")
									{
										btn=detailsButtonDiv.children[k];
										if(http.response=='You followed')
										{
											btn.style.opacity=0.7;
											btn.value="Unfollow";
										}
										else if (http.response=='You unfollowed')
										{
											btn.style.opacity=1.0;
											btn.value="Follow";
										}
									}
								}
							}
						}
					}
				}
			}
		}
		http.send(params);
	}
	else 
	{
		goToLogIn();
	}
}

function goToLogIn()
{
	window.location="logIn.php";
}

function changeQuantity(plantViewID,productID,increase)
{
	var http = new XMLHttpRequest();
	var url = '../phpScripts/changeQuantity.php';
	var params = 'plantViewID='+plantViewID+'&increase='+increase;
	http.open('POST', url, true);

	//Send the proper header information along with the request
	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	http.onreadystatechange = function() 
	{//Call a function when the state changes.
		if(http.readyState == 4 && http.status == 200) 
		{
			var s=http.response.split(' ');
			for(var i=0;i*5+1<s.length;i++)	
			{
				var product=document.getElementsByClassName('nrOfPlants'+i+' nrOfPlants p2');
				
				for(j=0;j<product.length;j++)
				{
					product[j].innerText='x'+s[i*5+3];
				}
			}
			var totalPrice=document.getElementsByClassName('totalPrice p1');
			for(i=0;i<totalPrice.length;i++)
				totalPrice[i].innerHTML='<b>'+s[s.length-1]+' Lei</b>';
		}
	}
	
	http.send(params);
}

function submitCommand()
{
	var http = new XMLHttpRequest();
	var url = '../phpScripts/submitCommand.php';
	var params = '';
	http.open('POST', url, true);

	//Send the proper header information along with the request
	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	http.onreadystatechange = function() 
	{//Call a function when the state changes.
		if(http.readyState == 4 && http.status == 200) 
		{
			//console.log(http.response);
		}
	}
	
	http.send(params);
}

function deletePlantView(plantViewID)
{
	var http = new XMLHttpRequest();
	var url = '../phpScripts/deletePlantView.php';
	var params = 'plantViewID='+plantViewID;
	http.open('POST', url, true);

	//Send the proper header information along with the request
	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	http.onreadystatechange = function() 
	{//Call a function when the state changes.
		if(http.readyState == 4 && http.status == 200) 
		{
			//console.log(http.response);
		}
	}
	
	http.send(params);
}

function addPlantCategory(name,price,color,minTemperature,maxTemperature,minHumidity,maxHumidity,logoPicture)
{
	var http = new XMLHttpRequest();
	var url = '../phpScripts/addPlantCategoryScript.php';
	var params = 'name='+name+'&price='+price+'&color='+color+'&minTemperature='+minTemperature+'&maxTemperature='+maxTemperature+'&minHumidity='+minHumidity+'&maxHumidity='+maxHumidity+'&logoPicture='+logoPicture;
	http.open('POST', url, true);

	//Send the proper header information along with the request
	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	http.onreadystatechange = function() 
	{//Call a function when the state changes.
		if(http.readyState == 4 && http.status == 200) 
		{
			console.log(http.response);
		}
	}
	
	http.send(params);
}

function addPlant(plantViewID)
{
	var http = new XMLHttpRequest();
	var url = '../phpScripts/addPlant.php';
	var params = 'plantViewID='+plantViewID;
	http.open('POST', url, true);

	//Send the proper header information along with the request
	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	http.onreadystatechange = function() 
	{//Call a function when the state changes.
		if(http.readyState == 4 && http.status == 200) 
		{
			console.log(http.response);
		}
	}
	
	http.send(params);
}