<?php

	include __DIR__ . '/../DBConnect.php';
	session_start();

	$user  = $_SESSION['email'];
	$week = $_POST['week'];
	$game = $_POST['game'];
	$pool = $_POST['pool'];
	$pick = $_POST['pick'];

	$sql = "SELECT user
			FROM picks
			WHERE user ='$user'
			AND week = $week
			AND pool_id = $pool";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0){
		$sql = "UPDATE picks
				SET team = $pick, game = $game
				WHERE user ='$user'
				AND week = $week
				AND pool_id = $pool";
		mysqli_query($conn, $sql);
		if(mysqli_affected_rows($conn) > 0){
			echo "<div class='span4 offset4 alert alert-success alert-dismissible'>
                <strong>Saved!</strong> Your pick was saved successfully
            </div>";
		}
		else{
			echo "<div class='alert alert-warning alert-dismissible'>
                <strong>Sorry!</strong> There was a problem saving your pick
            </div>";
		}
	}
	else{
		$sql = "INSERT INTO picks (user, week, game, pool_id, team)
				VALUES ('$user', $week, $game, $pool, $pick)";
		mysqli_query($conn, $sql);
		if(mysqli_affected_rows($conn) > 0){
			echo "<div class='span4 offset4 alert alert-success alert-dismissible'>
                <strong>Saved!</strong> Your pick was saved successfully
            </div>";
		}
		else{
			echo "<div class='alert alert-warning alert-dismissible'>
                <strong>Sorry!</strong> There was a problem saving your pick
            </div>";
		}
	}
?>