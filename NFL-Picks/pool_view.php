<?php
$title = 'Pools';
$page = 'Pools';
include 'header.php';
?>
<?php

$poolId = $_GET["pool"];

$sql = "SELECT pool_name, pool_image, buy_in, total_pot, manager, access
		FROM pools
		WHERE pool_id = $poolId";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$pool_name = $row["pool_name"];
$buy_in = $row["buy_in"];
$manager = $row["manager"];
$access = $row["access"];

$sql = "SELECT nickname FROM users WHERE email = '$manager'";
$mgrResult = mysqli_query($conn, $sql);
$mgrRow = mysqli_fetch_assoc($mgrResult);
$mgr = $mgrRow['nickname'];

$inPool = false;
$sql = "SELECT user
        FROM scores
        WHERE pool_id = $poolId
        AND user = '$user'";
$poolResult = mysqli_query($conn, $sql);
if (mysqli_num_rows($poolResult) > 0){
    $inPool = true;
}

?>
<div class="text-center">
    <ul class="nav nav-pills" style="display: inline-block;">
      <li class="active"><a href="#pool_info">Pool</a></li>
      <?php if($inPool){ ?>
        <li><a href="my_picks.php?pool=<?php echo $poolId; ?>">My Picks</a></li>
      <?php } ?>
    </ul>
