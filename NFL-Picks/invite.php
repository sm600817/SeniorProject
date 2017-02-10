<?php

include __DIR__ . '/../DBConnect.php';
session_start();

$poolId = $_POST["pool"];
$manager = $_SESSION['email'];
$invitees = $_POST["invitees"];

$sucess = true;


foreach($invitees as $invitee){
	$sql = "INSERT INTO invites(manager_id, recipient_id, pool_id)
			VALUES('$manager', '$invitee', $poolId)";
	if(!mysqli_query($conn, $sql)){
		echo "<div class='alert alert-warning alert-dismissible'>
            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Sorry!</strong> There was a problem inviting $invitee
        </div>";
        $sucess = false;
        break;
    }
}

if($sucess){
	echo "<div class='alert alert-success alert-dismissible'>
            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Success!</strong> Your invites were sent
        </div>";
}

?>