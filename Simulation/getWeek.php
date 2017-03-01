<?php

if(!empty($_POST["week"])){

	$week = $_POST["week"];
	
	include __DIR__ . '/../DBConnect.php';

	$sql = "SELECT week_id, game1, game2, game3, game4, game5, game6, game7, game8,
					game9, game10, game11, game12, game13, game14, game15, game16
				FROM weeks
				WHERE week_id = '" . $week . "'";

	//this is where your SQL Statement runs
	$result = mysqli_query($conn, $sql);
	$game = 1;

	if (mysqli_num_rows($result) > 0) {
		$week_row = mysqli_fetch_assoc($result);

		while($game < 17){
			$gameStr = "game" . $game;

			$sql = "SELECT home_team, away_team, home_score, away_score
					FROM games
					WHERE game_id = " . $week_row[$gameStr];

			$result = mysqli_query($conn, $sql);

			if($result != NULL){

				if (mysqli_num_rows($result) > 0) {
					$game_row = mysqli_fetch_assoc($result);

					$homeScore = $game_row["home_score"];
					$awayScore = $game_row["away_score"];

					$sql = "SELECT team_num, team_name
						FROM teams
						WHERE team_num = " . $game_row["away_team"];
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
						$team_row = mysqli_fetch_assoc($result);

						$awayTeam = $team_row["team_name"];
						$awayId = $team_row["team_num"];
					}

					$sql = "SELECT team_num, team_name
						FROM teams
						WHERE team_num = " . $game_row["home_team"];
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
						$team_row = mysqli_fetch_assoc($result);

						$homeTeam = $team_row["team_name"];
						$homeId = $team_row["team_num"];
					}
				}
				if($homeScore > 0 || $awayScore > 0){
					if($homeScore > $awayScore){
						echo '<p>' . $homeTeam . ' ' . $homeScore . ' - ' .
							$awayTeam . ' ' . $awayScore . '</p>';
						echo '<br>';
					}
					else {
						echo '<p>' . $awayTeam . ' ' . $awayScore . ' - ' .
							$homeTeam . ' ' . $homeScore . '</p>';
						echo '<br>';
					}
				}
				else{
					echo "<p id='". $week_row[$gameStr] . "''>" . $awayTeam . " at " . $homeTeam . "</p>";
					echo "<button style='visibility:hidden' id='btn". $game . "'' type='button' onclick='simGame(" . $week . "," . $week_row[$gameStr] . "," . $awayId . ",". $homeId.")'>Simulate</button>";
				}
			}
			$game++;
		}

	}
	else {
		return false;
	}
	$conn->close();
}

?>