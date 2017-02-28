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

$member = $_POST["member"];

/*
Figure out the following where clause
WHERE user = $member
*/

$sql = "SELECT pool_id, week, game, team
        FROM picks";

/*
Join tables

$sql = "SELECT pool_name
        FROM pools";

$sql = "SELECT team_name
        FROM teams";
*/

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
			                <th>Credits Won</th>
			            </tr>
			            </thead>
			            <tbody>
			            <?php
			            	while($pickRow = mysqli_fetch_assoc($pickResult)) {
			            		
                                /*
                                TODO:
                                1.Replace $creditsWon = $pickRow['game'];
                                with the actual amount of credits won
                                
                                2. replace pool_id with pool name
                                
                                3. replace team with team name
                                */
                                $poolName = $pickRow['pool_id'];
                                $weekNum = $pickRow['week'];
			            		$teamPicked = $pickRow['team'];
                                $creditsWon = $pickRow['game'];

                                
			            		echo "<tr>";
                                echo "<td>" . $poolName . "</td>";
			    				echo "<td>" . $weekNum . "</td>";
                                echo "<td>" . $teamPicked . "</td>";
			    				echo "<td>" . $creditsWon . "</td>";
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
