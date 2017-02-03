<?php
$title = 'Log In';
include 'header.php';

?>
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-login">
			<div class="panel-body">
				<div role="tabpanel">
					<ul class="nav nav-tabs" role="tablist">
		                <li role="presentation" class="active"><a href="#loginTab" role="tab"
		                    data-toggle="tab">Log In</a></li>
		                <li role="presentation"><a href="#registerTab" role="tab"
		                    data-toggle="tab">Register</a></li>
		            </ul>
					<div class="tab-content">
						<br>
	        			<div id="loginTab" role="tabpanel" class="tab-pane active">
	        				<form id="login-form" action="<?php $_PHP_SELF ?>" method="post" role="form">
								<div class="form-group">
									<input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
								</div>
								<div class="form-group">
									<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-primary" value="Log In">
										</div>
									</div>
								</div>
							</form>
						</div>
						<div id="registerTab" role="tabpanel" class="tab-pane">
							<form data-toggle="validator" id="register-form" action="<?php $_PHP_SELF ?>" method="post" role="form" enctype="multipart/form-data">
								<div class="row">
									<div class="form-group col-xs-6">
										<input type="text" name="first_name" id="first_name" tabindex="1" class="form-control" placeholder="First Name" value="" required>
									</div>
									<div class="form-group col-xs-6">
										<input type="text" name="last_name" id="last_name" tabindex="1" class="form-control" placeholder="Last Name" value="" required>
									</div>
								</div>
								<div class="form-group">
									<input type="text" name="nickname" id="nickname" tabindex="1" class="form-control" placeholder="Nickname (ex. jSchmoe123)" value="" required>
								</div>
								<div class="form-group">
									<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
									<input type="file" name="pic" id="pic" tabindex="2" 
										class="form-control filestyle" data-buttonBefore="true" data-buttonText="Profile Picture" 
										data-buttonName="btn-primary" data-icon="false" required>
								</div>
								<div class="form-group">
									<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" 
										data-error="Invalid email address" value="" required>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<input type="password" name="password" id="password" tabindex="2" class="form-control" 
										placeholder="Password" data-minlength="8" 
										data-error="Minimum 8 characters" required>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-primary" value="Register Now">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
if(isset($_POST["register-submit"]) && $_FILES['pic']['size'] > 0){
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$nickname = $_POST["nickname"];
	$email = $_POST["email"];
	$password = $_POST["password"];

	$tmpName  = $_FILES['pic']['tmp_name'];

	$fp      = fopen($tmpName, 'r');
	$content = fread($fp, filesize($tmpName));
	$content = addslashes($content);
	fclose($fp);

	$sql = "INSERT INTO users(first_name, last_name, nickname, email, prof_pic, password, credits) 
			VALUES ('$first_name', '$last_name', '$nickname', '$email', '$content', '$password', 100)";
	if(mysqli_query($conn, $sql)){
		echo "<h4 class='text-center'><span class='label label-success'>Registration successful. Pleas log in.</span></h4>";
	}
	else {
		echo "<span class='label label-danger'>Sorry there was a problem. Please try again.</span>";
	}


}
?>
<?php include "footer.php"; ?>