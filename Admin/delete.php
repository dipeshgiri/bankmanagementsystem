<?php
include("../include/login.php");
$id=$_GET['id'];
$delete=new delete();
$check=$delete->deletedata($id);
if($check==1)
	{
		header("Location:Dashboard.php");
	}
else
	{
		echo"Error occured please try again";
	}

?>