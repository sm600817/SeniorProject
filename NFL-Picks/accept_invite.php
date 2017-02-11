<?php

include __DIR__ . '/../DBConnect.php';
session_start();

$inviteId = $_POST["invite"];

$sql = "SELECT pool_id, recipient_id
        FROM invites
        WHERE invite_id = $inviteId";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$poolId = $row['pool_id'];
$recipient = $row['recipient_id'];

$sql = "INSERT INTO picks(pool_id, user, total_score) 
                VALUES ($poolId, '$recipient', 0)";
if(mysqli_query($conn, $sql)){
    $sql = "DELETE FROM invites
            WHERE invite_id = $inviteId";
    mysqli_query($conn, $sql);
    echo "<div class='span4 offset4 alert alert-success alert-dismissible'>
            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Accepted!</strong> You are now a member of this pool
        </div>";
}
else {
    echo "<div class='alert alert-warning alert-dismissible'>
            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Sorry!</strong> There was a problem accepting the invite
        </div>";
}

?>