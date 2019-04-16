<?php
// $functions->StoreCategoryBusiness($cat_id, $Business_Id['id']);
	include 'head.php';
	include 'header.php';
	include_once 'class/Functions.php';

?>
<body>

	<container>
		<div class="col-md-3 center"></div>
		<div class="col-md-6 center">
			<form id="first_form" class="form-horizontal" action="export.php" method="post" name="upload_excel" enctype="multipart/form-data">
                <br>
                <!-- Form Name -->
                <center><legend>Export data for backup</legend></center>
                <br>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Export data</label>
                    <div class="col-md-4">
                    	<a href="class/export.php" onclick="return confirm('Are you sure you want to Export Dataset?')" class="btn btn-primary button-loading">Export</a>
                        <!-- <button type="submit" id="submit" onclick="return confirm('Are you sure you want to Export Dataset?')" name="Export" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button> -->
                    </div>
                </div>
            </form>
            <center></center>
            <spqn>Note: Your data will come in this formate</spqn>
			<span style="color: red">
            	<pre>Id   |   temperature   |   humidity   |   rainfall   |   cases   |   date</pre>  
			</span>
			<p id="message"></p>
				<?php
					// if($x == 1){
					// 	echo '<span style="color: green">CSV is successfully Loaded..</span>';
					// }else if($x == 2){
					// 	echo '<span style="color: red">Problem in loading CSV..</span>';
					// }else if($x == 3){
					// 	echo '<span style="color: red">Select CSV FILE first..</span>';
					// }
				?>
			
		</div>
		<div class="col-md-3"></div>
	</container>

<?php
	include 'footer.php';
?>
</body>