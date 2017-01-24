<?php

if(!empty($_POST["week"])){

	$week = $_POST["week"];

	include 'DBConnect.php';

	$sql = "SELECT Week, Game1, Game2
				FROM week
				WHERE Week = '" . $week . "'";

	//this is where your SQL Statement runs
	$result = mysqli_query($conn, $sql);
	$game = 1;

	if (mysqli_num_rows($result) > 0) {
		$week_row = mysqli_fetch_assoc($result);

		while($game < 3){
			$gameStr = "Game" . $game;

			$sql = "SELECT HomeTeam, AwayTeam
					FROM game
					WHERE gameId = " . $week_row[$gameStr];

			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				$game_row = mysqli_fetch_assoc($result);

				$sql = "SELECT teamId, Name
					FROM team
					WHERE teamId = " . $game_row["AwayTeam"];
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
					$team_row = mysqli_fetch_assoc($result);

					$awayTeam = $team_row["Name"];
					$awayId = $team_row["teamId"];
				}

				$sql = "SELECT teamId, Name
					FROM team
					WHERE teamId = " . $game_row["HomeTeam"];
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
					$team_row = mysqli_fetch_assoc($result);

					$homeTeam = $team_row["Name"];
					$homeId = $team_row["teamId"];
				}
			}
			echo "<p id='". $game . "''>" . $awayTeam . " at " . $homeTeam . "</p>";
			echo "<button style='visibility:hidden' id='btn". $game . "'' type='button' onclick='simGame(". $game . "," . $awayId . ",". $homeId.")'>Simulate</button>";
			$game++;
		}

	}
	else {
		return false;
	}
	$conn->close();
}

?>