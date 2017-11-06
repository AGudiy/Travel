<?php
include_once('functions.php');
connect();
$cid=$_GET['cid'];
$sel='select * from cities where countryid='.$cid;
$res=mysql_query($sel);
echo '<option value="0">select city</option>';
while ($row=mysql_fetch_array($res,MYSQL_NUM)) {
echo '<option value="'.$row[0].'">'.$row[1].'</options>';
}
mysql_free_result($res);