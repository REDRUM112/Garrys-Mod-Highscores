<?php
$head = "SELECT highscores.name, highscores.headshots FROM hsdb.highscores ORDER by highscores.headshots DESC LIMIT 10";


if ($headshot = mysqli_query($link, $head)) {

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

    <th>Total Headshot</th>

<?php while ($row = mysqli_fetch_assoc($headshot)) { 

?>	

  </tr>

	<tr> 
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['headshots']; ?></td>
			
	<?php			

 }

 ?>

 </tr>

</table>

</div>



<?php

    mysqli_free_result($headshot);

}



?>

