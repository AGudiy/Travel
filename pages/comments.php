<?php
connect();
/*echo '<form action="index.php?page=2" method="post" class="form-inline">';
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

if(isset($_POST['sub1'])){
	if($_POST['countryid'] == 0) exit();
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
}

if(isset($_POST['sub2'])){
	if($_POST['cityid'] == 0) exit();
	//от этого места и до след '//' код написан для того, чтоб после нажатия саб2 селектСити и саб2 были видны
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
	//
	echo '<select name="hotelid" class="inputik">';
	echo '<option value="0">Select hotel..</option>';
	$cityid=$_POST['cityid'];
	$sel='select * from hotels where cityid='.$cityid;
	$res3=mysql_query($sel);
	while ($row=mysql_fetch_array($res3, MYSQL_NUM)){
		echo '<option value="'.$row[0].'">';
		echo $row[1].'</option>';
	}
	mysql_free_result($res3);
	echo '</select>';
	echo '<input type="submit" name="sub3" value="Show comments about this hotel" class="btn btn-success">';
}



if(isset($_POST['sub3'])){
	if($_POST['hotelid'] == 0) exit();
	$hotelid=$_POST['hotelid'];
	$sel='select * from hotels where id='.$hotelid;
	$res4=mysql_query($sel);
	$row=mysql_fetch_array($res4,MYSQL_NUM);
	$hname=$row[1];
	$_SESSION['hotelid']=$row[0];
	mysql_free_result($res4);
	echo '<h2 class="text-center"><span id="header">'.$hname.'<span></h2></header><br><br>';
	$sel='select * from comments where hotelid='.$hotelid;
	echo '<table class="table">';
	echo '<tr><th>Comments:</th></tr>';
	$res5=mysql_query($sel);
	while($row=mysql_fetch_array($res5, MYSQL_NUM)){
	echo '<tr><td>'.$row[1].'</td></tr>';
	}
	mysql_free_result($res5);
	echo '</table>';
	echo '<textarea name="comment" placeholder="comment.." id="textareaone"></textarea>
	<br>
	<input type="submit" name="sub4" value="Add Comment" class="btn btn-success">';
}
echo '</form>';



if(isset($_POST['sub4'])){

	$hotelid=$_SESSION['hotelid'];
	$userid=$_SESSION['userid'];
	$comment=htmlspecialchars($_POST['comment']);
	if($comment=="") exit();
	$ins = 'insert into comments (comment, hotelid, userid) 
	values ("'.$comment.'",'.$hotelid.','.$userid.')';
	mysql_query($ins);
	$sel='select * from hotels where id='.$hotelid;
	$res4=mysql_query($sel);
	$row=mysql_fetch_array($res4,MYSQL_NUM);
	$hname=$row[1];
	mysql_free_result($res4);
	echo '<form action="index.php?page=2" method="post">';
	echo '<h2 class="text-center"><span id="header">'.$hname.'<span></h2></header><br><br>';
	$sel='select * from comments where hotelid='.$hotelid;
	echo '<div class="divik" style="background-color:white;">';
	echo '<table class="table">';
	echo '<tr><th>Comments:</th></tr>';
	$res5=mysql_query($sel);
	while($row=mysql_fetch_array($res5, MYSQL_NUM)){
	echo '<tr><td>'.$row[1].'</td></tr>';
	}
	mysql_free_result($res5);
	echo '</table>';
	echo '</div>';
	echo '<textarea name="comment" placeholder="comment.." id="textareaone"></textarea>
	<br>
	<input type="submit" name="sub4" value="Add Comment" class="btn btn-success">';
}

echo '</form>';*/

	echo '<form action="index.php?page=2" method="post"  class="form-inline" id="formcomments">';
	$sel='Select ho.id, ho.hotel, ci.city, co.country
	from countries co, cities ci, hotels ho 
	where ho.countryid=co.id and ho.cityid=ci.id';
	$res=mysql_query($sel);
	echo '<select class="inputik1" name="hid">';
	while($row=mysql_fetch_array($res,MYSQL_NUM)){
		echo '<option value="'.$row[0].'">';
		echo $row[1].' : '.$row[2].' : '.$row[3];
		echo '</option>';
	}
	mysql_free_result($res);
	echo '</select>';
	echo '<input type="submit" name="showcomments" class="btn btn-success" value="Show Comments">';


	if(isset($_POST['showcomments'])){
		$hotelid=$_POST['hid'];
		$_SESSION['hotelid']=$hotelid;
		echo '<br>';
		$sel='select hotel from hotels where id='.$hotelid;
		$res1=mysql_query($sel);
		$row=mysql_fetch_array($res1);
		$hotel=$row[0];
		$_SESSION['hotel']=$hotel;
		echo '<span id="header" >'.$hotel.'<span><br>';
		mysql_free_result($res1);
		echo '<textarea name="comment" placeholder="comment.." id="textareaone"></textarea>
			<br>
			<input type="submit" name="addcomment" value="Add Comment" class="btn btn-success">
			<br>';
		$sel='select us.login, co.comment
		from users us, comments co
		where co.userid=us.id and co.hotelid='.$hotelid;
		$res2=mysql_query($sel);
		while($row=mysql_fetch_array($res2,MYSQL_NUM)){
			echo '<span class="commentsspan">'.$row[0].':</span>';
			echo '<br>';
			echo '<div class="commentdiv">'.$row[1].'</div>';
		}
		mysql_free_result($res2);
	}

	if(isset($_POST['addcomment'])){
		$comment=$_POST['comment'];
		$hotelid=$_SESSION['hotelid'];
		$userid=$_SESSION['userid'];
		$ins='insert into comments(comment,hotelid,userid) value("'.$comment.'",'.$hotelid.','.$userid.')';
		mysql_query($ins);
		$hotel=$_SESSION['hotel'];
		echo '<span id="header" ><br>'.$hotel.'<span><br>';
		echo '<textarea name="comment" placeholder="comment.." id="textareaone"></textarea>
			<br>
			<input type="submit" name="addcomment" value="Add Comment" class="btn btn-success">
			<br>';
		$sel='select us.login, co.comment
		from users us, comments co
		where co.userid=us.id and co.hotelid='.$hotelid;
		$res2=mysql_query($sel);
		while($row=mysql_fetch_array($res2,MYSQL_NUM)){
			echo '<span class="commentsspan">'.$row[0].':</span>';
			echo '<br>';
			echo '<div class="commentdiv">'.$row[1].'</div>';
		}
		mysql_free_result($res2);
	}
echo '</form>';
?>