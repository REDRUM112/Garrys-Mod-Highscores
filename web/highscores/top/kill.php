<?php
$kill = "SELECT highscores.name, highscores.kills FROM hsdb.highscores ORDER by highscores.kills DESC LIMIT 1";
if ($killer = mysqli_query($link, $kill)) {
?>
<?php while ($row = mysqli_fetch_assoc($killer)) { ?>	
		<?php echo $row['name']; ?> : <?php echo $row['kills']; ?>	
	<?php			
 }
 ?>

<?php
    mysqli_free_result($killer);
}
?>

