<?php

$dob = "SELECT users.name, users.last_online, LEFT(users.created, 10) as created FROM ember.users ORDER by users.last_online DESC LIMIT 10";


if ($dobr = mysqli_query($link, $dob)) {

?>
	<div class="data">
<?php if ($themedark) { ?>
		<table class="table table-striped table-dark">	
<?php } ?>
<?php if ($themelight) { ?>
	<table class="table table-striped">	
<?php }?>
		<tr>

		<th>Last Connected</th>

    <th>First Joined</th>

<?php while ($row = mysqli_fetch_assoc($dobr)) { 

?>	

  </tr>

	<tr> 

		<td><?php echo $row['name']; ?></td>

			<td><?php echo $row['created']; ?></td>
<?php			

 }

 ?>

 </tr>

</table>

</div>



<?php

    mysqli_free_result($dobr);

}



?>

