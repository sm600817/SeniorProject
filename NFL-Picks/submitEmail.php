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
    
    $question;
    
    if($q1 == 1){
        $question = 'What is your mothers maiden name?';
    }
    else if($q1 == 2){
        $question = 'What is the name of your first pet?';
    }
    else if($q1 == 3){
        $question = 'Who is your favorite football player?';
    }
    else if($q1 == 4){
        $question = 'What was your childhood nickname?';
    }
    else if($q1 == 5){
        $question = 'What is your favorite food?';
    }
    else{
        $question = 'What was the make and model of your first car?';
    }
    
    $questionTwo;
    
    if($q2 == 7){
        $questionTwo = 'What is your mothers maiden name?';
    }
    else if($q2 == 8){
        $questionTwo = 'What is the name of your first pet?';
    }
    else if($q2 == 9){
        $questionTwo = 'Who is your favorite football player?';
    }
    else if($q2 == 10){
        $questionTwo = 'What was your childhood nickname?';
    }
    else if($q2 == 11){
        $questionTwo = 'What is your favorite food?';
    }
    else{
        $questionTwo = 'What was the make and model of your first car?';
    }

	echo "<form data-toggle='validator' id='question_form' action='javascript:submitAnswers()'' method='post' role='form'>
            <div class='form-group'>
            	<input name='fp_email' id='fp_email' value='$email' type='email' class='form-control' style='display:none;'/>
            	<p> $question </p>
		        <input name='fp_a1' type='fp_a1' id='fp_a1' class='form-control' 
		        		placeholder='Answer 1' required>
        	</div>
        	<div class='form-group'>
            	<p> $questionTwo </p>
		        <input name='fp_a2' type='fp_a2' id='fp_a2' class='form-control' 
		        		placeholder='Answer 2' required>
        	</div>
        	<div class='form-group pull-right'>
				<input class='btn btn-primary' type='submit' name='submit' value='Next'/>
			</div>
			<br><br>
            <span id='message' class='hidden'></span>
    	</form>";
}
else{
	echo "error";
}





?>