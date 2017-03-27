<?php
include __DIR__ . '/../DBConnect.php';

$email = $_POST["email"];
$a1 = $_POST["a1"];
$a2 = $_POST['a2'];

$sql = "";//enter the sql to check the answers and retrieve the password here


$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_assoc($result);

	$password = $row["password"];

	echo $password;
}
else{
	echo "error";
}





?>