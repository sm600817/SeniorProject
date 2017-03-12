<?php
$title = 'Pools';
$page = 'My Pools';
include 'header.php';
?>
<?php

$sql = "SELECT pool_id, pool_name, pool_image, buy_in, total_pot
		FROM pools
		WHERE manager = '$user'";

$mgrResult = mysqli_query($conn, $sql);

$sql = "SELECT pool_id, total_score
		FROM scores
		WHERE user = '$user'";

$poolResult = mysqli_query($conn, $sql);

?>
<div class="panel panel-default panel-primary">
	<div class="panel-heading">My Pools</div>
	<div class="panel-body">
		<div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#memberTab" role="tab"
                    data-toggle="tab">Member</a></li>
                <li role="presentation"><a href="#managingTab" role="tab"
                    data-toggle="tab">Managing</a></li>
            </ul>
            <div class="tab-content">
            	<div id="memberTab" role="tabpanel" class="tab-pane active">
			    	<?php if (mysqli_num_rows($poolResult) > 0) { ?>
					<table class="table table-hover">
			            <thead>
			            <tr>
			                <th>Pool</th>
			                <th>My Points</th>
			                <th>Total Pot</th>
			            </tr>
			            </thead>
			            <tbody>
			            <?php
			            	while($poolRow = mysqli_fetch_assoc($poolResult)) {
			            		$score = $poolRow['total_score'];
			            		$pool = $poolRow['pool_id'];

			            		$sql = "SELECT pool_id, pool_name, pool_image, buy_in, total_pot
										FROM pools
										WHERE pool_id = $pool";

								$memResult = mysqli_query($conn, $sql);
								$memRow = mysqli_fetch_assoc($memResult);


			            		echo "<tr>";
			    				echo "<td><img hspace='5' WIDTH='30' src='data:image/jpeg;base64," . base64_encode( $memRow["pool_image"] ) . 
			    						"'/><a href='pool_view.php?pool=" . $memRow["pool_id"] . "'>" . $memRow["pool_name"] . "</a></td>";
			    				echo "<td>" . $score . "</td>";
			    				echo "<td>" . $memRow["total_pot"] . "</td>";
			    				echo "</tr>";
			    			}
			            ?>
			        	</tbody>
			        </table>
			    	<?php } else { ?>
			    	<div class="alert alert-warning alert-dismissible">
			            <strong>No Pools!</strong> You are not a member in any pools
			        </div>
			        <?php } ?>
			    </div>
            	<div id="managingTab" role="tabpanel" class="tab-pane">
					<?php if (mysqli_num_rows($mgrResult) > 0) { ?>
					<table class="table table-hover">
			            <thead>
			            <tr>
			                <th>Pool</th>
			                <th>Buy In</th>
			                <th>Total Pot</th>
			            </tr>
			            </thead>
			            <tbody>
			            <?php
			            	while($mgrRow = mysqli_fetch_assoc($mgrResult)) {
			            		echo "<tr>";
			    				echo "<td><img hspace='5' WIDTH='30' src='data:image/jpeg;base64," . base64_encode( $mgrRow["pool_image"] ) . 
			    						"'/><a href='pool_view.php?pool=" . $mgrRow["pool_id"] . "'>" . $mgrRow["pool_name"] . "</a></td>";
			    				echo "<td>" . $mgrRow["buy_in"] . "</td>";
			    				echo "<td>" . $mgrRow["total_pot"] . "</td>";
			    				echo "</tr>";
			    			}
			            ?>
			        	</tbody>
			        </table>
			    	<?php } else { ?>
			    	<div class="alert alert-warning alert-dismissible">
			            <strong>No Pools!</strong> You are not managing any pools
			        </div>
			        <?php } ?>
			    </div>
			</div>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>