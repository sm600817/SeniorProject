<?php

include 'DBConnect.php';

$gameId = $_GET["game"];
$awayId = $_GET["awayId"];
$homeId = $_GET["homeId"];

$sql = "SELECT team_name, offPct
		FROM teams
		WHERE team_num = " . $awayId;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	$team_row = mysqli_fetch_assoc($result);

	$awayTeam = $team_row["team_name"];
	$awayOff = $team_row["offPct"];
}

$sql = "SELECT team_name, offPct
	FROM teams
	WHERE team_num = " . $homeId;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	$team_row = mysqli_fetch_assoc($result);

	$homeTeam = $team_row["team_name"];
	$homeOff = $team_row["offPct"];
}

$homeScore = 0;
$awayScore = 0;

for($i=0; $i < 22; $i++){
	$rand = rand(1, 100);


	if(($i % 2) == 0){
		if($rand <= $homeOff) {
			$homeScore += 7;
		}
	}
	else {
		if($rand <= $awayOff) {
			$awayScore += 7;
		}
	}
}

if($homeScore == $awayScore) {
	if($homeOff > $awayOff) {
		$homeScore += 3;
	}
	else {
		$awayScore += 3;
	}
}

$sql = "UPDATE games
	SET home_score = " . $homeScore . ", away_score =  " . $awayScore . "
	WHERE game_id = " . $gameId. "";
$result = mysqli_query($conn, $sql);

if($homeScore > $awayScore){
	$sql = "UPDATE teams
	SET wins = wins + 1 
	WHERE team_num = " . $homeId. "";
	$result = mysqli_query($conn, $sql);

	$sql = "UPDATE teams
	SET losses = losses + 1 
	WHERE team_num = " . $awayId. "";
	$result = mysqli_query($conn, $sql);

	echo '' . $homeTeam . ' ' . $homeScore . ' - ' .
		$awayTeam . ' ' . $awayScore;
}
else {
	$sql = "UPDATE teams
	SET wins = wins + 1 
	WHERE team_num = " . $awayId. "";
	$result = mysqli_query($conn, $sql);

	$sql = "UPDATE teams
	SET losses = losses + 1 
	WHERE team_num = " . $homeId. "";
	$result = mysqli_query($conn, $sql);

	echo '' . $awayTeam . ' ' . $awayScore . ' - ' .
		$homeTeam . ' ' . $homeScore;
}

$conn->close();

?>