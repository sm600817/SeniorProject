<?php
$title = 'Pools';
$page = 'Pools';
include 'header.php';
?>
<?php

$user  = $_SESSION['email'];

$sql = "SELECT pool_name, pool_image, buy_in, total_pot
		FROM pools
		WHERE manager = '$user'";

$result = mysqli_query($conn, $sql);

?>
<div class="panel panel-default panel-primary">
	<div class="panel-heading">Managing</div>
	<div class="panel-body">
		<?php if (mysqli_num_rows($result) > 0) { ?>
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
            	while($row = mysqli_fetch_assoc($result)) {
            		echo "<tr>";
    				echo "<td><img hspace='5' WIDTH='30' src='data:image/jpeg;base64," . base64_encode( $row["pool_image"] ) . "'/>" . $row["pool_name"] . "</td>";
    				echo "<td>" . $row["buy_in"] . "</td>";
    				echo "<td>" . $row["total_pot"] . "</td>";
    				echo "</tr>";
    			}
            ?>
        	</tbody>
        </table>
    	<?php } else { ?>
    	<div class="alert alert-warning alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>No Pools!</strong> You are not managing any pools
        </div>
        <?php } ?>
	</div>
</div>



<?php include "footer.php"; ?>