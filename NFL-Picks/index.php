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
	        				<form data-toggle="validator" id="login-form" action="<?php $_PHP_SELF ?>" method="post" role="form">
								<div class="form-group">
									<input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="" required>
								</div>
								<div class="form-group">
									<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input type="submit" name="login-submit" id="login-submit" tabindex="3" class="form-control btn btn-primary" value="Log In">
										</div>
									</div>
								</div>
							</form>
							<?php
							if(isset($_POST["login-submit"])){
								$email = $_POST["email"];
								$password = $_POST["password"];

								$sql = "SELECT email, first_name, last_name, nickname, prof_pic
											FROM users
											WHERE email = '$email' AND password = '$password'";

								$result = mysqli_query($conn, $sql);

								if (mysqli_num_rows($result) > 0){
									$row = mysqli_fetch_assoc($result);
									$_SESSION["email"] = $row["email"];
									$_SESSION["first_name"] = $row["first_name"];
									$_SESSION["last_name"] = $row["last_name"];
									$_SESSION["fullname"] = $row["first_name"] . " " . $row["last_name"];
									$_SESSION["nickname"] = $row["nickname"];
									$_SESSION["prof_pic"] = $row["prof_pic"];
									header("Location: Home.php");
								}
								else{
									echo "<div class='alert alert-danger alert-dismissible'>
								            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								            <strong>Sorry!</strong> Incorrect email or password
								         </div>";
								}
							}
							?>
						</div>
						<div id="registerTab" role="tabpanel" class="tab-pane">
							<form data-toggle="validator" id="register-form" action="<?php $_PHP_SELF ?>" method="post" role="form" enctype="multipart/form-data">
								<div class="row">
									<div class="form-group col-xs-6">
										<input type="text" name="first_name" id="first_name" tabindex="1" class="form-control" placeholder="First Name" value="" required>
									</div>
									<div class="form-group col-xs-6">
										<input type="text" name="last_name" id="last_name" tabindex="2" class="form-control" placeholder="Last Name" value="" required>
									</div>
								</div>
								<div class="form-group">
									<input type="text" name="nickname" id="nickname" tabindex="3" class="form-control" placeholder="Nickname (ex. jSchmoe123)" value="" required>
								</div>
								<div class="form-group">
									<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
									<input type="file" name="pic" id="pic" tabindex="4" accept=".png, .jpeg, .gif, .jpg" 
										class="form-control filestyle" data-buttonBefore="true" data-buttonText="Profile Picture (optional)" 
										data-buttonName="btn-info">
								</div>
								<div class="form-group">
									<input type="email" name="email" id="email" tabindex="5" class="form-control" placeholder="Email Address" 
										data-error="Invalid email address" value="" required>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<input type="password" name="password" id="password" tabindex="6" class="form-control" 
										placeholder="Password" data-minlength="8" 
										data-error="Minimum 8 characters" required>
									<div class="help-block with-errors"></div>
								</div>
                                
                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <select class="selectpicker" title="Security Question One" name="Q1" id="Q1" data-width="auto">
                                            <option value="1">What is your mother's maiden name?</option>
                                            <option value="2">What is the name of your first pet?</option>
                                            <option value="3">Who is your favorite football player?</option>
                                            <option value="4">What was your childhood nickname?</option>
                                            <option value="5">What is your favorite food?</option>
                                            <option value="6">What was the make and model of your first car?</option>
                                        </select>
                                        <input type="text" name="A1" id="A1" tabindex="6" class="form-control" placeholder="Answer One" value="" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <select class="selectpicker" title="Security Question Two" name="Q2" id="Q2" data-width="auto">
                                            <option value="7">What is your mother's maiden name?</option>
                                            <option value="8">What is the name of your first pet?</option>
                                            <option value="9">Who is your favorite football player?</option>
                                            <option value="10">What was your childhood nickname?</option>
                                            <option value="11">What is your favorite food?</option>
                                            <option value="12">What was the make and model of your first car?</option>
                                        </select>
                                        <input type="text" name="A2" id="A2" tabindex="7" class="form-control" placeholder="Answer Two" value="" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input type="submit" name="register-submit" id="register-submit" tabindex="7" class="form-control btn btn-primary" value="Register Now">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<br>
			<?php
				if(isset($_POST["register-submit"])){
					$first_name = $_POST["first_name"];
					$last_name = $_POST["last_name"];
					$nickname = $_POST["nickname"];
					$email = $_POST["email"];
					$password = $_POST["password"];
                    
                    $question_one = $_POST["Q1"];
                    $answer_one = $_POST["A1"];
                    $question_two = $_POST["Q2"]; //check db
                    $answer_two = $_POST["A2"];

					if($_FILES['pic']['size'] > 0){
						$tmpName  = $_FILES['pic']['tmp_name'];

						$fp      = fopen($tmpName, 'r');
						$content = fread($fp, filesize($tmpName));
						$content = addslashes($content);
						fclose($fp);
					}
					else {
						$file = "Defaults/user-pic-default.png";
						$content = File_Get_Contents($file);
						$content = addslashes($content);
					}

					

					$sql = "INSERT INTO users(first_name, last_name, nickname, email, prof_pic, password, credits, Q1, A1, Q2, A2) 
							VALUES ('$first_name', '$last_name', '$nickname', '$email', '$content', '$password', 100, '$question_one', '$answer_one', '$question_two', '$answer_two')";
					if(mysqli_query($conn, $sql)){
						echo "<div class='alert alert-success alert-dismissible'>
					            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					            <strong>Registration Successful!</strong> Please log in
					         </div>";
					}
					else {
						echo "<div class='alert alert-danger alert-dismissible'>
					            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					            <strong>Sorry!</strong> An account already exists with that email
					          </div>";
					}


				}
			?>
		</div>
	</div>
			
<?php include "footer.php"; ?>