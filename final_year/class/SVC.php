<?php

	require_once 'vendor/autoload.php';
	
	use Phpml\Classification\SVC;
	use Phpml\SupportVectorMachine\Kernel;

	$samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
	$labels = ['a', 'a', 'a', 'b', 'b', 'b'];

	$classifier = new SVC(Kernel::LINEAR, $cost = 1000);
	$classifier->train($samples, $labels);

	$prediction1 = $classifier->predict([3, 2]);
	// return 'b'

	$prediction2 = $classifier->predict([[3, 2], [1, 5]]);
	// return ['b', 'a']

	// echo $prediction1.'<br>'.$prediction2.'<br>';

?>
