<?php
$title = 'Pools';
$page = 'Pools';
include 'header.php';
?>
<?php

$poolId = $_GET["pool"];

$sql = "SELECT pool_name, pool_image, buy_in, total_pot, manager
		FROM pools
		WHERE pool_id = $poolId";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$manager = $row["manager"];


?>
<div class="panel panel-default panel-primary">
	<div class="panel-heading">Pool Info</div>
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
        		echo "<tr>";
				echo "<td><img hspace='5' WIDTH='30' src='data:image/jpeg;base64," . base64_encode( $row["pool_image"] ) . 
						"'/>" . $row["pool_name"] . "</td>";
				echo "<td>" . $row["buy_in"] . "</td>";
				echo "<td>" . $row["total_pot"] . "</td>";
				echo "</tr>";
            ?>
        	</tbody>
        </table>
        <?php } else { ?>
    	<div class="alert alert-warning alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>No Info!</strong> Cannot find information for this pool
        </div>
        <?php } ?>
	</div>
</div>
<?php

$sql = "SELECT user, total_score
		FROM picks
		WHERE pool_id = $poolId
		ORDER BY total_score DESC";

$result = mysqli_query($conn, $sql);

?>
<div class="panel panel-default panel-primary">
	<div class="panel-heading">Scoreboard
		<div class="pull-right">
            <?php if ($user === $manager) { ?>
                <button class="btn btn-success btn-sm" data-toggle='modal' data-target='#inviteMembers' 
                	data-yourParameter='<?php echo $poolId; ?>'>
                    Invite Members <span class="glyphicon glyphicon-plus">
                </button>
            <?php } ?>
        </div>
        <div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<?php if (mysqli_num_rows($result) > 0) { ?>
		<table class="table table-hover">
            <thead>
            <tr>
                <th>Member</th>
                <th>Points</th>
            </tr>
            </thead>
            <tbody>
            <?php
            	while($row = mysqli_fetch_assoc($result)) {
            		$member = $row["user"];

            		$sql = "SELECT nickname, prof_pic
            				FROM users
            				WHERE email = '$member'";

            		$memberResult = mysqli_query($conn, $sql);

            		$memberRow = mysqli_fetch_assoc($memberResult);

            		$nickname = $memberRow["nickname"];
            		$member_pic = $memberRow["prof_pic"];

            		echo "<tr>";
    				echo "<td><img hspace='5' WIDTH='30' src='data:image/jpeg;base64," . base64_encode( $member_pic ) . 
    						"'/><a href='member_picks.php?pool=" . $poolId . "&member=" . $member . 
    						"'>" . $nickname . "</a></td>";
    				echo "<td>" . $row["total_score"] . "</td>";
    				echo "</tr>";
    			}
            ?>
        	</tbody>
        </table>
    	<?php } else { ?>
    	<div class="alert alert-warning alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>No Members!</strong> This pool has no members
        </div>
        <?php } ?>
	</div>
</div>
<div id="inviteMembers" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title edit-content">Invite Members</h4>
            </div>
            <div class="modal-body">
            	<form action="javascript:invite()" data-toggle="validator" role="form">
            		<div id="emails" class="form-group">
				        <input name="invite1" type="email" id="invite1" class="form-control" 
				        		placeholder="Email of Invitee"/>
            		</div>
            		<div class="form-group">
            			<a href="#" onclick="addFields()">+ Add Invitee</a>
            			<input name="poolId" id="poolId" type="number" class="form-control" style="visibility:hidden;"/>
            		</div>
            		<div class="form-group">
            			<input class="btn btn-primary" type="submit" name="submit" value="Invite"/>
            		</div>
            	</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	var fieldNum = 1;
	
	$(document).ready(function(){
		$('#inviteMembers').on('shown.bs.modal', function(e) {
			$('#invite1').focus();
			var $modal = $(this);
	  		var poolId = e.relatedTarget.dataset.yourparameter;
	  		console.log(poolId);
	  		document.getElementById("poolId").value = poolId;
		});
	});

	function addFields(){
		fieldNum++;
	    var  emails = document.getElementById('emails')
	    var email = document.createElement("input");
	    email.name = "invite" + fieldNum;
	    email.type = "email";
	    email.id = "invite" + fieldNum;
	    email.className = "form-control";
	    email.style.marginTop = '10px';
	    email.placeholder = "Email of Invitee";

	    emails.appendChild(email);
	}

	function invite() {
        var poolId = document.getElementById("poolId").value;
        var invitees = [];

        for(var i=1; i <= fieldNum; i++){
        	var field = "invite" + i;
        	var invitee = document.getElementById(field).value;
        	invitees.push(invitee);
        }

        $.ajax({
		   type: "POST",
		   data: {invitees: invitees,
		   		  pool: poolId},
		   url: "invite.php",
		   success: function(msg){
		     $('.modal-body').html(msg);
		   }
		});
    }
</script>
<?php include "footer.php"; ?>