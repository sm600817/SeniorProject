<?php
$title = 'Pools';
$page = 'Find Pools';
include 'header.php';

?>
<?php

if(isset($_GET["pool-srch"])){
	$src_term = $_GET["pool-srch"];

	if(strpos($src_term, "'")){
			$pos = strpos($src_term, "'");

			$src_term = substr_replace($src_term, "'", $pos, 0);
	}

	$sql = "SELECT pool_id, pool_name, pool_image, manager, buy_in, total_pot
			FROM pools
			WHERE access = 'Public'
			AND pool_name LIKE '%$src_term%'";
}


?>

<div class="text-center">
	<form class="navbar-form" role="search" action="search_pools.php" method="get">
	    <div class="input-group">
	        <input type="text" class="form-control" placeholder="Pool Name" name="pool-src" id="pool-src">
	    </div>
	    <div class="input-group">
	        <input type="text" class="form-control" placeholder="Manager" name="mgr-src" id="mgr-src">
	    </div>
	    <div class="input-group">
	        <input type="checkbox" id="join-check" name="join-check"> Can Join
	    </div>
	</form>
</div>
<div id="results" class="table-responsive">
	<?php
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			echo "<table id='results_table' class='table table-striped' style='table-layout: fixed;'>
					<thead>
			            <tr>
			                <th class='no-sort'>Pool</th>
			                <th class='no-sort'>Manager</th>
			                <th>Buy In</th>
			                <th>Total Pot</th>
			                <th class='no-sort'></th>
			            </tr>
					</thead>
					<tbody>";

			while($row = mysqli_fetch_assoc($result)) {
				$pool_id = $row["pool_id"];
				$pool_image = $row["pool_image"];
				$pool_name = $row["pool_name"];
				$manager = $row["manager"];
				$buy_in = $row["buy_in"];
				$total_pot = $row["total_pot"];

				$sql = "SELECT nickname, prof_pic
            				FROM users
            				WHERE email = '$manager'";

        		$mgrResult = mysqli_query($conn, $sql);

        		$mgrRow = mysqli_fetch_assoc($mgrResult);

        		$mgr = $mgrRow["nickname"];
        		$mgr_pic = $mgrRow["prof_pic"];

        		$inPool = false;
				$sql = "SELECT user
				        FROM scores
				        WHERE pool_id = $pool_id
				        AND user = '$user'";
				$poolResult = mysqli_query($conn, $sql);
				if (mysqli_num_rows($poolResult) > 0){
				    $inPool = true;
				}


				if($credits < $buy_in){
					echo "<tr>";
					echo "<td><img hspace='5' WIDTH='30' src='data:image/jpeg;base64," . base64_encode( $pool_image ) . 
							"'/><a style='cursor:pointer' onClick='showPool($pool_id)'>" . $pool_name . "</a></td>";
					echo "<td><img hspace='5' WIDTH='30' src='data:image/jpeg;base64," . base64_encode( $mgr_pic ) . 
							"'/>" . $mgr . "</td>";
					echo "<td>" . $buy_in . "</td>";
					echo "<td>" . $total_pot . "</td>";
					echo "<td><span class='badge badge-warning'>Need Credits</span></td>";
					echo "</tr>";
				}
				else if($inPool){
					echo "<tr>";
					echo "<td><img hspace='5' WIDTH='30' src='data:image/jpeg;base64," . base64_encode( $pool_image ) . 
							"'/><a style='cursor:pointer' onClick='showPool($pool_id)'>" . $pool_name . "</a></td>";
					echo "<td><img hspace='5' WIDTH='30' src='data:image/jpeg;base64," . base64_encode( $mgr_pic ) . 
							"'/>" . $mgr . "</td>";
					echo "<td>" . $buy_in . "</td>";
					echo "<td>" . $total_pot . "</td>";
					echo "<td><span class='badge badge-success'>Member</span></td>";
					echo "</tr>";
				}
				else{
					echo "<tr>";
					echo "<td><img hspace='5' WIDTH='30' src='data:image/jpeg;base64," . base64_encode( $pool_image ) . 
							"'/><a style='cursor:pointer' onClick='showPool($pool_id)'>" . $pool_name . "</a></td>";
					echo "<td><img hspace='5' WIDTH='30' src='data:image/jpeg;base64," . base64_encode( $mgr_pic ) . 
							"'/>" . $mgr . "</td>";
					echo "<td>" . $buy_in . "</td>";
					echo "<td>" . $total_pot . "</td>";
					echo "<td><button id='joinButton' class='btn btn-primary btn-sm' 
								data-toggle='modal' data-target='#joinPool' data-pool='$pool_id' 
								data-poolname='$pool_name' data-buyin='$buy_in'>
                    			Join</button></td>";
					echo "</tr>";
				}
			}
		}
		else{
			echo "<div class='alert alert-warning alert-dismissible'>
			            <strong>No Results!</strong> No pools match your search
			        </div>";
		}


	?>
		</tbody>
	</table>
