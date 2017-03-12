<?php

include __DIR__ . '/../DBConnect.php';
session_start();

$poolId = $_POST["pool"];
$manager = $_SESSION['email'];
$invitees = $_POST["invitees"];

$success = true;


foreach($invitees as $invitee){
    if($invitee == null){
        $success = false;
    }

    $sql = "SELECT invite_id
            FROM invites
            WHERE recipient_id = '$invitee' AND pool_id = $poolId";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        echo "<div class='alert alert-warning alert-dismissible'>
            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Not sent!</strong> $invitee was already sent an invite
        </div>";
        $success = false;
    }

    $sql = "SELECT pool_id
            FROM scores
            WHERE user = '$invitee'
            AND pool_id = $poolId";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        echo "<div class='alert alert-warning alert-dismissible'>
            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Not sent!</strong> $invitee already belongs to this pool
        </div>";
        $success = false;
    }


	if($success){
        $sql = "INSERT INTO invites(manager_id, recipient_id, pool_id)
                VALUES('$manager', '$invitee', $poolId)";
        if(!mysqli_query($conn, $sql)){
            echo "<div class='alert alert-warning alert-dismissible'>
                <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Sorry!</strong> $invitee is not a NFL-Picks user
            </div>";
            $success = false;
        }
        else{
            echo "<div class='alert alert-success alert-dismissible'>
                <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Success!</strong> Invite sent to $invitee
            </div>";
        }
    }
    $success = true;
}

?>