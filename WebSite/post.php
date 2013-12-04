<html>
<body>

<?php echo "Looks Acceptable!" ?>

</body>
</html> 


<?php 
	//$content = "\r\n" . $_POST["DateTime"] . "," . $_POST["Temp"]; 
	//$file = "text.txt"; 
	//$Saved_File = fopen($file, 'a'); 
	//fwrite($Saved_File, $content); 
	//fclose($Saved_File); 
	
	$con=mysqli_connect("localhost","IMPTEMP","","IMPTEMP");
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	 date_default_timezone_set('America/New_York');
     $date= date('Y-m-d') ;
	 $time = time('h-i-s');
	 
	 $dtNow = new DateTime();
	 $mysqlDateTime = $dtNow->format(DateTime::ISO8601);
	 
	 
	 $DateTime = $mysqlDateTime;
	 
	 echo $DateTime;
	
	$sql = "INSERT INTO Measure (DateTime, Temp, Location) VALUES ('$DateTime', '$_POST[Temp]', 'PoleBarn')";
	
	 echo $sql;
	
	
	if (!mysqli_query($con,$sql))
	{
	  die('Error: ' . mysqli_error($con));
	}
	echo "1 record added";

	mysqli_close($con);

?>