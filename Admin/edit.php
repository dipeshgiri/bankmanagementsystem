<?php include("../include/header.php"); ?>
<?php include("../include/login.php"); ?>
<!--secind column-->
<div class="col-sm-9 col-md-10">
	<?php
	$edit=new edit();
	$var=$edit->basicdetails();
	$id=$var['ID'];
	?>
		<h2 class="text-center" style="margin-top:30px;"><?php echo $var['First Name']; echo" ";echo $var['Last Name'];?></h2>
             	<br>
             	<div class="col" style="width:500px; float:left;">
             		<style>
             			.table #fname,#lname,#fathername,#mothername,#grandfathername,#grandmothername,#accno,#phonenumber,#email,#address,#gender,#dateofbirth,#nationality,#citizenship
             			{
             				border:none;
             				outline:none;
             				border-bottom: 1px solid black;
             				background:transparent;
             				width:200px;
             				text-align:center;
             			}
             		</style>
            <form method="post" action="edit1.php?id=<?php echo $id;?>">
             	<table class="table table-bordered table-hover">
             		<tr>
             			<td>First Name</td>
             			<td><input type="text" name="fname" id="fname" value="<?php echo $var['First Name'];?>" required/></td>
             		</tr>
             		<tr>
             			<td>Last Name</td>
             			<td><input type="text" name="lname" id="lname" value="<?php echo $var['Last Name'];?>"required/></td>
             		</tr>
             		<tr>
             			<td>Father Name</td>
             			<td><input type="text" name="fathername" id="fathername" value="<?php echo $var['Father Name']; ?>" required/></td>
             		</tr>

             		<tr>
             			<td>Mother Name</td>
             			<td><input type="text" name="mothername" id="mothername" value="<?php echo $var['Mother Name']; ?>" required/></td>
             		</tr>

             		<tr>
             			<td>GrandFather Name</td>
             			<td><input type="text" name="grandfathername" id="grandfathername" value="<?php echo $var['GrandFather Name']; ?>"required/></td>
             		</tr>

             		<tr>
             			<td>GrandMother Name</td>
             			<td><input type="text" name="grandmothername" id="grandmothername" value="<?php echo $var['GrandMother Name']; ?>"required/></td>
             		</tr>

             		<tr>
             			<td>Account Number</td>
             			<td class="text-danger"><input type="text" name="accno" id="accno" value="<?php echo $var['Account Number']; ?>" readonly="readonly"></td>
             		</tr>

             		<tr>
             			<td>Phone Number</td>
             			<td><input type="text" name="phonenumber" id="phonenumber" value="<?php echo $var['Phone Number']; ?>" required/></td>
             		</tr>

             		<tr>
             			<td>Email Address</td>
             			<td><input type="text" name="email" id="email" value="<?php echo $var['Email Address']; ?>"required/></td>
             		</tr>

             		<tr>
             			<td>Address</td>
             			<td><input type="text" name="address" id="address" value="<?php echo $var['Address']; ?>" required/></td>
             		</tr>
             		
             		<tr>
             			<td>Gender</td>
             			<td><input type="text" name="gender" id="gender" value="<?php echo $var['Gender']; ?>" required/></td>
             		</tr>
             		
             		<tr>
             			<td>Date Of Birth</td>
             			<td><input type="text" name="dateofbirth" id="dateofbirth" value="<?php echo $var['Date Of Birth']; ?>"required/></td>
             		</tr>
             		

             		<tr>
             			<td>Nationality</td>
             			<td><input type="text" name="nationality" id="nationality" value="<?php echo $var['Nationality']; ?>"required/></td>
             		</tr>
             		
             		<tr>
             			<td>CitizenShip Number</td>
             			<td><input type="text" name="citizenshipnumber" id="citizenship" value="<?php echo $var['Citizenship Number']; ?>"required/></td>
             		</tr>
             	</table>    
             	 <button class="btn btn-success" name="update" value="submit">Update</button>
    
             </form>
             	
             </div>

             <div class="col" style="width:400px; float:left;">
             <img src="../photos/<?php echo $var['Photo'];?>" style="height:50mm; width:50mm;">
             <br>
             <br>
             <img src="../photos/<?php echo $var['Citizenship Front'];?>" style="height:60mm; width:100mm;">
             <br>
             <br>
             <img src="../photos/<?php echo $var['Citizenship Back'];?>" style="height:60mm; width:100mm;">
           
             </div>
	</div>
</body>
</html>