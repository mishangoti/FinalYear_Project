<?php
// $crud_operation->StoreCategoryBusiness($cat_id, $Business_Id['id']);
	include 'head.php';
	include 'header.php';
	require_once 'vendor/autoload.php';
		// this is by php-ml library
			use Phpml\Classification\SVC;
			use Phpml\SupportVectorMachine\Kernel;
		$flag1 = 0;
		$flag2 = 0;
		$flag3 = 0;

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($_POST['run'] == 'RUN'){
			
				if(!empty($_SESSION['train']) && !empty($_SESSION['test'])){
					// this is for separate lables/status and values of temp,humidity and cases of train dataset
					foreach ($_SESSION['train'] as $value_train) {
						$train_value[] = [$value_train[0], $value_train[1], $value_train[2]];
						$train_lable[] = $value_train[3];
					}

					// this is for separete lables/status and values of temp, humidity and cases of test dataset
					foreach ($_SESSION['test'] as $value_test) {
						$test_value[] = [$value_test[0], $value_test[1], $value_test[2] ];
						$test_lable[] = $value_test[3];
					}


					// this is demo array of data 
					// values [temp, humidity, cases]
					$samples = [[40, 38, 0], [36, 69, 151], [26, 46, 519], [26, 36, 571], [24, 52, 152], [30, 46, 462]];
					// this is demo array of data
					// lables can be 
					$labels = ['0','151', '219', '571', '152', '462'];			
					/* this is manual added data of first 10 records, to test 
						data is taken from test100.csv
					*/
					// $test = [
					// 			[33, 73, 457],
					// 			[38, 73, 600], 
					// 			[29, 44, 586], 
					// 			[22, 72, 56], 
					// 			[34, 35, 122], 
					// 			[23, 35, 0], 
					// 			[36, 57, 72], 
					// 			[38, 53, 582], 
					// 			[38, 69, 173], 
					// 			[22, 44, 277]
					// 		];
					
					/*
						this data is comming from user
						this data is dynamic data user can fill data and get output acordingly
					*/ 
					$test1 = [
								[$_POST['1_temp'], $_POST['1_humidity'], $_POST['1_rainfall']],
								[$_POST['2_temp'], $_POST['2_humidity'], $_POST['2_rainfall']],
								[$_POST['3_temp'], $_POST['3_humidity'], $_POST['3_rainfall']]
								// [$_POST['4_temp'], $_POST['4_humidity'], $_POST['4_rainfall']],
								// [$_POST['5_temp'], $_POST['5_humidity'], $_POST['5_rainfall']]
								// [$_POST['6_temp'], $_POST['6_humidity'], $_POST['6_cases']],
								// [$_POST['7_temp'], $_POST['7_humidity'], $_POST['7_cases']],
								// [$_POST['8_temp'], $_POST['8_humidity'], $_POST['8_cases']],
								// [$_POST['9_temp'], $_POST['9_humidity'], $_POST['9_cases']],
								// [$_POST['10_temp'], $_POST['10_humidity'], $_POST['10_cases']]
							];
					/*
						debug start
					*/
					// echo $_POST['run'];
					// echo $_POST['temp'];
					// exit();
					// echo '<pre>';

					// print_r($train_value[0]);
					// print_r($train_lable[0]);
					// print_r($train_value);
					// print_r($train_lable);
					// print_r($samples);
					// print_r($labels);
					// print_r($test1);
					// print_r($_SESSION['train']); 
					// exit();
					/*
						debug end
					*/

					// this is to exexute train function to train model
					$classifier = new SVC(
						Kernel::LINEAR,
					    // 1.0,            // $cost
						$cost = 1000			// $cost			    
					    // 3,              // $degree
					    // null,           // $gamma
					    // 0.0,            // $coef0
					    // 0.001,          // $tolerance
					    // 100,            // $cacheSize
					    // true,           // $shrinking
					    // true            // $probabilityEstimates, set to true
						// $cost = 1000
					);
					$classifier->train($train_value, $train_lable);

					// this is for predict one values lable
					// $prediction1 = $classifier->predict([31, 754, 570]);
					
					
					// this is for predict multy values lable
					// this is for dynamic entry test result
					$prediction1 = $classifier->predict($test1);

					// this is for pre-loaded test result
					$prediction2 = $classifier->predict($test_value);

					// this is for predict probability
					// $prediction_pro2 = $classifier->predictProbability($test1);

					// echo '<pre>';
					// print_r($prediction2);
					// print_r($prediction_pro2);

				}else{
					$flag2 = 1;
				}
			}
		}
		// }else{
		// 	$x = 0;
		// }

			
	
			
