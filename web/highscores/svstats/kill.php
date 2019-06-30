<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<?php
$srv = "SELECT SUM(highscores.kills) AS kills FROM hsdb.highscores";
if ($srvr = mysqli_query($link, $srv)) {
?>
<?php while ($row = mysqli_fetch_assoc($srvr)) { 
?>	
<?php if ($themedark) { ?>
<div class="card text-white bg-dark mb-3">
<?php } ?>
<?php if ($themelight) { ?>
<div class="card text-black bg-light mb-3">
<?php } ?>
  <div class="card-header"><?php echo $svkill ?> </div>
  <div align="center" class="card-body">
  <i class="fas fa-fist-raised fa-5x"></i>
    <h5 class="card-title"><?php echo $svkilldesc ?> </h5>
    <p class="card-text"><?php echo $row['kills']; ?></p>
  </div>
</div>
<?php			
 }
 ?>
<?php
    mysqli_free_result($srvr);
}
?>
