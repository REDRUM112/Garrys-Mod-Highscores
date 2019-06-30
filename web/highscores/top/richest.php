<?php
$query = "SELECT darkrp_player.uid, darkrp_player.rpname, darkrp_player.wallet FROM darkrp.darkrp_player WHERE LENGTH(uid) = 10 ORDER by darkrp_player.wallet DESC LIMIT 1";
if ($result = mysqli_query($link, $query)) {
?>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>	
		<?php echo $row['rpname']; ?> : $<?php echo $row['wallet']; ?>	
	<?php			
 }
 ?>

<?php
    mysqli_free_result($result);
}
?>

