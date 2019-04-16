<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "maleria_pre";
	$conn = mysqli_connect($servername, $username, $password, $db);

	$filename = "data.csv";
	$fp = fopen('php://output', 'w');

	$query = "SELECT * FROM data4";
	$result = mysqli_query($conn,$query);
	while ($row = mysqli_fetch_row($result)) {
		$header[] = $row[0];
	}	

	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename='.$filename);
	fputcsv($fp, $header);

	$query = "SELECT * FROM data4";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_row($result)) {
		fputcsv($fp, $row);
	}

?>