<?php

$title = 'NFL-Picks';
$page = 'prof_edit';
include 'header.php';

?><?php
    $sql = "SELECT first_name, last_name, email, nickname
            FROM users";
    $userResult = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($userResult);
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $email = $row["email"];
    $nickname = $row["nickname"];
    
    if(isset($_POST["submit"]) && $_FILES['pic']['size'] > 0){
        
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
		$email = $_POST["email"];
        $nickname = $_POST["nickname"];
        
		$tmpName  = $_FILES['pic']['tmp_name'];
		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);
		
        if(mysqli_query($conn, $sql)){
	       echo "<h4 class='text-center'><span class='label label-success'>Registration successful. Pleas log in.</span></h4>";
        }
		else {
		  echo "<h4 class='text-center'><span class='label label-danger'>Sorry there was a problem. Please try again.</span></h4>";
		}


    }

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
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name ?>" required/>
        
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-2" for="last_name">Last Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="last_name" id="lastName" placeholder="Last Name" value="<?php echo $last_name ?>"  required/>
                </div>
            </div>
                
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email Address:</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="email" id="email"
                            pattern="^\d{3}[\-]\d{3}[\-]\d{4}$" placeholder="123-456-7890" value="<?php echo $email ?>" required/>
                </div>
            </div>
                
            <div class="form-group">
                <label class="control-label col-sm-2" for="nickname">Nickname</label>
                <div class="col-sm-10">
                    <input type="text" pattern="^(\d{5}([\-]\d{4})?)$" class="form-control" name="nickname" id="nickname"
                               placeholder="19000 or 19000-0000" value="<?php echo $nickname ?>" required/>
                </div>
            </div>
        </form>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                <!-- 
                    TODO: Javascript for the update button. On click function that calls a SQL statement to update logged-in user's profile information.
                -->
                    
                    <a href="profile.php">
                        <button type="submit" name="submit" class="btn btn-default">Cancel</button>
                    </a>
            </div>
        </div>
    
    </div>
</div>

<?php include "footer.php"; ?>
