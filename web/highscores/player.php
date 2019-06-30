<html lang="en">
<?php include 'connection/link.php'; 
?>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="/highscores/bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="/highscores/bootstrap/css/<?php echo $theme;?>.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <a class="navbar-brand" href="index.php">
    <img src="<?php echo $logo; ?>" width="30" height="30" class="d-inline-block align-top" alt="">
    <?php echo $name; ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fas fa-trophy"></i> <?php echo $navleader; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="serverstats.php"><i class="fas fa-globe-americas"></i> <?php echo $navserver; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="player.php"><i class="fas fa-search"></i> <?php echo $navsearch; ?><span class="sr-only">(current)</span></a>
      </li>
    </ul>
<ul class="navbar-nav ml-auto">
	<li>
	<?php if ($navtopkdr) { ?>
	<span class="badge badge-dark"><?php echo $navkdr; ?></span> 
	<?php include 'top/kdr.php'; } ?>
	
	<?php if ($navtopkills) { ?>
	<span class="badge badge-primary"><?php echo $navkills; ?></span>
	<?php include 'top/kill.php'; } ?>
	
	<?php if ($navtopdeaths) { ?>
	<span class="badge badge-danger"><?php echo $navdeaths; ?></span>
	<?php include 'top/death.php'; } ?>
	
	<?php if ($navtopheadshots) { ?>
	<span class="badge badge-warning"><?php echo $navheadshots; ?></span>
	<?php include 'top/headshot.php'; } ?>
	
	<?php if ($navtoprich) { ?>
	<span class="badge badge-success"><?php echo $navrich; ?></span>
	<?php include 'top/richest.php'; } ?> 
	
	<?php if ($navdefaulttime) { ?> 
	<span class="badge badge-info"><?php  echo $navtime;?> </span>  
	<?php include 'top/timeplayed.php';  } ?>
	
	<?php if ($navutime) { ?>
	<span class="badge badge-info"><?php echo $navutimetop; ?></span>
	<?php include 'top/utime.php';  } ?>
	
	</li>
	</ul>
  </div>
</nav>
<div class="jumbotron text-center">
  <h1><i class="fas fa-search"></i> <?php echo $navsearch; ?></h1>
  <p><?php echo $searchdesc; ?></p> 
</div>
			<div class="container">
	<form style="height:40px" action="" method="GET">
	<input class="form-control mr-sm-2" type="text" placeholder="<?php echo $searchinput; ?>" name="search">&nbsp;
	</form>
			<?php include'connection/search.php'; ?>
	</div>
			<?php mysqli_close($link); ?>
<div>
</body>
</html>