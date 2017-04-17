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
    
    if(isset($_POST["edit-submit"])){
        
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
		$email = $_POST["email"];
        $nickname = $_POST["nickname"];

        if(strpos($first_name, "'")){
            $pos = strpos($first_name, "'");

            $first_name = substr_replace($first_name, "'", $pos, 0);
        }

        if(strpos($last_name, "'")){
            $pos = strpos($last_name, "'");

            $last_name = substr_replace($last_name, "'", $pos, 0);
        }

        if(strpos($nickname, "'")){
            $pos = strpos($nickname, "'");

            $nickname = substr_replace($nickname, "'", $pos, 0);
        }
        
		if($_FILES['pic']['size'] > 0){
            $tmpName  = $_FILES['pic']['tmp_name'];
            $fp      = fopen($tmpName, 'r');
            $content = fread($fp, filesize($tmpName));
            $content = addslashes($content);
            fclose($fp);
            $_SESSION["prof_pic"] = $content;

            $sql = "UPDATE users SET 
                    first_name = '$first_name',
                    last_name = '$last_name',
                    email = '$email',
                    nickname = '$nickname',
                    prof_pic = '$content' 
                    WHERE email = '$user' ";
        } 
        else {
            $sql = "UPDATE users SET 
                    first_name = '$first_name',
                    last_name = '$last_name',
                    email = '$email',
                    nickname = '$nickname'
                    WHERE email = '$user' ";
        }
        
		
        if(mysqli_query($conn, $sql)){
            if(strpos($first_name, "'")){
                $pos = strpos($first_name, "'");

                $first_name = substr_replace($first_name, "", $pos, 1);
            }

            if(strpos($last_name, "'")){
                $pos = strpos($last_name, "'");

                $last_name = substr_replace($last_name, "", $pos, 1);
            }

            if(strpos($nickname, "'")){
                $pos = strpos($nickname, "'");

                $nickname = substr_replace($nickname, "", $pos, 1);
            }

            $_SESSION["email"] = $email;
            $_SESSION["first_name"] = $first_name;
            $_SESSION["last_name"] = $last_name;
            $_SESSION["fullname"] = $first_name . " " . $last_name;
            $_SESSION["nickname"] = $nickname;

            if($_FILES['pic']['size'] > 0){
                $sql = "SELECT prof_pic
                    FROM users
                    WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $prof_pic = $row['prof_pic'];
                $_SESSION['prof_pic'] = $prof_pic;

            }

            header("Location: profile.php");
        }
		else {
            echo "<div class='alert alert-danger alert-dismissible'>
                    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Sorry!</strong> There was a problem. Please try again
                 </div>";
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
                <label class="control-label col-sm-2" for="first_name">Profile Pic:</label>
                <div class="col-sm-10">
                    <?php echo '<img hspace="5" WIDTH="100" src="data:image/jpeg;base64,' . base64_encode( $_SESSION['prof_pic'] ) . '" />'; ?> 
                    <div id="fileDiv" style="display: none; width: 80%;">
                        <input type ="hidden" name="MAX_FILE_SIZE" value="2000000">
                        <br>
                        <input type="file" id="pic" class="form-control filestyle" data-buttonBefore="true" 
                                data-buttonText="Profile Picture" name="pic" data-buttonName="btn-info"
                                accept=".png, .jpeg, .gif, .jpg" disabled/>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-2" for="first_name">First Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $_SESSION['first_name'] ?>" required disabled/>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-2" for="last_name">Last Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="last_name" id="lastName" placeholder="Last Name" value="<?php echo $_SESSION['last_name'] ?>"  required disabled/>
                </div>
            </div>
                
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email"
                            value="<?php echo $user ?>" required disabled/>
                </div>
            </div>
                
            <div class="form-group">
                <label class="control-label col-sm-2" for="nickname">Nickname:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nickname" id="nickname"
                            value="<?php echo $_SESSION['nickname'] ?>" required disabled/>
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
        var displayPic = document.getElementById("fileDiv");
        
        displayPic.style.display = "inline-block";
        edit.style.display = "none";
        editSubmit.style.display = "inline-block";
        editCancel.style.display = "inline-block";
    }

    function cancel(){
        var inputs = document.getElementsByTagName('input');
        for(i=0;i<inputs.length;i++){
            if(inputs[i].id != 'pool-srch'){
               inputs[i].disabled=true; 
            }
        }

        var edit = document.getElementById("edit");
        var editSubmit = document.getElementById("edit-submit");
        var editCancel = document.getElementById("edit-cancel");
        var displayPic = document.getElementById("fileDiv");
        displayPic.style.display = "none";
        edit.style.display = "inline-block";
        editSubmit.style.display = "none";
        editCancel.style.display = "none";
    }


</script>


<?php include 'footer.php' ?>