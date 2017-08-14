<?php 
function get_rank($domain){            
	$url = "http://data.alexa.com/data?cli=10&dat=snbamz&url=".$domain;      
	//Initialize the Curl  
	$ch = curl_init();            
	//Set curl to return the data instead of printing it to the browser.  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,2);           
	//Set the URL  
	curl_setopt($ch, CURLOPT_URL, $url);            
	//Execute the fetch  
	$data = curl_exec($ch);            
	//Close the connection  
	curl_close($ch);          
	$xml = new SimpleXMLElement($data);
	//Get popularity node
	$popularity = $xml->xpath("//POPULARITY");
	//Get the Rank attribute
	$rank = (string)$popularity[0]['TEXT']; 
	//get country node
	$country = $xml->xpath("//COUNTRY");	
	$name = (string)$country[0]['NAME']; 
	$country_rank = (string)$country[0]['RANK'];
	return ['global'=>$rank,$name=>$country_rank];
}
?>
