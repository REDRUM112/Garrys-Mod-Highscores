<?php
$time = "SELECT highscores.name, coalesce( FLOOR(highscores.plytime / 3600), 1) as totaltime FROM hsdb.highscores ORDER BY totaltime DESC LIMIT 1";
if ($timer = mysqli_query($link, $time)) {
?>
<?php while ($row = mysqli_fetch_assoc($timer)) { ?>	
		<?php echo $row['name']; ?> : <?php echo $row['totaltime']; ?> Hours	
	<?php			
 }
 ?>

<?php
    mysqli_free_result($timer);
}
?>

