<?php

include __DIR__ . '/../DBConnect.php';
session_start();

$poolId = $_POST["pool"];
$buyIn = $_POST["buyIn"];
$user = $_SESSION['email'];

$sql = "DELETE FROM scores WHERE pool_id = $poolId AND user = '$user'";
if (mysqli_query($conn, $sql)){
	$sql = "DELETE FROM picks WHERE pool_id = $poolId AND user = '$user'";
	mysqli_query($conn, $sql);
	
	$sql = "UPDATE users
			SET credits = credits + $buyIn
			WHERE email = '$user'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_query($conn, $sql)){
		echo "my_pools.php";
	}
	else{
		echo "<div class='alert alert-warning alert-dismissible'>
	            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	            <strong>Sorry!</strong> There was a problem leaving the pool
        	</div>";
	}
}
else{
	echo "<div class='alert alert-warning alert-dismissible'>
            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Sorry!</strong> There was a problem leaving the pool
    	</div>";
}

?>