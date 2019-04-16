<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "maleria_pre";
	 $conn = mysqli_connect($servername, $username, $password, $db);

 if(isset($_POST["Import"])){
		
		$filename=$_FILES["file"]["tmp_name"];		


		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {

	           $sql = "INSERT into data4 (temp,humidity,rainfall,cases,date) 
	               values ('".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."')";
	                // echo $sql;
	          	mysqli_query($conn, $sql); 
				// echo 'processing..';	
	         }
	        
	         fclose($file);	

	          // header('location: index.php');
		 }
	}	 


 ?>