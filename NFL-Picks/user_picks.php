<?php

$title = 'user_picks';
$page = 'user_picks';
include 'header.php';    

?>

<?php 

$poolId = $_POST["pool"];

$sql = "SELECT pool_name
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


$sql = "SELECT nickname, prof_pic
        FROM users
        WHERE email = '$member'";

$userResult = mysqli_query($conn, $sql);
$userRow = mysqli_fetch_assoc($userResult);

$sql = "SELECT total_score
		FROM scores
		WHERE pool_id = $poolId
		AND user = '$member'";
$scoreResult = mysqli_query($conn, $sql);
$scoreRow = mysqli_fetch_assoc($scoreResult);

?>

<!-- 		if (mysqli_num_rows($result) > 0) -->

<div class="panel panel-default panel-primary" id="pool_info">
	<div class="panel-heading">User Info</div>
	<div class="panel-body">
		<?php if (mysqli_num_rows($result) > 0) {
            
            echo "<div class='row>";
            echo "<div class='header_image clearfix'>";
            echo "<img style='float:left;' hspace='5' WIDTH='75' src='data:image/jpeg;base64," . base64_encode( $userRow["prof_pic"] ) . "'/>";
            echo "<h2 style='float:left;'>" . $userRow["nickname"] . "</h2>";
            echo "</div>";
            echo "<div class='pull-right'>";
            echo "<span style='float:left; clear:left; font-size:15px;'><strong>Pool: </strong><a href='pool_view.php?pool=" . $poolId . "'>" . $poolName . "</a></span>";
			echo "<span style='float:left; clear:left; font-size:15px;'><strong>Total Points: </strong>" . $scoreRow["total_score"] . "</span>";
            echo "</div>";
    
        } else { ?>
    	<div class="alert alert-warning alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>No Info!</strong> Cannot find information for this user
        </div>
        <?php } ?>
	</div>
</div>

<!-- EVERYTHING BELOW GOOD(except i need an if statment) -->
<div class="panel panel-default panel-primary">
	<div class="panel-heading">Picks</div>
	<div class="panel-body">
		<div role="tabpanel">
            <div class="tab-content">
            	<div id="userpicks" role="tabpanel" class="tab-pane active">
			    	<?php if (mysqli_num_rows($pickResult) > 0) { ?>
					<table class="table table-hover">
			            <thead>
			            <tr>
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
