<?php
$utime = "SELECT utime.playername, FLOOR(utime.totaltime / 3600) as totaltime FROM utime.utime ORDER BY utime.totaltime DESC LIMIT 10";


if ($utimer = mysqli_query($link, $utime)) {

?>

		<div class="data">
<?php if ($themedark) { ?>
		<table class="table table-striped table-dark">	
<?php } ?>
<?php if ($themelight) { ?>
	<table class="table table-striped">	
<?php }?>
		<tr>

		<th>Name</th>

    <th>Hours Played</th>

<?php while ($row = mysqli_fetch_assoc($utimer)) { 

?>	

  </tr>

	<tr> 
		<td><?php echo $row['playername']; ?></td>
		<td><?php echo $row['totaltime']; ?></td>
			
	<?php			

 }

 ?>

 </tr>

</table>

</div>



<?php

    mysqli_free_result($utimer);

}



?>

