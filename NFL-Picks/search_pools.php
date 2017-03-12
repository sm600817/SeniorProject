<?php
$title = 'Pools';
$page = 'Find Pools';
include 'header.php';
?>
<?php

$src_term = $_POST["pool-srch"];


?>

<div class="text-center">
	<form class="navbar-form" role="search">
	    <div class="input-group">
	        <input type="text" class="form-control" value="<?php echo $src_term; ?>" placeholder="Pool Name" name="pool-srch" id="pool-srch2">
	        <div class="input-group-btn">
	            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
	        </div>
	    </div>
	    <div class="input-group">
	        <input type="text" class="form-control" placeholder="Manager" name="srch-term" id="srch-term">
	        <div class="input-group-btn">
	            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
	        </div>
	    </div>
	</form>
</div>

<?php include "footer.php"; ?>