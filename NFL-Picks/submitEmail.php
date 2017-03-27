<?php
include __DIR__ . '/../DBConnect.php';

$email = $_POST["email"];

$sql = "SELECT Q1, Q2
		FROM users
		WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_assoc($result);

	$q1 = $row["Q1"];
	$q2 = $row["Q2"];

	echo "<form data-toggle='validator' id='question-form' action='javascript:submitAnswers()'' method='post' role='form'>
            <div class='form-group'>
            	<input name='fp_email' id='fp_email' value='$email' type='email' class='form-control' style='display:none;'/>
            	<p> $q1: </p>
		        <input name='fp_a1' type='fp_a1' id='fp_a1' class='form-control' 
		        		placeholder='Answer 1' required>
        	</div>
        	<div class='form-group'>
            	<p> $q2: </p>
		        <input name='fp_a2' type='fp_a2' id='fp_a2' class='form-control' 
		        		placeholder='Answer 2' required>
        	</div>
        	<div class='form-group pull-right'>
				<input class='btn btn-primary' type='submit' name='submit' value='Submit'/>
			</div>
			<br><br>
    	</form>";
}
else{
	echo "error";
}





?>