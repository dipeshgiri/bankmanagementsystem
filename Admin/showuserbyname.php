<?php include("../include/header.php"); ?>
<?php include("../include/login.php");?>
<!--second column-->
<div class="col-sm-9 col-md-10">
	<br>
<div class="container" style="margin-top:40px; margin-left:auto;height:250px; width:450px; background:#0099FF;">

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<h3 style="text-align: center; color:white;">Search User By Name</h3>
		<hr>
		<label style="margin-top:10px; color:white; ">Account Holder First Name :</label><input type="text" name="fname" style="outline:none; border:none; border-bottom:1px solid white; color:white; background: transparent; text-align:center; margin-left:20px; height:15px;">
		<label style="margin-top:10px; color:white;">Account Holder Last Name :</label><input type="text" name="lname" style="outline:none; border:none; border-bottom:1px solid white; color:white; background: transparent; text-align:center; margin-left:20px; height:15px;">
		<br>
		<button class="btn btn-warning btn-hover" style="margin-left:180px;margin-top:10px;" name="submit">Search</button>

		<?php
		if (isset($_POST['submit'])) 
		{
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$data=new userdetails();
			$data->showdetailbyname($fname,$lname);
		}
		?>
		
	</form>

</div>
</div>
</body>
</html>