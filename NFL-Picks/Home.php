<?php
$title = 'NFL-Picks';
$page = 'Home';
include 'header.php';

?>

<?php
//way to display previous week scores
$sql = "SELECT week_id
        FROM weeks
        WHERE was_played = 0
        GROUP BY was_played";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $last_week = $row["week_id"] - 1;
}
else{
    $last_week = 17;
}


$sql = "SELECT week_id, game1, game2, game3, game4, game5, game6, game7,
               game8, game9, game10, game11, game12, game13, game14, game15, game16
		FROM weeks
		WHERE week_id = $last_week
		GROUP BY was_played";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$last_week = $row["week_id"];

$next_week = $last_week + 1;
$sql = "SELECT week_id, game1, game2, game3, game4, game5, game6, game7,
               game8, game9, game10, game11, game12, game13, game14, game15, game16
		FROM weeks
		WHERE week_id = $next_week
		GROUP BY was_played";
$futureResult = mysqli_query($conn, $sql);
$futureRow = mysqli_fetch_assoc($futureResult);

?>

<div class="home_page_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="gameStream">
                    <h3>Last Week</h3>
                    <!--Scores from last week -->
                    <table class="table table-hover">
                        <thead>
                    <?php if (mysqli_num_rows($result) == 0){ ?>
                            <tr>
                                <th><center>No Games Last Week</center></th>
                            </tr>
                    <?php } else { ?> 
                            <tr>
                                <th><center><?php echo 'Week ' . $last_week ?> Scores</center></th>
                            </tr>
                    <?php } ?>
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

                                    $sql = "SELECT team_num, team_city, team_name, team_logo, abbreviation
                                            FROM teams
                                            WHERE team_num = $home_id";
                                    $homeResult = mysqli_query($conn, $sql);
                                    $homeRow = mysqli_fetch_assoc($homeResult);

                                    $homeName = $homeRow["team_name"];
                                    $homeLogo = $homeRow["team_logo"];
                                    $homeAbbr = $homeRow["abbreviation"];

                                    $sql = "SELECT team_num, team_city, team_name, team_logo, abbreviation
                                            FROM teams
                                            WHERE team_num = $away_id";
                                    $awayResult = mysqli_query($conn, $sql);
                                    $awayRow = mysqli_fetch_assoc($awayResult);
                                
                                    $awayName = $awayRow["team_name"];
                                    $awayLogo = $awayRow["team_logo"];
                                    $awayAbbr = $awayRow["abbreviation"];

                                    if($homeScore > $awayScore){
                                        $homeWeight = 900;
                                        $awayWeight = "normal";
                                    }
                                    else{
                                        $homeWeight = "normal";
                                        $awayWeight = 900;
                                    }

                                    
                                    echo "<tr style='display:block;'>
                                            <td>
                                                <img hspace='5' HEIGHT='30' src='data:image/jpeg;base64," . base64_encode( $homeLogo ) . "'/>
                                                <span style='position:absolute; right:110px;'>" . $homeAbbr . "</span>
                                                <span style='float:right; font-weight: $homeWeight;'>" . $homeScore . "</span>
                                            </td>
                                            <td style='border-top: 0'>
                                                <img hspace='5' HEIGHT='30' src='data:image/jpeg;base64," . base64_encode( $awayLogo ) . "'/>
                                                <span style='position:absolute; right:110px;'>" . $awayAbbr . "</span>
                                                <span style='float:right; font-weight: $awayWeight;'>" . $awayScore . "</span> 
                                            </td>
                                          </tr>";  
                                    
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="feedStream">
                    <h3>Feed</h3>
                        <a class="twitter-timeline" data-height="1510" data-chrome="nofooter transparent noheader transparent" href="https://twitter.com/Lockski1/lists/nfl-picks-dev">Follow @NFL</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="rightInfo">
                    <h3>This Week</h3>
                    <table class="table table-hover">
                        <thead>
                    <?php if (mysqli_num_rows($futureResult) == 0){ ?>
                            <tr>
                                <th><center>No Upcoming Games</center></th>
                            </tr>
                    <?php } else { ?> 
                            <tr>
                                <th><center><?php echo 'Week ' . $next_week ?> Matchups</center></th>
                            </tr>
                    <?php } ?>
                        </thead>
                        <tbody>
                        <?php
                            for($i = 1; $i < 17; $i++){
                                $game = "game" . $i;
                                $game = $futureRow[$game];

                                if($game != null){
                                    $sql = "SELECT game_id, home_team, away_team
                                        FROM games
                                        WHERE game_id = $game";
                                    $gameResult = mysqli_query($conn, $sql);
                                    $gameRow = mysqli_fetch_assoc($gameResult);

                                    $home_id = $gameRow["home_team"];
                                    $away_id = $gameRow["away_team"];

                                    $sql = "SELECT team_num, team_city, team_name, team_logo, abbreviation
                                            FROM teams
                                            WHERE team_num = $home_id";
                                    $homeResult = mysqli_query($conn, $sql);
                                    $homeRow = mysqli_fetch_assoc($homeResult);

                                    $homeName = $homeRow["team_name"];
                                    $homeLogo = $homeRow["team_logo"];
                                    $homeAbbr = $homeRow["abbreviation"];

                                    $sql = "SELECT team_num, team_city, team_name, team_logo, abbreviation
                                            FROM teams
                                            WHERE team_num = $away_id";
                                    $awayResult = mysqli_query($conn, $sql);
                                    $awayRow = mysqli_fetch_assoc($awayResult);
                                
                                    $awayName = $awayRow["team_name"];
                                    $awayLogo = $awayRow["team_logo"];
                                    $awayAbbr = $awayRow["abbreviation"];
                                    
                                    echo "<tr style='display:block;'>
                                            <td>
                                                <img hspace='5' HEIGHT='30' src='data:image/jpeg;base64," . base64_encode( $homeLogo ) . "'/>
                                                <span style='float:right; padding-right: 90px;'>" . $homeAbbr . "</span> 
                                            </td>
                                            <td style='border-top: 0'>
                                                <img hspace='5' HEIGHT='30' src='data:image/jpeg;base64," . base64_encode( $awayLogo ) . "'/>
                                                <span style='float:right; padding-right: 90px;'>" . $awayAbbr . "</span>
                                            </td>
                                          </tr>"; 
                                    
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                    <style>
                        tr td{
                            display: block;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>