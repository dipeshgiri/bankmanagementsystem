<?php include ('../include/login.php');
$user= new user();
$username=$_POST['Username'];
$password=$_POST['Password'];
$check=$user->check_login($username,$password);
if($check==1)
{
	echo"You'r logged in";
}
else
{
	echo "Please try Again";
}


?>