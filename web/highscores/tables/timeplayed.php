<?php
$time = "SELECT highscores.name, coalesce( FLOOR(highscores.plytime / 3600), 1) as totaltime FROM hsdb.highscores ORDER BY totaltime DESC LIMIT 10";


if ($timer = mysqli_query($link, $time)) {

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

<?php while ($row = mysqli_fetch_assoc($timer)) { 

?>	

  </tr>

	<tr> 
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['totaltime']; ?>h</td>
			
	<?php			

 }

 ?>

 </tr>

</table>

</div>



<?php

    mysqli_free_result($timer);

}



?>

