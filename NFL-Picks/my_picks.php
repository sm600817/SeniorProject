<?php
$title = 'Pools';
$page = 'Pools';
include 'header.php';
?>
<?php
$poolId = $_GET["pool"];

?>
<div class="text-center">
    <ul class="nav nav-pills" style="display: inline-block;">
      <li><a href="pool_view.php?pool=<?php echo $poolId; ?>">Pool</a></li>
      <li class="active"><a href="#">My Picks</a></li>
    </ul>
</div>
<div>
	<select name="weekSelect" id="weekSelect">
		<option value="none">Select Week...</option>
		<?php
		for($i = 1; $i < 18; $i++){
			echo "<option value='$i'>$i</option>";
		}
		?>
	 </select>

</div>

<script>
	$(document).ready(function(){ 
	    $("#weekSelect").change(function(){ 
	      var week = $(this).val();
	      var dataString = "week="+week;
	      $("#simBtn").prop('disabled', false);

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