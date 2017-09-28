<?php
connect();
echo '<form action="index.php?page=1" method="post" class="form-inline">';
echo '<div class="row-fluid">';
echo '<select name="countryid" class="inputik">';
$res=mysql_query('select * from countries order by country');
echo '<option value="0">Select country...</option>';
while($row=mysql_fetch_array($res, MYSQL_NUM)){
	echo '<option value="'.$row[0].'">';
	echo $row[1].'</option>';
}
mysql_free_result($res);
echo '</select>';
echo '<input type="submit" name="sub1" value="Select Country" Class="btn btn-info">';
echo '</div>';

if(isset($_POST['sub1'])){
	if($_POST['countryid'] == 0) exit();
	echo '<div class="row-fluid">';
	echo '<select name="cityid" class="inputik">';
	echo '<option value="0">Select city..</option>';
	$countryid=$_POST['countryid'];
	$sel='select * from Cities where countryid='.$countryid.' order by city';
	$res2=mysql_query($sel);
	while($row=mysql_fetch_array($res2, MYSQL_NUM)){
		echo '<option value="'.$row[0].'">';
		echo $row[1].'</option>';
	}
	mysql_free_result($res2);
	echo '</select>';
	echo '<input type="submit" name="sub2" value="Select City" Class="btn btn-info">';
	echo '</form>';
	echo '</div>';
}

if(isset($_POST['sub2'])){
	$cityid=$_POST['cityid'];
	$sel='select ho.hotel, co.country, ci.city, ho.cost, ho.id
	from Hotels ho, Countries co, Cities ci
	where ho.countryid=co.id and ho.cityid=ci.id and ci.id='.$cityid;
	echo '<table width="100%" class="table table-striped">';
	echo '<tr><th>Hotel</th><th>Country</th><th>City</th><th>Cost</th><th>Info</th></tr>';
	$res3=mysql_query($sel);
	while($row=mysql_fetch_array($res3,MYSQL_NUM)){
		echo '<tr>';
		echo '<td>'.$row[0].'</td>';
		echo '<td>'.$row[1].'</td>';
		echo '<td>'.$row[2].'</td>';
		echo '<td>'.$row[3].'</td>';
		echo '<td><a target="_blank" href="pages/hotelinfo.php?hotelid='.$row[4].'"><span id="spaninfo">more info..<span></a></td>';
		echo '</tr>';
	}
	mysql_free_result($res3);
	echo '</table>';
}
?>