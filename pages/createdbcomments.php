<?php
include_once ('functions.php');
connect();
$ct7='create table comments(
id int not null auto_increment primary key, 
comment varchar(1024),
hotelid int,
foreign key(hotelid) references hotels(id) on delete cascade,
userid int,
foreign key(userid) references users(id) on delete cascade
) default charset="utf8"';

mysql_query($ct7);
$err=mysql_errno();
if ($err) {
	echo 'Error code 7:'.$err.'<br>';
	exit();
}
