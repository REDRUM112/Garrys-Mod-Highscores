<?php
$dea = "SELECT highscores.name, highscores.deaths FROM hsdb.highscores ORDER by highscores.deaths DESC LIMIT 10";


if ($death = mysqli_query($link, $dea)) {

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

    <th>Total Deaths</th>

<?php while ($row = mysqli_fetch_assoc($death)) { 

?>	

  </tr>

	<tr> 
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['deaths']; ?></td>
			
	<?php			

 }

 ?>

 </tr>

</table>

</div>



<?php

    mysqli_free_result($death);

}



?>