//--------------------------------------------------------------------------------------------------------------------- 
			// this is for check probability
				/*$classifier = new SVC(
				    Kernel::LINEAR, // $kernel
				    1.0,            // $cost
				    3,              // $degree
				    null,           // $gamma
				    0.0,            // $coef0
				    0.001,          // $tolerance
				    100,            // $cacheSize
				    true,           // $shrinking
				    true            // $probabilityEstimates, set to true
				);*/

				// $classifier->train($samples, $labels);
				// $x = $classifier->predictProbability([3, 3]);
				// $y = $classifier->predictProbability([[3, 2], [1, 5]]);

				/*echo 'this is predict';
				echo '<pre>';
				print_r($x);
				print_r($y);*/
// ----------------------------------------------------------------------------------------------------------------------
?>	
<style>
	.accordion {
	  background-color: #eee;
	  color: #444;
	  cursor: pointer;
	  padding: 18px;
	  width: 100%;
	  border: none;
	  text-align: left;
	  outline: none;
	  font-size: 15px;
	  transition: 0.4s;
	}

	.active, .accordion:hover {
	  background-color: #ccc; 
	}

	.panel {
	  padding: 0 18px;
	  display: none;
	  background-color: white;
	  overflow: hidden;
	}

	#svc_progress {
		display: none;
	}
