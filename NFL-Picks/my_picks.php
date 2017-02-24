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
<div class="container-fluid">
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
	 <div class="pull-right">
	 	<button id="picks-submit" class="form-control btn btn-success" onclick="submitPicks()">Save</button>
	 </div>
</div>
<div id="show" class="text-center table-responsive">



</div>
</div>
<div id="submitResult" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title edit-content">Save Pick</h4>
            </div>
            <div id="modalBody" class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
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

	function submitPicks() {
		var pick = $('input[name="pick"]:checked').val();
		var week = $('#weekSelect').val();
		var pool = $('#pool').val();

		var pick_td = $('input[name="pick"]:checked').closest('td');
		var game = $(pick_td).closest('tr').prop('id');

		var dataString = "week="+week+"&game="+game+"&pool="+pool+"&pick="+pick; 

		$.ajax({
			type: "POST",
			url: "submit_picks.php",
			data: dataString,
			success: function(result){
				$('#modalBody').html(result);
				$('#submitResult').modal('show');
			}
		})
	}



</script>
<?php include "footer.php"; ?>