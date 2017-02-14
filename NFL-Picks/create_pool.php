<?php
$title = 'Pools';
$page = 'Pools';
include 'header.php';

?>

<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default panel-primary">
		<div class="panel-heading">Create Pool</div>
		<div class="panel-body">
			<form data-toggle="validator" id="pool-form" action="<?php $_PHP_SELF ?>" method="post" role="form" enctype="multipart/form-data">
				<div class="form-group">
					<input type="text" name="pool_name" id="pool_name" tabindex="1" class="form-control" placeholder="Pool Name" value="" required>
				</div>
				<div class="form-group">
					<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
					<input type="file" name="pool_img" id="pool_img" tabindex="4" accept=".png, .jpeg, .gif, .jpg" 
						class="form-control filestyle" data-buttonBefore="true" data-buttonText="Pool Image" 
						data-buttonName="btn-info" required>
				</div>
				<div class="form-group">
					<input type="number" name="buy_in" id="buy_in" tabindex="2" class="form-control" placeholder="Buy In" required>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<input type="submit" name="pool-submit" id="pool-submit" tabindex="3" class="form-control btn btn-success" value="Create">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
	if(isset($_POST["pool-submit"]) && $_FILES['pool_img']['size'] > 0){
		$manager = $_SESSION["email"];
		$pool_name = $_POST["pool_name"];
		$buy_in = $_POST["buy_in"];

		$tmpName  = $_FILES['pool_img']['tmp_name'];

		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);

		$sql = "INSERT INTO pools(manager, pool_name, pool_image, buy_in, total_pot) 
				VALUES ('$manager', '$pool_name', '$content', '$buy_in', '$buy_in')";

		if(mysqli_query($conn, $sql)){
			$lastId = mysqli_insert_id($conn);
			$sql = "INSERT INTO scores(pool_id, user, total_score) 
				VALUES ($lastId, '$manager', 0)";
			mysqli_query($conn, $sql);

			$sql = "UPDATE users
		            SET credits = credits - $buy_in
		            WHERE email = '$user'";
		    mysqli_query($conn, $sql);

			header("Location: my_pools.php");
		}
		else {
			echo "<div class='alert alert-danger alert-dismissible'>
		            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		            <strong>Error!</strong>" . mysqli_error($conn) . 
		         "</div>";
		}


	}
?>





<?php include "footer.php"; ?>