function header()
{
	var http = new XMLHttpRequest();
	var url = 'header.php';
	var params = '';
	http.open('POST', url, true);

	//Send the proper header information along with the request
	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	http.onreadystatechange = function() 
	{//Call a function when the state changes.
		if(http.readyState == 4 && http.status == 200) 
		{
			document.getElementById('header').innerHTML=http.response;
		}
	}
	
	http.send(params);
}