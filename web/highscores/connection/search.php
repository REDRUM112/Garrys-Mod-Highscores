<?php 



$sql = "SELECT highscores.name, highscores.steamid, highscores.kills, highscores.deaths, highscores.headshots, coalesce( FLOOR(highscores.plytime / 3600), 1) as totaltime, coalesce( CAST(highscores.kills / highscores.deaths AS DECIMAL (4,2)), 1) AS kdr FROM hsdb.highscores";



if( isset($_GET['search']) ){



    $name = mysqli_real_escape_string($link, htmlspecialchars($_GET['search']));



    $sql = "SELECT highscores.name, highscores.steamid, highscores.kills, highscores.deaths, highscores.headshots, coalesce( FLOOR(highscores.plytime / 3600), 1) as totaltime, coalesce( CAST(highscores.kills / highscores.deaths AS DECIMAL (4,2)), 1) AS kdr FROM hsdb.highscores WHERE highscores.name = '$name'
	UNION
	SELECT highscores.name, highscores.steamid, highscores.kills, highscores.deaths, highscores.headshots, coalesce( FLOOR(highscores.plytime / 3600), 1) as totaltime, coalesce( CAST(highscores.kills / highscores.deaths AS DECIMAL (4,2)), 1) AS kdr FROM hsdb.highscores WHERE highscores.steamid = '$name'";





}



if ($result = mysqli_query($link, $sql)) {



?>

 
<?php if ($themedark) { ?>
		<table class="table table-striped table-dark">	
<?php } ?>
<?php if ($themelight) { ?>
	<table class="table table-striped">	
<?php }?>

<tr>

<th>SteamID</th>



<th>Name</th>



<th>Most Kills</th>



<th>Most Deaths</th>



<th>Headshots</th>



<th>Kill Death Ratio</th>


<?php if ($defaulttime) { ?>
<th>Time Played</th>
<?php } ?>



</tr>



<?php



while ($row = mysqli_fetch_assoc($result)) {



    ?>



    <tr>

	<td><?php echo $row['steamid']; ?></td>

	

    <td><?php echo $row['name']; ?></td>



    <td><?php echo $row['kills']; ?></td>



    <td><?php echo $row['deaths']; ?></td>



    <td><?php echo $row['headshots']; ?></td>

  

    <td><?php echo $row['kdr']; ?>%</td>


	<?php if ($defaulttime) { ?>
    <td><?php echo $row['totaltime']; ?>h</td> 
	<?php } ?>



    </tr>



    <?php



}

}

?>





</table>



</div>





<?php



    mysqli_free_result($result);



?>