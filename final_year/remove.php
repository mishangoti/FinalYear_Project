<?php

	session_start();

	if(isset($_GET['removetrain'])){
		if($_GET['removetrain'] == 'rda'){
			unset($_SESSION['train']);
			header('location: load.php');
		}
	}

	if(isset($_GET['removetest'])){
		if($_GET['removetest'] == 'rdx'){
			unset($_SESSION['test']);
			header('location: load.php');
		}	
	}