<?php
function connect(
	$host='localhost',
	$user='root',
	$pass='qwertyuiop34',
	$dbname='travels')
{
	$linc=mysql_connect($host,$user,$pass) or die ('connection error');
	mysql_select_db($dbname) or die ('DB open error');
	mysql_query("set names 'utf8'");
}



function register($login,$pass,$email)
{
	//блок проверки правильности данных
	$name=trim(htmlspecialchars($login));
	$pass=trim(htmlspecialchars($pass));
	$email=trim(htmlspecialchars($email));

	if($login==''||$pass==''||$email=='')
	{
		echo "<h3><span style='color:red;'>Fill All Required Fields!</span></h3>";
		return false;
	}
	if(strlen($login)<3||strlen($login)>30||strlen($pass)<3||strlen($pass)>30)
	{
		echo "<h3><span style='color:red;'>Values Length must Be Between 3 and 30!</span></h3>";
		return false;
	}
	$ins='insert into users
	(login,pass,email,roleid)
	values("'.$login.'","'.md5($pass).'","'.$email.'",2)';
	connect();
	mysql_query($ins);
	$err=mysql_errno();
	if ($err){
		if($err==1062){
			echo "<h3><span style='color:red;'>This login is already taken!</span></h3>";
		return false;
	}
		else
			{echo "<h3><span style='color:red;'>Error code:".$err."!</span></h3>";
		return false;}
	}
	return true;
}

function login($name,$pass)
{
	$name=trim(htmlspecialchars($name));
	$pass=trim(htmlspecialchars($pass));
	if ($name=="" || $pass=="")
	{
		echo "<h3><span style='color:red;'> Fill Add Required Fields!</span></h3>";
		return false;
	}
	if(strlen($name)<3 || strlen($name)>30 || strlen($pass)<3 || strlen($pass)>30) {
		echo "<h3><span style='color:red;'>
				Value Length Must Be Between 3 And 30!
				</span></h3>";
				return false;
	}
	connect();
	$sel='select * from users where login="'.$name.'" and pass="'.md5($pass).'"';
	$res=mysql_query($sel);
	if($row=mysql_fetch_array($res,MYSQL_NUM)){
		$_SESSION['ruser']=$name;
		$_SESSION['userid']=$row[0];
		if($row[5]==1)
		{
			$_SESSION['radmin']=$name;
			echo '<a href="ap.php">Admin Panel</a>';
		}
		return rtue;
	}
	else
	{
		echo "<h3/><span style='color:red;'>
			No Such User!</span><h3/>";
		return false;
	}
	mysql_free_result($res);
}
?>