
<?php 

//header('Content-Type: application/json');
 
  $db_host = '127.0.0.1';
  $db_database = "IMPTEMP";
  $db_user = "IMPTEMP";
  $db_password = "";

  $db = mysql_connect($db_host, $db_user, $db_password);
  mysql_select_db($db_database);

  $dataString = 
  "{\"cols\": [
      {\"id\":\"\",\"label\":\"Date\",\"pattern\":\"\",\"type\":\"string\"},
	  {\"id\":\"\",\"label\":\"Temp\",\"pattern\":\"\",\"type\":\"number\"}],
  \"rows\": [";
  
   //echo $dataString;
   
  //{"c":[{"v": "12:15:15 AM", "f": "12/04/13 9:15 AM"}, {"v": 68.0, "f": "Sixty Eight"}]},  
  
  //Query here .. Figure out what you actually want....
  $sqlQuery = 'SELECT DateTime, Temp from Measure where  DATE(DateTime) < DATE_ADD(CURDATE(), INTERVAL 1 DAY)';
  $sqlResult = mysql_query($sqlQuery);
  while ($row = mysql_fetch_assoc($sqlResult)) {
	//echo $row['DateTime'];
	$dataString .= "{\"c\":[{\"v\": \"". $row['DateTime'] ."\", \"f\": null}, {\"v\": ". $row['Temp'] .", \"f\": null}]},";
  }

  //Then Close it.
  $dataString = substr($dataString, 0, -1); //Remove Trailing Comma
  $dataString .= ']}';
 
  echo $dataString;

?>
