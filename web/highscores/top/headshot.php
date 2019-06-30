<?php
$head = "SELECT highscores.name, highscores.headshots FROM hsdb.highscores ORDER by highscores.headshots DESC LIMIT 1";
if ($headshot = mysqli_query($link, $head)) {
?>
<?php while ($row = mysqli_fetch_assoc($headshot)) { ?>	
		<?php echo $row['name']; ?> : <?php echo $row['headshots']; ?>   	
	<?php			
 }
 ?>

<?php
    mysqli_free_result($headshot);
}
?>

