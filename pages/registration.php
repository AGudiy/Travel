<h3>Registration Form</h3>
<?php
include_once("pages/functions.php");
if(isset($_SESSION['ruser']))
{
	echo "<h3><span style='color:red;'></span><h3/>";
	exit();
}
if(!isset($_POST['regbtn']))
{
?>
<form action="index.php?page=3" method="post">

	<span class="form-group">
		<label for="name">Login:</label>
		<input type="text" class="form-control" name="login">
	<br/>
	</span>

	<span class="form-group">
	<label for="pass">Password:</label>
	<input type="password" class="form-control" name="pass">
	<br/>
	</span>


    <span class="form-group">
	<label for="email">Email address:</label>
	<input type="email" class="form-control" name="email">
	<br/>
	</span>

	<button type="submit" class="btn btn-primary" name="regbtn">Register</button>

</form>
<?php
}
else
{
	if(register($_POST['login'],$_POST['pass'],$_POST['email']))
	{
		echo "<h3><span style='color:green;'>New User Added</span><h3>";
	}
}

?> 