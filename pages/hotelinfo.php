<!DOCTYPE html>
<html>
<head lang="en">
	<title>Hotel info</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link rel="stylesheet" href="info.css">
</head>
<body>
<?php
include_once ("functions.php");
if(isset($_GET['hotelid'])){
	$hotel=$_GET['hotelid'];
	connect();
	$sel='select * from hotels where id='.$hotel;
	$res=mysql_query($sel);
	$row=mysql_fetch_array($res,MYSQL_NUM);
	$hname=$row[1];
	$hstars=$row[4];
	$hcost=$row[5];
	$hinfo=$row[6];
	mysql_free_result($res);
	echo '<h1 class="text-center"><span>'.$hname.'<span></h1></header>';
	echo '<div class="text-center">';
	for ($i=0; $i<$hstars; $i++){
		echo '<image height="20px" width="20px" src="../images/stars.png">';
	}
	echo '</div><br>';
	echo '<div id="divinfo">';
	$p=explode('.',$hinfo);
	$i=count($p);
	$a=0;
	while ($a <= $i) {
		echo '<p>'.$p[$a].'</p>';
		$a++;
	}
	echo '</div>';
	$sel='select imagepath from images where hotelid='.$hotel;
	$res=mysql_query($sel);
	echo '<div class="divk">';
	echo '<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">';
    echo '<div class="carousel-inner" role="listbox" >';
    $i=0;//для слайдера
	while($row=mysql_fetch_array($res, MYSQL_NUM)){
		if ($i==0) $active="active"; else $active="";//для слайдера, чтоб у первой кортинки был класс актив
		echo '<div class="item '.$active.'" id="carusel"><img src="../'.$row[0].'" alt="..." width="100%"></div>';
		$i++;
	}
	mysql_free_result($res);
	echo '</div>';
	//Controls
	echo'<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">';
    echo'<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>';
    echo '<span class="sr-only">Previous</span> </a>';
    echo '<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>	
    		<span class="sr-only">Next</span></a>';
    echo '</div>';
    echo '</div>';

    echo '<div id="textcenter">';
	echo '<br><br><span id="cost">Cost: '.$hcost.' grn :) </span>';
	echo '<input type="submit" name="Book a room
			" value="Book a room" class="btn btn-success btn-lg">';
	echo '</div><br><br>';
    $sel='select us.login, co.comment
		from users us, comments co
		where co.userid=us.id and co.hotelid='.$hotel;
	$res2=mysql_query($sel);
	echo '<div class="divk">';
	echo '<br><h3 id="cost"><br> Comments:</h3>';
	while($row=mysql_fetch_array($res2,MYSQL_NUM)){
		echo '<span class="commentsspan">'.$row[0].':</span>';
		echo '<br>';
		echo '<div class="commentdiv">'.$row[1].'</div>';
	}
	echo '<div class="divk">';
	mysql_free_result($res2);
}

?>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>
