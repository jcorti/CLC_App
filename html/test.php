<?php 
try{
$soapclient = new SoapClient('http://www.holidaywebservice.com/HolidayService_v2/HolidayService2.asmx?wsdl');
$response =$soapclient->GetCountriesAvailable();
var_dump($response);
echo '<br><br><br>';
$array = json_decode(json_encode($response), true);
print_r($array);
 echo '<br><br><br>';
echo  $array['GetCountriesAvailableResult']['CountryCode']['5']['Description'];
	  echo '<br><br><br>';
	foreach($array as $item) {
		echo '<pre>'; var_dump($item);
	}  
}catch(Exception $e){
	echo $e->getMessage();
}	
?>
