<?php
$title = 'Invites';
$page = 'Profile';
include 'header.php';
?>
<?php

$sql = "UPDATE invites
		SET was_read = 1
		WHERE recipient_id = '$user'";
mysqli_query($conn, $sql);

$sql = "SELECT manager_id, pool_id, was_read
		FROM invites
		WHERE recipient_id = '$user'";

$result = mysqli_query($conn, $sql);

?>
<div class="panel panel-default panel-primary">
	<div class="panel-heading">Invites</div>
	<div class="panel-body">
		<?php if (mysqli_num_rows($result) > 0) { ?>
		<table class="table table-hover">
            <thead>
            <tr>
                <th>Pool</th>
                <th>Sent By</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            	while($row = mysqli_fetch_assoc($result)) {
            		$manager = $row['manager_id'];
            		$poolId = $row['pool_id'];

            		$sql = "SELECT nickname
            				FROM users
            				WHERE email = '$manager'";
            		$mgrResult = mysqli_query($conn, $sql);
            		$mgrRow = mysqli_fetch_assoc($mgrResult);
            		$mgrNickname = $mgrRow["nickname"];

            		$sql = "SELECT pool_name, pool_image
            				FROM pools
            				WHERE pool_id = $poolId";
            		$poolResult = mysqli_query($conn, $sql);
            		$poolRow = mysqli_fetch_assoc($poolResult);
            		$poolName = $poolRow["pool_name"];
            		$poolImg = $poolRow["pool_image"];

            		echo "<tr>";
    				echo "<td><img hspace='5' WIDTH='30' src='data:image/jpeg;base64," . base64_encode( $poolImg ) . 
    						"'/><a href='pool_view.php?pool=" . $poolId . "'>" . $poolName . "</a></td>";
    				echo "<td>" . $mgrNickname . "</td>";
    				echo "</tr>";
    			}
            ?>
        	</tbody>
        </table>
    	<?php } else { ?>
    	<div class="alert alert-warning alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>No Invites!</strong> You have no invites
        </div>
        <?php } ?>
	</div>
</div>
<?php include "footer.php"; ?>