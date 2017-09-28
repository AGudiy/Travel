<?php
session_start();
include_once("pages/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Travel agency</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
</head>
<body>
<div class="container">
	<div class="row">
		<header class="col-sm-12 col-md-12 col-lg-12" >
		
		<?php
		include_once("pages/login.php");
		?>
		</header>
	</div>

<div class="row">
	<nav class="col-sm-12 col-md-12 col-lg-12">
	<?php
	include_once('pages/menu.php');
	?>
	</nav>
</div>

<div class="row">
	<selection class="col-sm-12 col-md-12 col-lg-12">
	<?php
	if(isset($_GET['page'])){
		$page=$_GET['page'];
		if($page==1)	
			include_once("pages/tours.php");
		if($page==2)
			include_once("pages/comments.php");
		if($page==3)
			include_once("pages/registration.php");
		if($page==5 && isset($_SESSION['radmin']))
			include_once("pages/private.php");
	}
	?>
	</selection>
</div>

<div class="row">
	<footer></footer>
</div>
</div>

<script src="https:ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootrstrap.min.js"></script>
</body>
</html>