</div>
<div class="panel panel-default panel-primary" id="pool_info">
	<div class="panel-heading">Pool Info
        <div class="pull-right">
            <?php if ($user === $manager) { ?>
                <button id="editButton" class="btn btn-info btn-sm" data-toggle='modal' data-target='#editPool'>
                    Edit Pool <span class="glyphicon glyphicon-pencil">
                </button>
            <?php } else if($inPool){ ?>
                <button id="leaveButton" class="btn btn-danger btn-sm" data-toggle='modal' data-target='#leavePool'>
                    Leave Pool <span class="glyphicon glyphicon-log-out">
                </button>
            <?php } ?>
        </div>
        <div class="clearfix"></div>
    </div>
	<div class="panel-body">
		<?php if (mysqli_num_rows($result) > 0) { ?>
            <?php
                echo "<img style='float:left;' hspace='5' WIDTH='100' src='data:image/jpeg;base64," . base64_encode( $row["pool_image"] ) . "'/>";
                echo "<div style='display: inline-block;'>";
                echo "<h2 style='float:left;'>" . $row["pool_name"] . "</h2>";
                if($access == "Private"){
                    echo "<h5><span class='label label-warning'> $access </span></h5>";
                }
                else if($access == "Public"){
                    echo "<h5><span class='label label-success'> $access </span></h5>";
                }
                echo "</div>";
                echo "<div class='pull-right'>";
                echo "<span style='float:left; clear:left; font-size:15px;'><strong>Manager: </strong>" . $mgr . "</span>";
                echo "<span style='float:left; clear:left; font-size:15px;'><strong>Buy In: </strong>" . $row["buy_in"] . " credits</span>";
				echo "<span style='float:left; clear:left; font-size:15px;'><strong>Total Pot: </strong>" . $row["total_pot"] . " credits</span>";
                echo "</div>";
            ?>
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
		FROM scores
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
                $form = 0;
            	while($row = mysqli_fetch_assoc($result)) {
            		$member = $row["user"];

            		$sql = "SELECT nickname, prof_pic
            				FROM users
            				WHERE email = '$member'";

            		$memberResult = mysqli_query($conn, $sql);

            		$memberRow = mysqli_fetch_assoc($memberResult);

            		$nickname = $memberRow["nickname"];
            		$member_pic = $memberRow["prof_pic"];

                    echo "<div style='display:none'>
                            <form id='$form' action='user_picks.php' method='POST' style='display:none'>
                                <input type='number' name='pool' value='$poolId'>
                                <input type='text' name='member' value='$member'>
                            </form>
                          </div>";

            		echo "<tr>";
    				echo "<td><img hspace='5' WIDTH='30' src='data:image/jpeg;base64," . base64_encode( $member_pic ) . 
    						"'/><a style='cursor:pointer' onclick='postData($form)'>" . $nickname . "</a></td>";
    				echo "<td>" . $row["total_score"] . "</td>";
    				echo "</tr>";
                    $form++;
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
<div id="editPool" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title edit-content">Edit Pool</h4>
            </div>
            <div class="modal-body">
                <form data-toggle="validator" id="pool-form" action="<?php $_PHP_SELF ?>" method="post" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="pool_name" id="pool_name" tabindex="1" class="form-control" placeholder="Pool Name" value="<?php echo $pool_name; ?>">
                </div>
                <div class="form-group">
                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                    <input type="file" name="pool_img" id="pool_img" tabindex="4" accept=".png, .jpeg, .gif, .jpg" 
                        class="form-control filestyle" data-buttonBefore="true" data-buttonText="Pool Image" 
                        data-buttonName="btn-info">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" name="pool-submit" id="pool-submit" tabindex="3" class="form-control btn btn-success" value="Update">
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
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
				        		placeholder="Email of Invitee" required>
            		</div>
            		<div class="form-group">
            			<a href="#" onclick="addFields()">+ Invite Another</a>
            			<input name="poolId" id="poolId" type="number" class="form-control" style="visibility:hidden;"/>
            		</div>
            		<div class="form-group">
            			<input class="btn btn-primary" type="submit" name="submit" value="Invite"/>
            		</div>
                    <span id="message" class="hidden"></span>
            	</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="leavePool" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title edit-content">Confirm</h4>
            </div>
            <div class="modal-body">
                <h3>Are you sure you want to leave the pool?</h3>
                <form action="javascript:leave()" data-toggle="validator" role="form">
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="submit" value="Yes, Leave"/>
                        <input name="poolId_leave" id="poolId_leave" type="number" class="form-control" value="<?php echo $poolId; ?>" style="display:none;"/>
                        <input name="buyIn" id="buyIn" type="number" class="form-control" value="<?php echo $buy_in; ?>" style="display:none;"/>
                    </div>
                    <span id="leaveMessage" class="hidden"></span>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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

    function postData(form){
        document.getElementById(form).submit();
    }

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
            if(invitee != null){
                invitees.push(invitee);
            }
        }

        $.ajax({
		   type: "POST",
		   data: {invitees: invitees,
		   		  pool: poolId},
		   url: "invite.php",
		   success: function(msg){
             $("#message").removeClass('hidden');
		     $('#message').html(msg);
		   }
		});
    }

    function leave() {
        var poolId = document.getElementById("poolId_leave").value;
        var buyIn = document.getElementById("buyIn").value;

        $.ajax({
           type: "POST",
           data: { pool: poolId,
                   buyIn: buyIn },
           url: "leave.php",
           success: function(msg){
             if(msg === "my_pools.php"){
                document.location.href = msg;
             }
             else{
                $("#leaveMessage").removeClass('hidden');
                $('#leaveMessage').html(msg);
             }
           }
        });
    }
</script>
<?php
    if(isset($_POST["pool-submit"])){
        $pool_name = $_POST["pool_name"];

        if($_FILES['pool_img']['size'] > 0){
            $tmpName  = $_FILES['pool_img']['tmp_name'];

            $fp      = fopen($tmpName, 'r');
            $content = fread($fp, filesize($tmpName));
            $content = addslashes($content);
            fclose($fp);

            $sql = "UPDATE pools 
                SET pool_name = '$pool_name', pool_image = '$content' 
                WHERE pool_id = $poolId";
        }
        else {
            $sql = "UPDATE pools 
                SET pool_name = '$pool_name' 
                WHERE pool_id = $poolId";
        }

        if(mysqli_query($conn, $sql)){
            $url = "Location: pool_view.php?pool=" . $poolId . "";
            header($url);
        }
        else {
            echo "<div class='alert alert-danger alert-dismissible'>
                    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Error!</strong>" . mysqli_error($conn) . 
                 "</div>";
        }


    }
?>
<?php include "footer.php"; ?>