</style>
<body>
	<container>
		<div class="col-md-3 center">
			<br>
			<center><legend>Notes :</legend></center>
			<p>1. <b>(SVC) Support Vector Classification Dynamic Entry</b> Has Filds Which Take Entrys For Run SVC Manualy, <b>"RUN"</b> Button Will Start The SVC Engine, So it will take time</p>
			<p>2. Click <b>"RUN"</b> For Get Result Of Pre-Loaded Data</p>
			<p>3. <b>(SVC) Support Vector Classification Dynamic Entry Test Result </b> Gives Result Of Data Which Is Taken </p>
			<p>4. <b>(SVC) Support Vector Classification Dynamic Pre-Loaded Test </b> It Gives Result of Data Which Is Loaded</p>
			<p>5. Every Result Is Converted In To <b>"%" Percentage.</b></p>
			<br>
		</div>
		<div class="col-md-6 center">
			<br>
			<center><legend>Report Give's Result In Diffrent Algorithm</legend></center>
			<br>
			<button class="accordion">(SVC) Support Vector Classification Dynamic Entry</button>
			<div class="panel">
				<center><h4><b>Enter Test Data</b></h4></center>
			  	<form method="post" action="svc_report.php">
			  		<input type="hidden" name="run" value="RUN">
			  		
			  		<table>
			  			<thead>
			  				<th>SR.</th>
			  				<th>Temp</th>
			  				<th>Humidity</th>
			  				<th>Rainfall</th>
			  			</thead>
			  			<tbody>
			  				<tr>
			  					<td>1</td>
			  					<td><input type="number" class="form-control" name="1_temp" required></td>
			  					<td><input type="number" class="form-control" name="1_humidity" required></td>
			  					<td><input type="number" class="form-control" name="1_rainfall" required></td>
			  				</tr>
			  				<tr>
			  					<td>2</td>
			  					<td><input type="number" class="form-control" name="2_temp" required></td>
			  					<td><input type="number" class="form-control" name="2_humidity" required></td>
			  					<td><input type="number" class="form-control" name="2_rainfall" required></td>
			  				</tr>
			  				<tr>
			  					<td>3</td>
			  					<td><input type="number" class="form-control" name="3_temp" required></td>
			  					<td><input type="number" class="form-control" name="3_humidity" required></td>
			  					<td><input type="number" class="form-control" name="3_rainfall" required></td>
			  				</tr>
			  				<!-- <tr>
			  					<td>4</td>
			  					<td><input type="number" name="4_temp" ></td>
			  					<td><input type="number" name="4_humidity" ></td>
			  					<td><input type="number" name="4_rainfall" ></td>
			  				</tr>
			  				<tr>
			  					<td>5</td>
			  					<td><input type="number" name="5_temp" ></td>
			  					<td><input type="number" name="5_humidity" ></td>
			  					<td><input type="number" name="5_rainfall" ></td>
			  				</tr> -->
			  				<!-- <tr>
			  					<td>6</td>
			  					<td><input type="number" name="6_temp"  ></td>
			  					<td><input type="number" name="6_humidity"  ></td>
			  					<td><input type="number" name="6_cases"  ></td>
			  				</tr>
			  				<tr>
			  					<td>7</td>
			  					<td><input type="number" name="7_temp"  ></td>
			  					<td><input type="number" name="7_humidity"  ></td>
			  					<td><input type="number" name="7_cases"  ></td>
			  				</tr>
			  				<tr>
			  					<td>8</td>
			  					<td><input type="number" name="8_temp"  ></td>
			  					<td><input type="number" name="8_humidity"  ></td>
			  					<td><input type="number" name="8_cases"  ></td>
			  				</tr>
			  				<tr>
			  					<td>9</td>
			  					<td><input type="number" name="9_temp"  ></td>
			  					<td><input type="number" name="9_humidity"  ></td>
			  					<td><input type="number" name="9_cases"  ></td>
			  				</tr>
			  				<tr>
			  					<td>10</td>
			  					<td><input type="number" name="10_temp"  ></td>
			  					<td><input type="number" name="10_humidity"  ></td>
			  					<td><input type="number" name="10_cases"  ></td>
			  				</tr> -->
			  			</tbody>
			  		</table>
			  		<button class="btn" id="svc_button" type="submit" onclick="return confirm('Are you sure you want to Run SCV Algorithm?')">Run</button>
			  		<small class="form-text text-muted" style="color: red">All Fields Are Require</small><br>
			  		<small class="form-text text-muted">This Algorithum Take's Time To Execute</small>
			  	</form>
			  	<!-- <progress id="svc_progress" class="" max=""> -->
			  	<p id="svc_engine_response">	
				  	
				</p>
			</div>
			

			<button class="accordion">(SVC) Support Vector Classification Dynamic Entry Test Result</button>
			<div class="panel">
				<div class="row">
					<div class="col-md-6">
						<p>
							<?php 
								if(isset($prediction1)){
									$length = sizeof($prediction1); 
							  		if($length > 0){
								  		// echo $prediction1.' posiblity'.'<br>';
								  		$flag1 = 1;	
								  		foreach ($prediction1 as $value) {
								  			$res = $value*100;
								  			$res = $res/600;
								  			echo $value.' | '.intval($res).'% posiblity'.'<br>';	
								  		}	
							  		}
						  		}else{
						  			echo '<p>No Result Set Available.</p>';
						  		}
						  	?>
						</p>
					</div>
					<div class="col-md-6">
						<p>
							<?php
								// echo '<pre>';
								// print_r($test1);
								if(isset($test1)){
									$length = sizeof($test1); 
							  		if($length > 0){
								  		// echo $prediction1.' posiblity'.'<br>';
								  		$flag1 = 1;	
								  		foreach ($test1 as $value) {
								  			print_r($value); echo '<br>';	
								  		}	
							  		}
						  		}else{
						  			echo '<p>No Result Set Available.</p>';
						  		}
							?>
						</p>	
					</div>
					
				</div>
			</div>
			<button class="accordion">(SVC) Support Vector Classification Pre-Loaded Test</button>
			<div class="panel">
				<!-- <form>
					<input type="hidden" name="svc_preloaded">
					<input type="button" name="sub" value="Run">
				</form> -->
				<div class="row">
					<div class="col-md-6">
						<p>
							<?php 
								if(isset($prediction2)){
									$length = sizeof($prediction2); 
							  		if($length > 0){
								  		$flag1 = 1;	
								  		foreach ($prediction2 as $value) {
								  			$res = $value*100;
								  			$res = $res/600;
								  			echo intval($res).'% posiblity'.'<br>';	
								  		}	
							  		}
						  		}else{
						  			echo '<p>No Result Set Available.</p>';
						  		}
						  	?>
						</p>
					</div>
					<div class="col-md-6">
						<p>
							<?php 
								// echo '<pre>';
								// print_r($test1);
								if(isset($test_value)){
									$length = sizeof($test_value); 
							  		if($length > 0){
								  		// echo $prediction1.' posiblity'.'<br>';
								  		$flag1 = 1;	
								  		foreach ($test_value	 as $value) {
								  			print_r($value); echo '<br>';	
								  		}	
							  		}
						  		}else{
						  			echo '<p>No Result Set Available.</p>';
						  		}
							
							?>
						</p>
					</div>
				</div>
			</div>
			
			<?php
				if($flag2 == 1){
					echo '<p style="color: red;">Datasets Are Not Loaded</p>';
				}
				if($flag3 == 1){
					echo '<p style="color: red;">Fields Are Empty</p>';
				}
				// echo '<pre>';
				// print_r($_SESSION['train']); 
				// print_r($_SESSION['test']); 
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
	<script>
		$(document).ready(function(){

			// $(document).ajaxStart(function(){
			// 	$("#svc_progress").css("display", "block");
			// });
			// $(document).ajaxComplete(function(){
			// 	$("#svc_progress").css("display", "none");
			// });


			// $("#svc_button").click(function(){
			// 	$("#svc_engine_response").load("svc_engine.php");
			// });
			// $("#svc_button").click(function(){
			// 	$.ajax({
			// 		url: "svc_engine.php", 
			// 		success: function(result){
			// 			console.log(result);
			// 			$("#svc_engine_response").html(result);
			// 		}
			// 	});
			// });
		});
	</script>
</body>