</div>
<?php if(isset($_GET["pool-srch"]) && $_GET["pool-srch"] != ""){ ?>
<div class="text-center">
	<form class="navbar-form" role="search" action="search_pools.php" method="get">
        <div class="input-group">
            <input style="display:none" type="text" class="form-control" value="" name="pool-srch" id="pool-srch2">
            <div class="input-group-btn">
                <button class="btn btn-primary" type="submit">Show All</button>
            </div>
        </div>
    </form>
</div>
<?php } ?>
<div id="joinPool" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title edit-content">Confirm</h4>
            </div>
            <div class="modal-body">
                <h3 id="modal_msg"></h3>
                <form action="javascript:join()" data-toggle="validator" role="form">
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="submit" value="Yes, Join"/>
                        <input name="poolId_join" id="poolId_join" type="number" class="form-control" style="display:none;"/>
                        <input name="buyIn" id="buyIn" type="number" class="form-control" style="display:none;"/>
                    </div>
                    <span id="joinMessage" class="hidden"></span>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<script>

$(document).ready(function() {
	var table = $('#results_table').DataTable({
		order: [[3, 'desc']],
		"columnDefs": [
			{ targets: 'no-sort', orderable: false }
		]
	});

	$('#pool-src').on('input',function(e){
		var term = $('#pool-src').val();

		table.columns(0).search(term).draw();
	});

	$('#mgr-src').on('input',function(e){
		var term = $('#mgr-src').val();

		table.columns(1).search(term).draw();
	});

	$('#join-check').change(function(){
		var term = "Join";

		if($('#join-check').is(':checked')){
			table.columns(4).search(term).draw();
		}
		else{
			table.columns(4).search("").draw();
		}
	});

	$('#joinPool').on('shown.bs.modal', function(e) {
			var $modal = $(this);
	  		var poolId = e.relatedTarget.dataset.pool;
	  		var poolName = e.relatedTarget.dataset.poolname;
	  		var buyIn = e.relatedTarget.dataset.buyin;
	  		document.getElementById("modal_msg").innerHTML = "Are you sure you want to join " + poolName + "?";
	  		document.getElementById("poolId_join").value = poolId;
	  		document.getElementById("buyIn").value = buyIn;
	});


});

function join() {
        var poolId = document.getElementById("poolId_join").value;
        var buyIn = document.getElementById("buyIn").value;

        $.ajax({
           type: "POST",
           data: { pool: poolId,
                   buyIn: buyIn },
           url: "join.php",
           success: function(msg){
             if(msg === "success"){
                document.location.reload();
             }
             else{
                $("#joinMessage").removeClass('hidden');
                $('#joinMessage').html(msg);
             }
           }
        });
}


function showPool(pool){
   document.location.href = "/SeniorProject/NFL-Picks/pool_view.php?pool=" + pool;
}



</script>

<?php include "footer.php"; ?>