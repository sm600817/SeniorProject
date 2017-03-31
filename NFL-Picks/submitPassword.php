<?php
include __DIR__ . '/../DBConnect.php';

$email = $_POST["email"];

//encrypt password
$password = $_POST["password"];
$cost = 10;
$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
$salt = sprintf("$2a$%02d$", $cost) . $salt;
$hash = crypt($password, $salt);

$sql = "UPDATE users
        SET password = '$hash'
        WHERE email = '$email'";

if (mysqli_query($conn, $sql)){
	echo "<div class='alert alert-success alert-dismissible'>
            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Success!</strong> Your password was reset
          </div>";
}
else{
	echo "<div class='alert alert-danger alert-dismissible'>
            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Sorry!</strong> There was a problem resetting your password
          </div>";
}

?>