<?php
$title = 'NFL-Picks';
$page = 'Home';
include 'header.php';
?>

<div class="home_page_container">
    <div class="container-fluid">
        <div class="panel panel-default panel-primary">
            <div class="panel-heading">NFL-Picks</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="gameStream">
    
                            <!-- Profile image to be inserted here -->
                            <!-- TODO: php code to print actual account info -->
                            <p class="usernamePrint">Temp username</p>
                            <p class="creditsPrint">Credits: 2,000</p>
                            <p class="profileInfo">Info (will be filled via script later)</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="feedStream">
    
                            <h3 class="container">Feed</h3>
                                <a class="twitter-timeline" data-chrome="nofooter transparent noheader transparent" href="https://twitter.com/Lockski1/lists/nfl-picks-dev">Follow @NFL</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="rightInfo">
                            <a href="profile.php">Profile</a>
                            <p></p>
                            <a href="my_pools.php">Pools</a>
                            <p></p>
                            <a href="my_pools.php">History</a>
                            <p></p>
                            <a href="create_pool.php">Create Pool</a>
                            <p></p>
                            <a href="invites_view.php">Invites</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>