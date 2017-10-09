<?php
/*
Для перехода в админ панель нужно ввести:
"логин: travaler 
пароль: travaler
После высветится ссылка на админ панель
*/
session_start();
include_once("pages/functions.php");
if(!isset($_SESSION['radmin']))
{
	echo "<h3><span style='color:red;'>For Administrator Only!</span><h3/>";
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Travel agency</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<style type="text/css">
	body{
		background-attachment: fixed;
	}
	</style>
</head>


<body>

<div class="container">


<div class="row">
	<header id="header">
	Admin panel
	</header>

</div>


<div class="row">
<ul class="nav nav-pills">
<li role="presentation" <?php if ($_GET['menu']==1) echo 'class="active"';?>><a href="ap.php?menu=1">Countries</a></li>
<li role="presentation"<?php if ($_GET['menu']==2) echo 'class="active"';?>><a href="ap.php?menu=2">Cities</a></li>
<li role="presentation"<?php if ($_GET['menu']==3) echo 'class="active"';?>><a href="ap.php?menu=3">Hotels</a></li>
<li role="presentation"<?php if ($_GET['menu']==4) echo 'class="active"';?>><a href="ap.php?menu=4">Users</a></li>
</ul>
</div>




<div class="row">
	<?php
if(isset($_GET['menu'])){
	$menu=$_GET['menu'];
	if($menu==1) include_once("pages/fcountries.php");
	if($menu==2) include_once("pages/fcities.php");
	if($menu==3) include_once("pages/fhotels.php");
	if($menu==4) include_once("pages/private.php");
}
	?>
</div>

</div>
</body>
</html>