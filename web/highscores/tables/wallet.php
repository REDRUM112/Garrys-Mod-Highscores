<?php
$query = "SELECT darkrp_player.uid, darkrp_player.rpname, wallet FROM darkrp.darkrp_player WHERE LENGTH(uid) = 10 ORDER by darkrp_player.wallet DESC LIMIT 10";


if ($result = mysqli_query($link, $query)) {

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

    <th>Wallet</th>

<?php while ($row = mysqli_fetch_assoc($result)) { 

?>	

  </tr>

	<tr> 

		<td><?php echo $row['rpname']; ?></td>

			<td>$<?php echo $row['wallet']; ?></td>

<?php			

 }

 ?>

 </tr>

</table>

</div>



<?php

    mysqli_free_result($result);

}

?>