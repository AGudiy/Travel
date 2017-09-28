<ul class="nav nav-tabs nav-justified">
<li <?php if ($_GET['page']==1){echo "class='active'";}?>>
	<a href="index.php?page=1">Tours</a></li>
<li <?php if ($_GET['page']==2){echo "class='active'";}?>>
	<a href="index.php?page=2">Comments</a></li>
<li <?php if ($_GET['page']==3){echo "class='active'";}?>>
	<a href="index.php?page=3">Registration</a></li>
<?php
if(isset($_SESSION['radmin']))
{
	if($page==5)
		$c='active';
	else
		$c='';
	echo '<li class="'.$c.'">
<a href="index.php?page=5">private</a></li>';
}
?>
</ul>