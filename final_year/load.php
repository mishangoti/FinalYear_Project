<?php
// $functions->StoreCategoryBusiness($cat_id, $Business_Id['id']);
	include 'head.php';
	include 'header.php';
	include_once 'class/Functions.php';
	$x = 0;
	$y = 0;
	if(isset($_POST["train"])){
		$filename = 'data/'.$_POST['file'].'.csv';
		// echo $filename; exit();
		
		if(file_exists ($filename)){
			// echo $filename; exit();
			$file = fopen($filename, 'r');
			while (($line = fgetcsv($file)) !== FALSE) {
			  //$line is an array of the csv elements
			  $data[] = $line;
			}
			$_SESSION['train'] = $data;
			// echo '<pre>';
			// print_r($_SESSION['train']);
			// fclose($file);
		}else{
			$x = 1;
		}			
	}
	if(isset($_POST["test"])){
		$filename = 'data/'.$_POST['file'].'.csv';
		// echo $filename; exit();
		
		if(file_exists ($filename)){
			// echo $filename; exit();
			$file = fopen($filename, 'r');
			while (($line = fgetcsv($file)) !== FALSE) {
			  //$line is an array of the csv elements
			  $data[] = $line;
			}
			$_SESSION['test'] = $data;
			// echo '<pre>';
			// print_r($_SESSION['test']);
			fclose($file);
		}else{
			$y = 1;
		}			
	}
?>
<body>

	<container>
		<div class="col-md-3 center">
			<br>
			<center><legend>Notes :</legend></center>
			<p>1. Data should be in <b>CSV</b> formate only.<p>
			<p>2. Enter Only <b>Name</b> Of Dataset. <b>(With Out Extention)</b><p>
			<p>3. At A Time It Can Give Result Of Only One Data Set <b>(Train Dataset & Test Dataset).</b><p>
			<p>4. Copy And Pest CSV File In <b>Data Folder.</b><p>
			<p>5. Remember This Data Is Loaded In <b>Session Variable.</b><p>
			<p>6. Manage Dataset Status, And For Reset Dataset Use <b>Clear Data</b> In Right Section.</p>
		</div>
		<div class="col-md-6 center">
			<form id="first_form" class="form-horizontal" action="load.php" method="post" name="upload_excel" enctype="multipart/form-data">
                <br>
                <!-- Form Name -->
                <center><legend>Load Dataset To Train Model</legend></center>
                <br>
                <!-- File Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">FOR TRAIN MODEL</label>
                    <div class="col-md-4">
                        <input type="text" name="file" id="file" placeholder="Enter CSV File Name" class="form-control">    	
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">LOAD DATA IN SYSTEM</label>
                    <div class="col-md-4">
                        <button type="submit" id="submit" onclick="return confirm('Are you sure you want to load training Dataset?')" name="train" class="btn btn-primary button-loading" data-loading-text="Loading...">Load</button>
                    </div>
                </div>
            </form>
            <p style="color: red;"><?php if($x == 1){echo 'File Is Not Available In Data Folder';} ?></p>
            <form id="first_form" class="form-horizontal" action="load.php" method="post" name="upload_excel" enctype="multipart/form-data">
                <br>
                <!-- Form Name -->
                <center><legend>Load Dataset To Test Model</legend></center>
                <br>
                <!-- File Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">FOR TEST MODEL</label>
                    <div class="col-md-4">
                        <input type="text" name="file" id="file" placeholder="Enter CSV File Name" class="form-control">    	
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">LOAD DATA IN SYSTEM</label>
                    <div class="col-md-4">
                        <button type="submit" id="submit" onclick="return confirm('Are you sure you want to loda test Dataset?')" name="test" class="btn btn-primary button-loading" data-loading-text="Loading...">Load</button>
                    </div>
                </div>
            </form>
            <center>
            

			</center>
			
			<p style="color: red;"><?php if($y == 1){echo 'File Is Not Available In Data Folder';} ?></p>
		
		</div>
		<div class="col-md-3 center">
			<br>
			<center><legend>DATASET STATUS</legend></center>
			<br>
			<div class="col-md-12">
				<?php
					if(!empty($_SESSION['train'])){
				?> 
					<span class="glyphicon glyphicon-ok" style="color: green"></span>
					<b>TRAINING DATASET</b>
					<a href="remove.php?removetrain=rda" onclick="return confirm('Are you sure you want to remove training Dataset?')"><spam class="glyphicon glyphicon-trash" style="color: red"></spam></a>
				<?php
					}else{
				?>			
					<span class="glyphicon glyphicon-remove" style="color: red"></span>
					<b>TRAINING DATASET</b>
				<?php			
					}
				?>							
			</div>
			<div class="col-md-12">
				<?php
					if(!empty($_SESSION['test'])){
				?> 
					<span class="glyphicon glyphicon-ok" style="color: green"></span>
					<b>TESTING DATASET</b>
					<a href="remove.php?removetest=rdx" onclick="return confirm('Are you sure you want to remove testing Dataset?')"><spam class="glyphicon glyphicon-trash" style="color: red"></spam></a>
				<?php
					}else{
				?>
					<span class="glyphicon glyphicon-remove" style="color: red"></span>
					<b>TEST DATASET</b>
				<?php			
					}
				?>
			</div>
			<div class="col-md-12">
				<?php 
					if(empty($_SESSION['test'])){
						echo '<a href="load.php">Load Data</a>';
					}
				?>
			</div>
		</div>
	</container>

<?php
	include 'footer.php';
?>
</body>