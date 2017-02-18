<html>
	<head>
		<title>Senior Project</title>
		<script data-require="jquery@*" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
		<script>

			$(document).ready(function(){ 
			    $("#weekSelect").change(function(){ 
			      var week = $(this).val();
			      var dataString = "week="+week;
			      $("#simBtn").prop('disabled', false);
			      $("#result").html("");

			      $.ajax({ 
			        type: "POST", 
			        url: "getWeek.php", 
			        data: dataString, 
			        success: function(result){ 
			          $("#show").html(result); 
			        }
			      });

			    });
			});

			function simulate() {
				var btnStr;
				for(var i=1; i < 17; i++) {
					btnStr = "btn" + i;
					console.log(btnStr);
					btn = document.getElementById(btnStr);
					if(btn !== null){
						btn.click();
					}

				}
				document.getElementById("simBtn").disabled = true;

				var week = $('#weekSelect').val();

				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange=function(){
					if (xhttp.readyState==4 && xhttp.status==200){
						var data = xhttp.responseText;
						document.getElementById('result').innerHTML = data;
					}
				}//end onreadystatechange
				
				var link = "assign_pts.php?week=" + week;

				xhttp.open("GET", link, true);
				xhttp.send();

			}


			function simGame(game, awayId, homeId){
				var btnStr = "btn" + game;
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange=function(){
					if (xhttp.readyState==4 && xhttp.status==200){
						var data = xhttp.responseText;
						document.getElementById(game).innerHTML = data;
						document.getElementById(btnStr).disabled = true;
					}
				}//end onreadystatechange
				
				var link = "simulate.php?game=" + game + "&awayId=" + awayId + "&homeId=" + homeId;

				xhttp.open("GET", link, true);
				xhttp.send();
			}
		</script>
	</head>
	<body>
		<p id="result" style="line-height: 18px; font-size: 18px;  font-family: times;"></p>
		<br>
		Week <select name="weekSelect" id="weekSelect">
				<option value="none">Select Week...</option>
				<?php
				for($i = 1; $i < 18; $i++){
					echo "<option value='$i'>$i</option>";
				}
				?>
			 </select>
		<button id="simBtn" onclick="simulate()">Simulate </button>
		<br><br>
		<div id="show">



		</div>
	</body>
</html>