<?php
$title = 'NFL-Picks';
$page = 'Home';
include 'header.php';
?>

<?php
//way to display previous week scores

$sql = "SELECT week_id, game1, game2, game3, game4, game5, game6, game7,
               game8, game9, game10, game11, game12, game13, game14, game15, game16
		FROM weeks
		WHERE was_played = 0
		GROUP BY was_played";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$week = $row["week_id"];

?>

<div class="home_page_container">
    <div class="container-fluid">
        <div class="panel panel-default panel-primary">
            <div class="panel-heading">NFL-Picks</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="gameStream">
                            <h3 class="container">Last Week</h3>
                            <!--Scores from last week -->
                            <?php if (mysqli_num_rows($result) > 0){ ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><center><?php echo 'Week ' . $week ?> Scores</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    for($i = 1; $i < 17; $i++){
                                        $game = "game" . $i;
                                        $game = $row[$game];

                                        if($game != null){
                                            $sql = "SELECT game_id, home_team, away_team, home_score, away_score
                                                FROM games
                                                WHERE game_id = $game";
                                            $gameResult = mysqli_query($conn, $sql);
                                            $gameRow = mysqli_fetch_assoc($gameResult);

                                            $homeScore = $gameRow["home_score"];
                                            $awayScore = $gameRow["away_score"];

                                            $home_id = $gameRow["home_team"];
                                            $away_id = $gameRow["away_team"];

                                            $sql = "SELECT team_num, team_city, team_name, team_logo
                                                    FROM teams
                                                    WHERE team_num = $home_id";
                                            $homeResult = mysqli_query($conn, $sql);
                                            $homeRow = mysqli_fetch_assoc($homeResult);

                                            $homeName = $homeRow["team_name"];
                                            $homeLogo = $homeRow["team_logo"];

                                            $sql = "SELECT team_num, team_city, team_name, team_logo
                                                    FROM teams
                                                    WHERE team_num = $away_id";
                                            $awayResult = mysqli_query($conn, $sql);
                                            $awayRow = mysqli_fetch_assoc($awayResult);

                                            $awayName = $awayRow["team_name"];
                                            $awayLogo = $awayRow["team_logo"];

                                            echo "<td> <img style='float:left;' hspace='5' WIDTH='50' src='data:image/jpeg;base64," . base64_encode( $homeLogo ) . "'/>" . $homeName . " " . $homeScore . " vs " . "<img style='float:left;' hspace='5' WIDTH='50' src='data:image/jpeg;base64," . base64_encode( $awayLogo ) . "'/>" . $awayName . " " . $awayScore . "</td>";
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                            <?php } else {
                                echo 'no scores from last week'?> 
                            <?php } ?>
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
                            <!-- Upcoming week games -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>