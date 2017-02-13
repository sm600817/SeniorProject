<?php

$title = 'NFL-Picks';
$page = 'Profile';
include 'header.php';
    
?>


<?php
    if(isset($_POST["register-submit"]) && $_FILES['pic']['size'] > 0){
        $sql = "SELECT first_name, last_name, email, nickname
                FROM users";
        $userResult = mysqli_query($conn, $sql);
        
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
		$email = $_POST["email"];
        $nickname = $_POST["nickname"];
        
		$tmpName  = $_FILES['pic']['tmp_name'];
		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);

		$sql = "SELECT first_name, last_name, email, nickname
                FROM users";
		
        if(mysqli_query($conn, $sql)){
	       echo "<h4 class='text-center'><span class='label label-success'>Registration successful. Pleas log in.</span></h4>";
        }
		else {
		  echo "<h4 class='text-center'><span class='label label-danger'>Sorry there was a problem. Please try again.</span></h4>";
		}


    }

        $sql = "SELECT first_name, last_name, email, nickname
                FROM users";
        
        $userResult = mysqli_query($conn, $sql);

?>

<div class="panel panel-default panel-primary">
    <div class="panel-heading">
        Profile </div>
    <div class="panel-body">
        <form>
        <input type="hidden" name="updateType" id="updateType" value="new"/>
            
            <div class="form-group">
                <label class="control-label col-sm-2" for="first_name">First Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name ?>" required disabled/>
                    <!-- I tried a few things but reverted them back so you can see the errors
                    
                    I believe it something along the lines of $userResult["first_name"] per the query but it didnt through any errors.
                    -->
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-2" for="last_name">Last Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="last_name" id="lastName" placeholder="Last Name" value="<?php echo $last_name ?>"  required disabled/>
                </div>
            </div>
                
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email Address:</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="email" id="email"
                            pattern="^\d{3}[\-]\d{3}[\-]\d{4}$" placeholder="123-456-7890" value="<?php echo $email ?>" required disabled/>
                </div>
            </div>
                
            <div class="form-group">
                <label class="control-label col-sm-2" for="nickname">Nickname</label>
                <div class="col-sm-10">
                    <input type="text" pattern="^(\d{5}([\-]\d{4})?)$" class="form-control" name="nickname" id="nickname"
                               placeholder="19000 or 19000-0000" value="<?php echo $nickname ?>" required disabled/>
                </div>
            </div>
        </form>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="submit" class="btn btn-primary">Edit Profile</button>
            </div>
        </div>
    
    </div>
</div>


<?php include 'footer.php' ?>