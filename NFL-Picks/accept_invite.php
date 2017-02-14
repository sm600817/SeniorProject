<?php

include __DIR__ . '/../DBConnect.php';
session_start();

$inviteId = $_POST["invite"];
$user  = $_SESSION['email'];

$sql = "SELECT pool_id, recipient_id
        FROM invites
        WHERE invite_id = $inviteId";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$poolId = $row['pool_id'];
$recipient = $row['recipient_id'];

$sql = "INSERT INTO scores(pool_id, user, total_score) 
                VALUES ($poolId, '$recipient', 0)";
if(mysqli_query($conn, $sql)){
    //get buy_in amount
    $sql = "SELECT buy_in
            FROM pools
            WHERE pool_id = $poolId";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $buyIn = $row['buy_in'];

    //add buy_in amount to total pot
    $sql = "UPDATE pools
            SET total_pot = total_pot + $buyIn
            WHERE pool_id = $poolId";
    mysqli_query($conn, $sql);

    //subtract buy_in from user's credits
    $sql = "UPDATE users
            SET credits = credits - $buyIn
            WHERE email = '$user'";
    mysqli_query($conn, $sql);


    $sql = "DELETE FROM invites
            WHERE invite_id = $inviteId";
    mysqli_query($conn, $sql);
    echo "<div class='span4 offset4 alert alert-success alert-dismissible'>
            <strong>Accepted!</strong> You are now a member of this pool
        </div>";
}
else {
    echo "<div class='alert alert-warning alert-dismissible'>
            <strong>Sorry!</strong> There was a problem accepting the invite
        </div>";
}

?>