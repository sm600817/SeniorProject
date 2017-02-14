<?php

$title = 'NFL-Picks';
$page = 'Profile';
include 'header.php';
    
?>


<?php

    /* add this to the if once you add the pic input field:
     * && $_FILES['pic']['size'] > 0
     *
     * just add the update stuff to the if statement
     * this way should eliminate the need for the prof_edit.php page
     */
            
    $sql = "SELECT first_name, last_name, email, nickname, prof_pic
            FROM users";
        
    $userResult = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($userResult);
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $email = $row["email"];
    $nickname = $row["nickname"];
    $prof_pic = $row["prof_pic"];
    
    if(isset($_POST["edit-submit"]) && $_FILES['pic']['size'] > 0 ){
        
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
		$email = $_POST["email"];
        $nickname = $_POST["nickname"];
        
		$tmpName  = $_FILES['pic']['tmp_name'];
		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);
        
        $sql = "UPDATE users SET 
                    first_name = '$first_name',
                    last_name = '$last_name',
                    email = '$email',
                    nickname = '$nickname',
                    prof_pic = '$content' 
                    WHERE email = '$user' ";
        
        
		
        if(mysqli_query($conn, $sql)){
	       echo "<h4 class='text-center'><span class='label label-success'>Registration successful. Please log in.</span></h4>";
        }
		else {
		  echo mysqli_error($conn); /* "<h4 class='text-center'><span class='label label-danger'>Sorry there was a problem. Please try again.</span></h4>" */;
		}

    }

?>

<div class="panel panel-default panel-primary">
    <div class="panel-heading">
        Profile </div>
    <div class="panel-body">
        <form class="form-horizontal" data-toggle="validator" method="POST" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
            <input type="hidden" name="update" id="update" value=""/>
            
            <div class="form-group">
                <label class="control-label col-sm-2" for="first_name">Profile Pic</label>
                <div class="col-sm-10">
                    <?php echo '<img hspace="5" WIDTH="100" src="data:image/jpeg;base64,' . base64_encode( $prof_pic ) . '" />'; ?> 
                    <input type ="hidden" name="MAX_FILE_SIZE" value="2000000">
                    <input type="file" id="pic" class="form-control filestyle" style="display:none" data-buttonBefore="true" data-buttonText="Profile Picture" name="pic" placeholder="First Name" accept=".png .jpeg .gif .jpg" disabled/>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-2" for="first_name">First Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name ?>" required disabled/>
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
                            value="<?php echo $email ?>" required disabled/>
                </div>
            </div>
                
            <div class="form-group">
                <label class="control-label col-sm-2" for="nickname">Nickname</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nickname" id="nickname"
                            value="<?php echo $nickname ?>" required disabled/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" id="edit" name="edit" onclick="activate()" class="btn btn-primary">Edit Profile</button>
                    <input type="submit" style="display:none" id="edit-submit" name="edit-submit" class="btn btn-primary" value="Save">
                    <input type="button" style="display:none" onclick="cancel()" id="edit-cancel" name="edit-cancel" class="btn btn-danger" value="Cancel">
                </div>
            </div>
        </form>
    
    </div>
</div>
<script>

    function activate(){
        var inputs = document.getElementsByTagName('input');
        for(i=0;i<inputs.length;i++){
            inputs[i].disabled=false;
        }

        var edit = document.getElementById("edit");
        var editSubmit = document.getElementById("edit-submit");
        var editCancel = document.getElementById("edit-cancel");
        var displayPic = document.getElementById("pic");
        
        displayPic.style.display = "inline-block";
        edit.style.display = "none";
        editSubmit.style.display = "inline-block";
        editCancel.style.display = "inline-block";
    }

    function cancel(){
        var inputs = document.getElementsByTagName('input');
        for(i=0;i<inputs.length;i++){
            inputs[i].disabled=true;
        }

        var edit = document.getElementById("edit");
        var editSubmit = document.getElementById("edit-submit");
        var editCancel = document.getElementById("edit-cancel");
        edit.style.display = "inline-block";
        editSubmit.style.display = "none";
        editCancel.style.display = "none";
    }


</script>


<?php include 'footer.php' ?>