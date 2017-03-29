<?php
include __DIR__ . '/../DBConnect.php';

$email = $_POST["email"];
$a1 = $_POST["a1"];
$a2 = $_POST['a2'];

$sql = "SELECT A1, A2, password
        FROM users
        WHERE email = '$email'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_assoc($result);

	$a1_hash = $row["A1"];
	$a2_hash = $row["A2"];

	if (hash_equals($a1_hash, crypt($a1, $a1_hash)) && hash_equals($a2_hash, crypt($a2, $a2_hash))){
		echo "Reset password";
	}
	else{
		echo "error";
	}
}
else{
	echo "error";
}





?>