<?php
// $crud_operation->StoreCategoryBusiness($cat_id, $Business_Id['id']);
	include 'head.php';
	include 'header.php';


	
?>
<body>
	<container>
		<div class="col-md-3 center">
			<br>
			<center><legend>Steps To Use :</legend></center>
			<br>
			<p>1. Load CSV Dataset</p>
			<p>2. Go To SVC Report</p>
			<p>3. Enter Data Manualy </p>
			<p>4. Get Result Of Manualy Added Data</p>
			<p>5. Get Result Of Pre-Loaded Data</p>
		</div>
		<div class="col-md-6 center">
			<br>
			<center><legend>Details & Guidline</legend></center>
			<br>
			<h4><b>Keep In Mind:</b></h4>
			<h5>1. This Demo Is Not Storing Any Data Into DataBase.</h5>
			<h5>2. Before Run The SVC Algo You Need To Load Data Sets.</h5>
			<h5>3. <b>"Train Dataset"</b> Train Dataset Is For Train SVC Model.</h5>
			<h5>4. <b>"Test Dataset"</b> Test Dataset Is For Test SVC Model.</h5>
			<h5>5. <b>"Manual Test"</b> You Can also Test Custome Entry After Loading Train Dataset.</h5>
					<!-- coleps mechanisum -->
					<!-- <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo0">Step: 1</button>
					<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo1">Step: 2</button>
					<div id="demo0" class="collapse">ONE</div>
					<div id="demo1" class="collapse">TWO</div> -->
			
			<?php
				// echo '<pre>';
				// print_r($_SESSION['data']) 
			?>
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