<?php
$title = 'Pools';
$page = 'Pools';
include 'header.php';
?>
<?php
$poolId = $_GET["pool"];

$sql = "SELECT week_id
		FROM weeks
		WHERE was_played = 0
		GROUP BY was_played";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$week = $row["week_id"];

?>
<input type='number' id='pool' style='display:none;' value='<?php echo $poolId ?>'>
<div class="text-center">
    <ul class="nav nav-pills" style="display: inline-block;">
      <li><a href="pool_view.php?pool=<?php echo $poolId; ?>">Pool</a></li>
      <li class="active"><a href="#">My Picks</a></li>
    </ul>
</div>
<div class="row">
	<select class="selectpicker" name="weekSelect" id="weekSelect" data-style="btn-info" data-width="fit">
		<?php
		for($i = 1; $i < 18; $i++){
			if($i == $week)
				echo "<option selected='selected' value='$i'>Week $i</option>";
			else
				echo "<option value='$i'>Week $i</option>";
		}
		?>
	 </select>
</div>
<div id="show" class="text-center table-responsive">



</div>

<script>
	$(document).ready(function(){ 

		var week = $('#weekSelect').val();
		var pool = $('#pool').val();
		var dataString = "week="+week+"&pool="+pool;
		$.ajax({ 
	        type: "POST", 
	        url: "getWeek.php", 
	        data: dataString, 
	        success: function(result){ 
	          $("#show").html(result); 
	        }
	    });

	    $("#weekSelect").change(function(){ 
	      var week = $(this).val();
	      var dataString = "week="+week+"&pool="+pool;

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



</script>
<?php include "footer.php"; ?>