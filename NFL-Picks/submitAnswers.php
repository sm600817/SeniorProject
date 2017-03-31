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
		echo "<form data-toggle='validator' id='pswrd_form' action='javascript:submitPassword()'' method='post' role='form'>
	            <div class='form-group'>
	            	<input name='fp_email' id='fp_email' value='$email' type='email' class='form-control' style='display:none;'/>
			        <input name='fp_pswrd' type='password' id='fp_pswrd' class='form-control' 
			        		placeholder='New Password' data-minlength='8' 
							data-error='Minimum of 8 characters' required>
					<div class='help-block with-errors'></div>
	        	</div>
	        	<div class='form-group'>
			        <input name='fp_pswrd2' type='password' id='fp_pswrd2' class='form-control' 
			        		placeholder='Re-type Password' data-minlength='8'
			        		data-match='#fp_pswrd' data-match-error='Your passwords do not match'
							data-error='Minimum 8 characters' required>
					<div class='help-block with-errors'></div>
	        	</div>
	        	<div class='form-group pull-right'>
					<input class='btn btn-primary' type='submit' name='submit' value='Submit'/>
				</div>
				<br><br>
	            <span id='message' class='hidden'></span>
	    	</form>";
	}
	else{
		echo "error";
	}
}
else{
	echo "error";
}





?>