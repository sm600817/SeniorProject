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
							SET total_score = total_score + $homeScore, correct_picks = correct_picks + 1
							WHERE pool_id = $pool
							AND user = '$user'";
					mysqli_query($conn, $sql);
				}
			}
			if($team == $awayId){
				if($awayScore > $homeScore){
					$sql = "UPDATE scores
							SET total_score = total_score + $awayScore, correct_picks = correct_picks + 1
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
	$sql = "UPDATE weeks
			SET was_played = 1
			WHERE week_id = $week";
	mysqli_query($conn, $sql);

	if($week == 17){
		$sql = "SELECT pool_id, total_pot
				FROM pools";
		$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_assoc($result)){
			$most = -1;
			$second_most = -1;
			$thrid_most = -1;

			$winner1 = null;
			$winner2 = null;
			$winner3 = null;

			$winner1_array = array();
			$winner2_array = array();
			$winner3_array = array();

			$pool = $row["pool_id"];
			$total_pot = $row["total_pot"];

			$first_prize = $total_pot * .60;
			$second_prize = $total_pot * .30;
			$third_prize = $total_pot * .10;

			$sql = "SELECT user, total_score, correct_picks 
					FROM scores s1 
					WHERE (1 - 1) =
						(SELECT COUNT(DISTINCT (total_score)) 
						 FROM scores s2 
						 WHERE s2.total_score > s1.total_score
						 AND pool_id = $pool) 
					AND pool_id = $pool
					ORDER BY correct_picks DESC";
			$first_result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($first_result) > 1){
				while($first_row = mysqli_fetch_assoc($first_result)){
					$correct = $first_row["correct_picks"];
					$user = $first_row["user"];
					if($correct > $most){
						$third_most = $second_most;
						$winner3 = $winner2;

						$second_most = $most;
						$winner2 = $winner1;

						$most = $correct;
						$winner1 = $user;
					}
					else if($correct == $most){
						array_push($winner1_array, $user);
					}
					else if($correct > $second_most){
						$third_most = $second_most;
						$winner3 = $winner2;

						$second_most = $correct;
						$winner2 = $user;
					}
					else if($correct == $second_most){
						array_push($winner2_array, $user);
					}
					else if($correct > $third_most){
						$third_most = $correct;
						$winner3 = $user;
					}
					else if($correct == $third_most){
						array_push($winner3_array, $user);
					}
				}
			}
			else{
				$first_row = mysqli_fetch_assoc($first_result);
				$winner1 = $first_row["user"];
			}
			if(!isset($winner2) && count($winner1_array) < 2){
				$sql = "SELECT user, total_score, correct_picks 
						FROM scores s1 
						WHERE (2 - 1) =
							(SELECT COUNT(DISTINCT (total_score)) 
							 FROM scores s2 
							 WHERE s2.total_score > s1.total_score
							 AND pool_id = $pool) 
						AND pool_id = $pool
						ORDER BY correct_picks DESC";
				$second_result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($second_result) > 1){
					while($second_row = mysqli_fetch_assoc($second_result)){
						$correct = $second_row["correct_picks"];
						$user = $second_row["user"];
						$most = -1;
						$second_most = -1;

						if($correct > $most){
							$second_most = $most;
							$winner3 = $winner2;

							$most = $correct;
							$winner2 = $user;
						}
						else if($correct == $most){
							array_push($winner2_array, $user);
						}
						else if($correct > $second_most){
							$second_most = $correct;
							$winner3 = $user;
						}
						else if($correct == $second_most){
							array_push($winner3_array, $user);
						}
					}
				}
				else{
					$second_row = mysqli_fetch_assoc($second_result);
					$winner2 = $second_row["user"];
				}
			}
			if(!isset($winner3) && count($winner2_array) < 1){
				$sql = "SELECT user, total_score, correct_picks 
						FROM scores s1 
						WHERE (3 - 1) =
							(SELECT COUNT(DISTINCT (total_score)) 
							 FROM scores s2 
							 WHERE s2.total_score > s1.total_score
							 AND pool_id = $pool) 
						AND pool_id = $pool
						ORDER BY correct_picks DESC";
				$third_result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($third_result) > 1){
					while($third_row = mysqli_fetch_assoc($third_result)){
						$correct = $third_row["correct_picks"];
						$user = $third_row["user"];
						$most = -1;

						if($correct > $most){
							$most_correct = $correct;
							$winner3 = $user;
						}
						else if($correct == $most){
							array_push($winner3_array, $user);
						}
					}
				}
				else{
					$third_row = mysqli_fetch_assoc($third_result);
					$winner3 = $third_row["user"];
				}
			}
			if(count($winner1_array) < 2){
				if(count($winner1_array) == 0){
					//give the first place prize to the winner
					$sql = "UPDATE users 
							SET credits = credits + $first_prize
							WHERE email = '$winner1'";
					mysqli_query($conn, $sql);

					if(count($winner2_array) == 0){
						//give the second place prize to the second winner
						$sql = "UPDATE users 
								SET credits = credits + $second_prize
								WHERE email = '$winner2'";
						mysqli_query($conn, $sql);


						if(count($winner3_array) == 0){
							//give the third place prize to the third winner
							$sql = "UPDATE users 
								SET credits = credits + $third_prize
								WHERE email = '$winner3'";
							mysqli_query($conn, $sql);
						}
						else if(count($winner3_array) > 0){
							//divide the third place prize among all of the third place winners
							$third_count = count($winner3_array) + 1;

							$prize = $third_prize / $third_count;

							$sql = "UPDATE users 
									SET credits = credits + $prize
									WHERE email = '$winner3'";
							mysqli_query($conn, $sql);

							foreach ($winner3_array as $winner) {
								$sql = "UPDATE users 
										SET credits = credits + $prize
										WHERE email = '$winner'";
								mysqli_query($conn, $sql);
							}
						}
					}
					else if(count($winner2_array) > 0){
						//divide the remaining pot among all of the second place winners
						$remainingPot = $total_pot - $first_prize;

						$prize = $remainingPot / (count($winner2_array) + 1);

						$sql = "UPDATE users 
								SET credits = credits + $prize
								WHERE email = '$winner2'";
						mysqli_query($conn, $sql);

						foreach ($winner2_array as $winner) {
							$sql = "UPDATE users 
									SET credits = credits + $prize
									WHERE email = '$winner'";
							mysqli_query($conn, $sql);
						}
					}
				}
				else if(count($winner1_array) == 1){
					//divide 1st place prize between two first place winners
					$prize = $first_prize / 2;

					$sql = "UPDATE users 
							SET credits = credits + $prize
							WHERE email = '$winner1'";
					mysqli_query($conn, $sql);

					foreach ($winner1_array as $winner) {
						$sql = "UPDATE users 
								SET credits = credits + $prize
								WHERE email = '$winner'";
						mysqli_query($conn, $sql);
					}


					if(count($winner2_array) == 0){
						//give the second place prize to the second winner
						$sql = "UPDATE users 
								SET credits = credits + $second_prize
								WHERE email = '$winner2'";
						mysqli_query($conn, $sql);
					}
					else if(count($winner2_array) > 0){
						//divide the remaining pot among all of the second place winners
						$remainingPot = $total_pot - $first_prize;

						$prize = $remainingPot / (count($winner2_array) + 1);

						$sql = "UPDATE users 
								SET credits = credits + $prize
								WHERE email = '$winner2'";
						mysqli_query($conn, $sql);

						foreach ($winner2_array as $winner) {
							$sql = "UPDATE users 
									SET credits = credits + $prize
									WHERE email = '$winner'";
							mysqli_query($conn, $sql);
						}
					}
				}
			}
			else if(count($winner1_array) > 1){
				//divide total pot among all 1st place winners
				$first_count = count($winner1_array) + 1;
				$prize = $total_pot / $first_count;

				$sql = "UPDATE users 
						SET credits = credits + $prize
						WHERE email = '$winner1'";
				mysqli_query($conn, $sql);

				foreach ($winner1_array as $winner) {
					$sql = "UPDATE users 
							SET credits = credits + $prize
							WHERE email = '$winner'";
					mysqli_query($conn, $sql);
				}
			}

			/*echo "Pool $pool:<br>";
			foreach ($winner2_array as $winner) {
				echo "$winner<br>";
			}
			echo "<br><br><br>";
			echo "1st: $winner1 $first_prize<br>";
			echo "2nd: $winner2 $second_prize<br>";
			echo "3rd: $winner3 $third_prize<br><br><br>";*/
		}		

	}

	echo "All points have been assigned";
	
}
else{
	echo "There was a problem assigning points";
}

?>