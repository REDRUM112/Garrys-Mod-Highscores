<?php
$time = "SELECT utime.playername, coalesce( FLOOR(utime.totaltime / 3600), 1) as totaltime FROM utime.utime ORDER BY totaltime DESC LIMIT 1";
if ($timer = mysqli_query($link, $time)) {
?>
<?php while ($row = mysqli_fetch_assoc($timer)) { ?>	
		<?php echo $row['playername']; ?> : <?php echo $row['totaltime']; ?> Hours	
	<?php			
 }
 ?>

<?php
    mysqli_free_result($timer);
}
?>

