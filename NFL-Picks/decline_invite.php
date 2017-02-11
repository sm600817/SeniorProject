<?php

include __DIR__ . '/../DBConnect.php';
session_start();

$inviteId = $_POST["invite"];

$sql = "DELETE FROM invites
            WHERE invite_id = $inviteId";
if(mysqli_query($conn, $sql)){
    echo "<div class='alert alert-warning alert-dismissible'>
            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Declined!</strong> You declined to join this pool
        </div>";
}

?>