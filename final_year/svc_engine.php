<?php
// $crud_operation->StoreCategoryBusiness($cat_id, $Business_Id['id']);
	include 'head.php';
	require_once 'vendor/autoload.php';
		// this is by php-ml library
			use Phpml\Classification\SVC;
			use Phpml\SupportVectorMachine\Kernel;

			
			if(!empty($_SESSION['train'])){
				// this is for separate lables/status and values of temp,humidity and cases of train dataset
				foreach ($_SESSION['train'] as $value_train) {
					$train_value[] = [$value_train[0], $value_train[1], $value_train[2] ];
					$train_lable[] = $value_train[3];
				}
				// this is demo array of data 
				// values [temp, humidity, cases]
				$samples = [[40, 38,], [36, 69], [26, 46], [26, 36], [24, 52], [30, 46]];
				// this is demo array of data
				// lables can be 
				$labels = ['0','151', '219', '571', '152', '462'];
				
				$test = [[33, 73, 457], [38, 73, 600], [29, 44, 586], [22, 72, 56], [34, 35, 122], [23, 35, 0], [36, 57, 72], [38, 53, 582], [38, 69, 173], [22, 44, 277]];

				// echo '<pre>';
				// print_r($train_value[0]);
				// print_r($train_lable[0]);
				// print_r($train_value);
				// print_r($train_lable);
				// print_r($samples);
				// print_r($labels);
				// print_r($test);
				// print_r($_SESSION['train']); 
				// exit();

				// this is to exexute train function to train model
				$classifier = new SVC(Kernel::LINEAR, $cost = 1000);
				$classifier->train($train_value, $train_lable);

				// this is for predict one values lable
				$prediction1 = $classifier->predict([31, 75, 1]);
				
				// this is for predict multy values lable
				// $prediction2 = $classifier->predict($test);

				print_r($prediction1); exit();

				return $prediction2;
		  		if(isset($prediction1)){
			  		echo $prediction1.' posiblity'.'<br>';	
			  		foreach ($prediction2 as $value) {
			  			echo $value.' posiblity'.'<br>';	
			  		}	
		  		}else{
		  			echo '<p>No Data Set Available.</p>';
		  		}
				  	
			}

			if(!empty($_SESSION['test'])){
				// this is for separete lables/status and values of temp, humidity and cases of test dataset
				foreach ($_SESSION['test'] as $value_test) {
					$test_value[] = [$value_test[0], $value_test[1], $value_test[2] ];
					$test_lable[] = $value_test[3];
				}
			}
			
			
			
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
				);

				$classifier->train($samples, $labels);
				$x = $classifier->predictProbability([3, 3]);
				$y = $classifier->predictProbability([[3, 2], [1, 5]]);

				echo 'this is predict';
				echo '<pre>';
				print_r($x);
				print_r($y);*/
// ----------------------------------------------------------------------------------------------------------------------

?>