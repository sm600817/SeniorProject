<?php

include 'DBConnect.php';

$awayId = $_GET["awayId"];
$homeId = $_GET["homeId"];

$sql = "SELECT Name, offPct
		FROM team
		WHERE teamId = " . $awayId;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	$team_row = mysqli_fetch_assoc($result);

	$awayTeam = $team_row["Name"];
	$awayOff = $team_row["offPct"];
}

$sql = "SELECT Name, offPct
	FROM team
	WHERE teamId = " . $homeId;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	$team_row = mysqli_fetch_assoc($result);

	$homeTeam = $team_row["Name"];
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

if($homeScore > $awayScore){
	echo '' . $homeTeam . ' ' . $homeScore . ' - ' .
		$awayTeam . ' ' . $awayScore;
}
else {
	echo '' . $awayTeam . ' ' . $awayScore . ' - ' .
		$homeTeam . ' ' . $homeScore;
}

$conn->close();

?>