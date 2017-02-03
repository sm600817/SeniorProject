<!DOCTYPE html>
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
    <script type="text/javascript" src="/SeniorProject/bootstrap/bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.min.js"> </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">NFL-Picks</a>
            </div>
            <?php if($title != "Log In"): ?>
            <ul class="nav navbar-nav">
                <li><a href="Home.php">Home</a></li>
            </ul>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container" style="margin-top: 1em">

<?php

include __DIR__ . '/../DBConnect.php';



?>