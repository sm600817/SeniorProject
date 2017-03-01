<?php

include __DIR__ . '/../DBConnect.php';

$week = $_GET['week'];

$sql = "SELECT user, pool_id, week, game, team, pts_assigned
		FROM picks
		WHERE week = $week";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
		$user = $row['user'];
		$pool = $row['pool_id'];
		$game = $row['game'];
		$team = $row['team'];
		$pts_assigned = $row['pts_assigned'];

		if($pts_assigned == 0){
			$sql = "SELECT game_id, home_team, away_team, home_score, away_score
				FROM games
				WHERE game_id = $game";

			$game_result = mysqli_query($conn, $sql);
			$game_row = mysqli_fetch_assoc($game_result);

			$homeId = $game_row['home_team'];
			$homeScore = $game_row['home_score'];

			$awayId = $game_row['away_team'];
			$awayScore = $game_row['away_score'];

			if($team == $homeId){
				if($homeScore > $awayScore){
					$sql = "UPDATE scores
							SET total_score = total_score + $homeScore
							WHERE pool_id = $pool
							AND user = '$user'";
					mysqli_query($conn, $sql);
				}
			}
			if($team == $awayScore){
				if($awayScore > $homeScore){
					$sql = "UPDATE scores
							SET total_score = total_score + $awayScore
							WHERE pool_id = $pool
							AND user = '$user'";
					mysqli_query($conn, $sql);
				}
			}

			$sql = "UPDATE picks
					SET pts_assigned = 1
					WHERE user = '$user' 
					AND pool_id = $pool
					AND week = $week";
			mysqli_query($conn, $sql);
		}

	}

	echo "All points have been assigned";
}
else{
	echo "There was a problem assigning points";
}

?>