<?php
$kill = "SELECT highscores.name, highscores.kills FROM hsdb.highscores ORDER by highscores.kills DESC LIMIT 10";


if ($killer = mysqli_query($link, $kill)) {

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

    <th>Total Kills</th>

<?php while ($row = mysqli_fetch_assoc($killer)) { 

?>	

  </tr>

	<tr> 
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['kills']; ?></td>
			
	<?php			

 }

 ?>

 </tr>

</table>

</div>



<?php

    mysqli_free_result($killer);

}



?>

