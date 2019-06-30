<?php
$kd = "SELECT  highscores.name, coalesce( CAST(highscores.kills / highscores.deaths AS DECIMAL (4,2)), 1) as kdr FROM hsdb.highscores ORDER BY kdr DESC LIMIT 10";


if ($kdr = mysqli_query($link, $kd)) {

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

    <th>Kill Death Ratio</th>

<?php while ($row = mysqli_fetch_assoc($kdr)) { 

?>	

  </tr>

	<tr> 
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['kdr']; ?>%</td>
			
	<?php			

 }

 ?>

 </tr>

</table>

</div>



<?php

    mysqli_free_result($kdr);

}



?>

