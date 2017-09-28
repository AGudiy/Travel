<div class="row">
<div class="col-sm-6 col-md-6 col-lg-6 left">
	<!-- section A: Countries form -->
	<?php
	echo '<form action="index.php?page=4" method="post" class="form-inline" id="formcountry">';
	echo '<input type="text" name="country" class="form-control" placeholder="Country">';
	echo '<input type="submit" name="addcountry" value="Add" class="btn btn-sm btn-info">';
	echo '<input type="submit" name="delcountry" value="Delete" class="btn btn-sm btn-warning">';
	echo "<br/><br/>";
	connect();
	$sel='select * from countries';
	$res=mysql_query($sel);
	echo '<table class="table table-striped">';
	while ($row=mysql_fetch_array($res, MYSQL_NUM)) {
		echo '<tr>';
		echo '<td>'.$row[0].'</td>';
		echo '<td>'.$row[1].'</td>';
		echo '<td><input type="checkbox" name="cb'.$row[0].'"></td>';
		echo '</tr>';
	}
	echo '</table>';
	mysql_free_result($res);
	echo '</form>';

	if(isset($_POST['addcountry'])){
		$country=trim(htmlspecialchars($_POST['country']));
		if($country=="") exit();
		$ins='insert into countries(country) values ("'.$country.'")';
		mysql_query($ins);
		echo "<script type='text/javascript'>";
		echo "window.location=document.URL;";
		echo "</script>";
	}
	if(isset($_POST['delcountry'])){
		foreach ($_POST as $k => $v){
			if (substr($k,0,2)=="cb"){
			$idc=substr($k,2);
			$del='delete from countries where id='.$idc;
			mysql_query($del);
			}
		}
		echo "<script type='text/javascript'>";
		echo "window.location=document.URL;";
		echo "</script>";
	}
	?>
</div>
</div>

<div class="row">
<div class="col-sm-6 col-md-6 col-lg-6 right">

</div>
</div>

<div class="row">
<div class="col-sm-6 col-md-6 col-lg-6 left">
</div>
</div>

<div class="row">
<div class="col-sm-6 col-md-6 col-lg-6 right">
</div>
</div>