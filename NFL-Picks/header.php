<!DOCTYPE html>
<?php

    include __DIR__ . '/../DBConnect.php';

    ob_start();

    session_start();

    $user  = $_SESSION['email'];

    $sql = "SELECT credits
            FROM users
            WHERE email = '$user'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $credits = $row['credits'];

    $sql = "SELECT COUNT(invite_id) AS count
            FROM invites
            WHERE recipient_id = '$user' AND was_read = 0";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $unread = $row["count"];

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>
    <!-- Bootstrap core CSS -->
    <link href="/SeniorProject/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!--Bootstrap js -->
    <script src="/SeniorProject/bootstrap/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
    <script type="text/javascript" src="/SeniorProject/bootstrap/bootstrap-filestyle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">NFL-Picks</a>
            </div>
            <?php if($title != "Log In"): ?>
            <ul class="nav navbar-nav">
                <li <?php if($page == 'Home') echo 'class = active'; ?>><a href="Home.php">Home</a></li>
                <li <?php if($page == 'Pools') echo 'class = active ';?>dropdown>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pools
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="my_pools.php">My Pools</a></li>
                        <li><a href="create_pool.php">Create Pool</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li <?php if($page == 'Profile') echo 'class = active ';?>dropdown>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo '<img hspace="5" WIDTH="18" src="data:image/jpeg;base64,' . base64_encode( $_SESSION['prof_pic'] ) . '" />';
                              echo '<span style="margin-left: 55;">' . $_SESSION['nickname'] . '</span>';
                              if($unread > 0 && $title != 'Invites'){
                                echo '<span style="margin-left: 5px" class="badge badge-notification">' . 
                                        $unread . '</span>'; 
                              }
                        ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a>Credits: <?php echo $credits; ?> </a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li>
                            <a href="invites_view.php">
                                Invites
                                <?php if($unread > 0 && $title != 'Invites'){ ?>
                                    <span style="margin-left: 5px;" class="badge badge-notification"> 
                                        <?php echo $unread; ?>
                                    </span>
                                <?php } ?>
                            </a> 
                        </li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container" style="margin-top: 1em">