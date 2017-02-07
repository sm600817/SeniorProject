<?php
$title = 'NFL-Picks';
$page = 'Home';
include 'header.php';
?>
    
<body>

    <style>
    
        .leftInfo {
            float: left;
            width: 300px;
        }
        
        .rightInfo {
            float: right;
            width: 300px;
        }
        
        .feedText {
            display: inline-block;
        }
    
    </style>

    <h1 id="projectName" class="projectName">NFL-Picks</h1>
    
    <div id="leftInfo" class="leftInfo">
        
        <!-- Profile image to be inserted here -->
        
        <p id="usernamePrint" class="usernamePrint">Temp username</p>
        <p id="creditsPrint" class="creditsPrint">Credits: 2,000</p>
        <p id="profileInfo" class="profileInfo">Info (will be filled via script later)</p>
        
    </div>
    
    <div id="feedStream" class="feedStream">
        
        <h3 id="feedText" class="feedText">Feed</h3>
        
        <!-- TODO: write script to add content to stream feed, live -->
        
    </div>
    
    <div id="rightInfo" class="rightInfo">
        
        <a href="">Profile</a>
        <p></p>
        <a href="">Pools</a>
        <p></p>
        <a href="">History</a>
        <p></p>
        <a href="">Following</a>
        <p></p>
        <a href="">Top Scores</a>
        <p></p>
        <a href="">Predictions</a>
        <p></p>
        <a href="">Related News</a>
        
    </div>
    
</body>
<?php include "footer.php"; ?>