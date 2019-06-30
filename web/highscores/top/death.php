<?php
$dea = "SELECT highscores.name, highscores.deaths FROM hsdb.highscores ORDER by highscores.deaths DESC LIMIT 1";
if ($death = mysqli_query($link, $dea)) {
?>
<?php while ($row = mysqli_fetch_assoc($death)) { ?>	
		<?php echo $row['name']; ?> : <?php echo $row['deaths']; ?>	
	<?php			
 }
 ?>

<?php
    mysqli_free_result($death);
}
?>

