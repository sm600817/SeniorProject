<?php

include __DIR__ . '/../DBConnect.php';
session_start();

$poolId = $_POST["pool"];
$buyIn = $_POST["buyIn"];
$user = $_SESSION['email'];

$sql = "INSERT INTO scores(pool_id, user, total_score) 
				VALUES ($poolId, '$user', 0)";
if(mysqli_query($conn, $sql)){
	//add buy_in amount to total pot
    $sql = "UPDATE pools
            SET total_pot = total_pot + $buyIn
            WHERE pool_id = $poolId";
    if(mysqli_query($conn, $sql)){
    	$sql = "UPDATE users
	        SET credits = credits - $buyIn
	        WHERE email = '$user'";
		if(mysqli_query($conn, $sql)){
			echo 'success';
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
}
else{
	echo "<div class='alert alert-warning alert-dismissible'>
	            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	            <strong>Sorry!</strong> There was a problem leaving the pool
        	</div>";
}




?>