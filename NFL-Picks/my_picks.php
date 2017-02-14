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
<ul class="nav nav-pills" style="display: inline-block;">
      <li class="active"><a href="#">Week 1</a></li>
      <li><a href="#">Week 2</a></li>
</ul>


<?php include "footer.php"; ?>