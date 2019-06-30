<?php
$kd = "SELECT  highscores.name, coalesce( CAST(highscores.kills / highscores.deaths AS DECIMAL (4,2)), 1) as kdr FROM hsdb.highscores ORDER BY kdr DESC LIMIT 1";
if ($kdr = mysqli_query($link, $kd)) {
?>
<?php while ($row = mysqli_fetch_assoc($kdr)) { ?>	
		<?php echo $row['name']; ?> : <?php echo $row['kdr']; ?>% 	
	<?php			
 }
 ?>

<?php
    mysqli_free_result($kdr);
}
?>

