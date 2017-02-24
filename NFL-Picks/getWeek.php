<?php

include __DIR__ . '/../DBConnect.php';
session_start();
$user  = $_SESSION['email'];

if(!empty($_POST["week"])){

	echo "<table class='table table-striped' style='table-layout: fixed;'>
			<thead>
	            <tr>
	                <th></th>
	                <th></th>
	                <th></th>
	            </tr>
			</thead>
			<tbody>";

	$week = $_POST["week"];
	$pool = $_POST["pool"];

	$sql = "SELECT week_id, was_played, game1, game2, game3, game4, game5, game6, game7, game8,
					game9, game10, game11, game12, game13, game14, game15, game16
				FROM weeks
				WHERE week_id = '" . $week . "'";

	//this is where your SQL Statement runs
	$result = mysqli_query($conn, $sql);
	$game = 1;

	if (mysqli_num_rows($result) > 0) {
		$week_row = mysqli_fetch_assoc($result);
		$played = $week_row["was_played"];


		if($played > 0){
			$sql = "SELECT team
				FROM picks
				WHERE user = '$user' 
				AND pool_id = $pool
				AND week = $week";
			$pick_result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($pick_result) > 0) {
				$pick_row = mysqli_fetch_assoc($pick_result);
				$pick = $pick_row["team"];			
			}
			else{
				$pick = 0;
			}

			while($game < 17){
				$gameStr = "game" . $game;

				$sql = "SELECT game_id, home_team, away_team, home_score, away_score
						FROM games
						WHERE game_id = " . $week_row[$gameStr];

				$game_result = mysqli_query($conn, $sql);

				if($game_result != NULL){

					if (mysqli_num_rows($game_result) > 0) {
						$game_row = mysqli_fetch_assoc($game_result);

						$game_id = $game_row["game_id"];

						$homeTeam_id = $game_row["home_team"];
						$homeScore = $game_row["home_score"];

						$awayTeam_id = $game_row["away_team"];
						$awayScore = $game_row["away_score"];

						$sql = "SELECT team_num, team_name
							FROM teams
							WHERE team_num = " . $awayTeam_id;
						$away_result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($away_result) > 0) {
							$team_row = mysqli_fetch_assoc($away_result);

							$awayTeam = $team_row["team_name"];
							$awayId = $team_row["team_num"];
						}

						$sql = "SELECT team_num, team_name
							FROM teams
							WHERE team_num = " . $homeTeam_id;
						$home_result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($home_result) > 0) {
							$team_row = mysqli_fetch_assoc($home_result);

							$homeTeam = $team_row["team_name"];
							$homeId = $team_row["team_num"];
						}

						if ($pick == $awayTeam_id) {
							if($awayScore > $homeScore){
								echo "<tr id='$game_id' class='success'>
										<td><label class='radio-inline'><strong>* $awayTeam</strong></label></td>
										<td><label style='padding-left: 15px; padding-right: 15px;'>$awayScore - $homeScore</label></td>
										<td><label class='radio-inline'>$homeTeam</label></td>
									  </tr>";
							}
							else {
								echo "<tr id='$game_id' class='danger'>
										<td><label class='radio-inline'><strong>* $awayTeam</strong></label></td>
										<td><label style='padding-left: 15px; padding-right: 15px;'>$awayScore - $homeScore</label></td>
										<td><label class='radio-inline'>$homeTeam</label></td>
									  </tr>";
							}
						}
						else if($pick == $homeTeam_id){
							if($homeScore > $awayScore){
								echo "<tr id='$game_id' class='success'>
										<td><label class='radio-inline'>$awayTeam</label></td>
										<td><label style='padding-left: 15px; padding-right: 15px;'>$awayScore - $homeScore</label></td>
										<td><label class='radio-inline'><strong>* $homeTeam</strong></label></td>
									  </tr>";
							}
							else {
								echo "<tr id='$game_id' class='danger'>
										<td><label class='radio-inline'>$awayTeam</label></td>
										<td><label style='padding-left: 15px; padding-right: 15px;'>$awayScore - $homeScore</label></td>
										<td><label class='radio-inline'><strong>* $homeTeam</strong></label></td>
									  </tr>";
							}
						}
						else{
							echo "<tr id='$game_id' >
									<td><label class='radio-inline'>$awayTeam</label></td>
									<td><label style='padding-left: 15px; padding-right: 15px;'>$awayScore - $homeScore</label></td>
									<td><label class='radio-inline'>$homeTeam</label></td>
								  </tr>";
						}

					}
				}
				$game++;
			}
		}
		else {
			while($game < 17){
				$gameStr = "game" . $game;

				$sql = "SELECT game_id, home_team, away_team, home_score, away_score
						FROM games
						WHERE game_id = " . $week_row[$gameStr];

				$game_result = mysqli_query($conn, $sql);

				if($game_result != NULL){

					if (mysqli_num_rows($game_result) > 0) {
						$game_row = mysqli_fetch_assoc($game_result);

						$game_id = $game_row["game_id"];

						$homeTeam_id = $game_row["home_team"];
						$homeScore = $game_row["home_score"];

						$awayTeam_id = $game_row["away_team"];
						$awayScore = $game_row["away_score"];

						$sql = "SELECT team_num, team_name, wins, losses, ties
							FROM teams
							WHERE team_num = " . $awayTeam_id;
						$away_result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($away_result) > 0) {
							$team_row = mysqli_fetch_assoc($away_result);

							$awayTeam = $team_row["team_name"];
							$awayId = $team_row["team_num"];
							$awayWs = $team_row["wins"];
							$awayLs = $team_row["losses"];
							$awayTies = $team_row["ties"];
						}

						$sql = "SELECT team_num, team_name, wins, losses, ties
							FROM teams
							WHERE team_num = " . $homeTeam_id;
						$home_result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($home_result) > 0) {
							$team_row = mysqli_fetch_assoc($home_result);

							$homeTeam = $team_row["team_name"];
							$homeId = $team_row["team_num"];
							$homeWs = $team_row["wins"];
							$homeLs = $team_row["losses"];
							$homeTies = $team_row["ties"];
						}
					}

					$sql = "SELECT pts_assigned
							FROM picks
							WHERE user = '$user' 
							AND pool_id = $pool
							AND week = $week
							AND game = $game_id
							AND team = $awayTeam_id";
					$awayPickWeek_result = mysqli_query($conn, $sql);

					$sql = "SELECT pts_assigned
							FROM picks
							WHERE user = '$user' 
							AND pool_id = $pool
							AND week = $week
							AND game = $game_id
							AND team = $homeTeam_id";
					$homePickWeek_result = mysqli_query($conn, $sql);

					$sql = "SELECT team, pts_assigned
							FROM picks
							WHERE user = '$user' 
							AND pool_id = $pool
							AND team = $awayTeam_id";
					$awayPick_result = mysqli_query($conn, $sql);

					$sql = "SELECT team, pts_assigned
							FROM picks
							WHERE user = '$user' 
							AND pool_id = $pool
							AND team = $homeTeam_id";
					$homePick_result = mysqli_query($conn, $sql);

					if(mysqli_num_rows($awayPickWeek_result) > 0){
						$awayPick_row = mysqli_fetch_assoc($awayPickWeek_result);
						$away_ptsAssigned = $awayPick_row['pts_assigned'];
						if($away_ptsAssigned == 0){
							echo "<tr id='$game_id' >
								<td><label class='radio-inline'><input checked='checked' type='radio' name='pick' value='$awayTeam_id'>$awayTeam ($awayWs-$awayLs-$awayTies)</label></td>
								<td><label style='padding-left: 15px; padding-right: 15px;'>at</label></td>
								<td><label class='radio-inline'><input type='radio' name='pick' value='$homeTeam_id'>$homeTeam ($homeWs-$homeLs-$homeTies)</label></td>
							  </tr>";
						}
					}
					else if(mysqli_num_rows($homePickWeek_result) > 0){
						$homePick_row = mysqli_fetch_assoc($homePickWeek_result);
						$home_ptsAssigned = $homePick_row['pts_assigned'];
						if($home_ptsAssigned == 0){
							echo "<tr id='$game_id' >
								<td><label class='radio-inline'><input type='radio' name='pick' value='$awayTeam_id'>$awayTeam ($awayWs-$awayLs-$awayTies)</label></td>
								<td><label style='padding-left: 15px; padding-right: 15px;'>at</label></td>
								<td><label class='radio-inline'><input checked='checked' type='radio' name='pick' value='$homeTeam_id'>$homeTeam ($homeWs-$homeLs-$homeTies)</label></td>
							  </tr>";
						}
					}
					else if (mysqli_num_rows($homePick_result) > 0 && mysqli_num_rows($awayPick_result) > 0) {
						echo "<tr id='$game_id' class='danger'>
								<td><label class='radio-inline'>$awayTeam ($awayWs-$awayLs-$awayTies)</label></td>
								<td><label style='padding-left: 15px; padding-right: 15px;'>at</label></td>
								<td><label class='radio-inline'>$homeTeam ($homeWs-$homeLs-$homeTies)</label></td>
							  </tr>";
					}
					else if(mysqli_num_rows($awayPick_result) > 0) {
						echo "<tr id='$game_id' class='warning'>
								<td><label class='radio-inline'>$awayTeam ($awayWs-$awayLs-$awayTies)</label></td>
								<td><label style='padding-left: 15px; padding-right: 15px;'>at</label></td>
								<td><label class='radio-inline'><input type='radio' name='pick' value='$homeTeam_id'>$homeTeam ($homeWs-$homeLs-$homeTies)</label></td>
							  </tr>";
					}
					else if(mysqli_num_rows($homePick_result) > 0) {
						echo "<tr id='$game_id' class='warning'>
								<td><label class='radio-inline'><input type='radio' name='pick' value='$awayTeam_id'>$awayTeam ($awayWs-$awayLs-$awayTies)</label></td>
								<td><label style='padding-left: 15px; padding-right: 15px;'>at</label></td>
								<td><label class='radio-inline'>$homeTeam ($homeWs-$homeLs-$homeTies)</label></td>
							  </tr>";
					}
					else {
						echo "<tr id='$game_id' >
								<td><label class='radio-inline'><input type='radio' name='pick' value='$awayTeam_id'>$awayTeam ($awayWs-$awayLs-$awayTies)</label></td>
								<td><label style='padding-left: 15px; padding-right: 15px;'>at</label></td>
								<td><label class='radio-inline'><input type='radio' name='pick' value='$homeTeam_id'>$homeTeam ($homeWs-$homeLs-$homeTies)</label></td>
							  </tr>";
					}
				}
				$game++;
			}

		}

	}
	else {
		return false;
	}
	echo "	</tbody>
		</table>";
	$conn->close();
}

?>