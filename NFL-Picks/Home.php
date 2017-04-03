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
$row = mysqli_fetch_assoc($result);
$week = $row["week_id"];

$sql = "SELECT game_id, home_team, away_team, home_score, away_score
        FROM games";
$gameResult = mysqli_query($conn, $sql);

$homeName;

if($homeTeam = 1){
    $homeName = 'Philadelphia Eagles';
}
else if($homeTeam = 2){
    $homeName = 'New York Giants';
}
else if($homeTeam = 3){
    $homeName = 'Dallas Cowboys';
}
else if($homeTeam = 4){
    $homeName = 'Washington Redskins';
}
else if($homeTeam = 5){
    $homeName = 'Seattle Seahawks';
}
else if($homeTeam = 6){
    $homeName = 'Arizona Cardinals';
}
else if($homeTeam = 7){
    $homeName = 'Los Angeles Rams';
}
else if($homeTeam = 8){
    $homeName = 'San Francisco 49ers';
}
else if($homeTeam = 9){
    $homeName = 'Green Bay Packers';
}
else if($homeTeam = 10){
    $homeName = 'Detroit Lions';
}
else if($homeTeam = 11){
    $homeName = 'Minnesota Vikings';
}
else if($homeTeam = 12){
    $homeName = 'Chicago Bears';
}
else if($homeTeam = 13){
    $homeName = 'Atlanta Falcons';
}
else if($homeTeam = 14){
    $homeName = 'Tampa Bay Buccanneers';
}
else if($homeTeam = 15){
    $homeName = 'New Orleans Saints';
}
else if($homeTeam = 16){
    $homeName = 'Carolina Panthers';
}
else if($homeTeam = 17){
    $homeName = 'New England Patriots';
}
else if($homeTeam = 18){
    $homeName = 'Miami Dolphins';
}
else if($homeTeam = 19){
    $homeName = 'Buffalo Bills';
}
else if($homeTeam = 20){
    $homeName = 'New York Jets';
}
else if($homeTeam = 21){
    $homeName = 'Kansas City Chiefs';
}
else if($homeTeam = 22){
    $homeName = 'Oakland Raiders';
}
else if($homeTeam = 23){
    $homeName = 'Denver Broncos';
}
else if($homeTeam = 24){
    $homeName = 'San Diego Chargers';
}
else if($homeTeam = 25){
    $homeName = 'Pittsburgh Steelers';
}
else if($homeTeam = 26){
    $homeName = 'Baltimore Ravens';
}
else if($homeTeam = 27){
    $homeName = 'Cincinnati Bengals';
}
else if($homeTeam = 28){
    $homeName = 'Cleveland Browns';
}
else if($homeTeam = 29){
    $homeName = 'Houston Texans';
}
else if($homeTeam = 30){
    $homeName = 'Tennessee Titans';
}
else if($homeTeam = 31){
    $homeName = 'Indianapolis Colts';
}
else{
    $homeName = 'Jacksonville Jaguars';
}

$awayName;

if($awayTeam = 1){
    $awayName = 'Philadelphia Eagles';
}
else if($awayTeam = 2){
    $awayName = 'New York Giants';
}
else if($awayTeam = 3){
    $awayName = 'Dallas Cowboys';
}
else if($awayTeam = 4){
    $awayName = 'Washington Redskins';
}
else if($awayTeam = 5){
    $awayName = 'Seattle Seahawks';
}
else if($awayTeam = 6){
    $awayName = 'Arizona Cardinals';
}
else if($awayTeam = 7){
    $awayName = 'Los Angeles Rams';
}
else if($awayTeam = 8){
    $awayName = 'San Francisco 49ers';
}
else if($awayTeam = 9){
    $awayName = 'Green Bay Packers';
}
else if($homeTeam = 10){
    $awayName = 'Detroit Lions';
}
else if($awayTeam = 11){
    $awayName = 'Minnesota Vikings';
}
else if($awayTeam = 12){
    $awayName = 'Chicago Bears';
}
else if($awayTeam = 13){
    $awayName = 'Atlanta Falcons';
}
else if($awayTeam = 14){
    $awayName = 'Tampa Bay Buccanneers';
}
else if($awayTeam = 15){
    $awayName = 'New Orleans Saints';
}
else if($awayTeam = 16){
    $awayName = 'Carolina Panthers';
}
else if($awayTeam = 17){
    $awayName = 'New England Patriots';
}
else if($awayTeam = 18){
    $awayName = 'Miami Dolphins';
}
else if($homeTeam = 19){
    $awayName = 'Buffalo Bills';
}
else if($homeTeam = 20){
    $awayName = 'New York Jets';
}
else if($awayTeam = 21){
    $awayName = 'Kansas City Chiefs';
}
else if($awayTeam = 22){
    $awayName = 'Oakland Raiders';
}
else if($awayTeam = 23){
    $awayName = 'Denver Broncos';
}
else if($awayTeam = 24){
    $awayName = 'San Diego Chargers';
}
else if($awayTeam = 25){
    $awayName = 'Pittsburgh Steelers';
}
else if($awayTeam = 26){
    $awayName = 'Baltimore Ravens';
}
else if($awayTeam = 27){
    $awayName = 'Cincinnati Bengals';
}
else if($awayTeam = 28){
    $awayName = 'Cleveland Browns';
}
else if($awayTeam = 29){
    $awayName = 'Houston Texans';
}
else if($awayTeam = 30){
    $awayName = 'Tennessee Titans';
}
else if($awayTeam = 31){
    $awayName = 'Indianapolis Colts';
}
else{
    $awayName = 'Jacksonville Jaguars';
}

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
                                        <th><center><?php echo 'Week ' . $week?> Scores</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while($gameRow = mysqli_fetch_assoc($gameResult)){
                                        
                                        $gameNum = $gameRow['game_id'];
                                        
                                        $sql = "SELECT team_num, team_city, team_name, team_logo
                                                FROM teams";//need where

                                        $teamResult = mysqli_query($conn, $sql);
                                        $teamRow = mysqli_fetch_assoc($teamResult);
                                        $teamName = $teamRow["team_name"];
                                        $teamLogo = $teamRow["team_logo"];
                                        
                                        $homeTeam = $gameRow['home_team'];
                                        $homeScore = $gameRow['home_score'];
                                
                                        $awayTeam = $gameRow['away_team'];
                                        $awayScore = $gameRow['away_score'];
                                        
                                        echo "<td> <img style='float:left;' hspace='5' WIDTH='50' src='data:image/jpeg;base64," . base64_encode( $teamLogo ) . "'/>" . $homeName . $homeScore ." vs " . $awayName . $awayScore . "</td>";
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