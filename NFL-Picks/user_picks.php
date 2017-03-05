<?php

$title = 'user_picks';
$page = 'user_picks';
include 'header.php';    

?>

<?php 

$poolId = $_POST["pool"];

$sql = "SELECT pool_name, pool_image, buy_in, total_pot, manager
		FROM pools
		WHERE pool_id = $poolId";

$result = mysqli_query($conn, $sql);
$poolRow = mysqli_fetch_assoc($result);
$poolName = $poolRow["pool_name"];

$member = $_POST["member"];

$sql = "SELECT pool_id, week, game, team
        FROM picks
        WHERE user = '$member'
            AND pool_id = $poolId";


$pickResult = mysqli_query($conn, $sql);

?>

<div class="panel panel-default panel-primary">
	<div class="panel-heading">My Picks</div>
	<div class="panel-body">
		<div role="tabpanel">
            <div class="tab-content">
            	<div id="userpicks" role="tabpanel" class="tab-pane active">
			    	<?php if (mysqli_num_rows($pickResult) > 0) { ?>
					<table class="table table-hover">
			            <thead>
			            <tr>
			                <th>Pool Name</th>
                            <th>Week Number</th>
			                <th>Team Picked</th>
			                <th>Points</th>
			            </tr>
			            </thead>
			            <tbody>
			            <?php
			            	while($pickRow = mysqli_fetch_assoc($pickResult)) {
			            		
                                $weekNum = $pickRow['week'];
                                
                                $teamNum = $pickRow['team'];
                                $sql = "SELECT team_name, team_logo
                                        FROM teams
                                        WHERE team_num = $teamNum";
                                        

                                $teamResult = mysqli_query($conn, $sql);
                                $teamRow = mysqli_fetch_assoc($teamResult);
                                $teamName = $teamRow["team_name"];
                                $teamLogo = $teamRow["team_logo"];
                                
                                //$scores = $scoresRow[''];
                                
                                $game_id = $pickRow['game'];
                                
                                $sql = "SELECT home_score, away_score
                                        FROM games
                                        WHERE game_id = $game_id";
                                
                                //if statement
                                
			            		echo "<tr height='65'>";
                                echo "<td>" . $poolName . "</td>";
			    				echo "<td>" . $weekNum . "</td>";
                                echo "<td> <img style='float:left;' hspace='5' WIDTH='50' src='data:image/jpeg;base64," . base64_encode( $teamLogo ) . "'/>" .$teamName . "</td>";
			    				echo "<td>" . $game_id . "</td>";
			    				echo "</tr>";
			    			}
			            ?>
			        	</tbody>
			        </table>
			    	<?php } else { ?>
			    	<div class="alert alert-warning alert-dismissible">
			            <strong>No Picks!</strong> Please submit picks
			        </div>
			        <?php } ?>
			    </div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>
