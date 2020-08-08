<?php 
include("../include/header.php");
include("../include/login.php");
 ?>
<link rel="stylesheet" href="../css/deposite.css">

<!--second column-->
<div class="col-sm-9 col-md-10" >
	<br>
<div class="container" id="hello">
		<h3 id="heading">Deposite Money</h3>
		<hr>
		<label id="fname">Account Holder First Name :</label><input type="text" id="firstname"><br>
		<label id="lname">Account Holder Last Name :</label><input type="text" id="lastname"><br>
		<label id="accno">Account Number :</label><input type="text" id="accountno"><br>
		<label id="depositername">Depositer Name :</label><input type="text" id="depositernames"><br>
		<label id="depositeddate">Deposited Date :</label><input type="text" id="depositeddates"><br>
		<label id="amount">Amount :</label><input type="text" id="amounts">
		<br><br><br>
		<a class="btn btn-danger" data-target="#confirm" data-toggle="modal" id="btn" onclick="data();">Confirm</a>
		<div class="modal" id="confirm" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="text-success text-center">Confirm Data</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body">
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<label class="fname">Account Holder First Name: <input type="text" class="firstname" id="frname" name="firstname"></label>
						<label class="lname">Account Holder Last Name: <input type="text" class="lastname" id="lrname" name="lastname"></label>
						<label class="accno">Account Number: <input type="text" class="accnumber" id="acno" name="accountnumber"></label>
						<label class="depositername">Depositer Name: <input type="text" class="depositename" id="deponame" name="depositername"></label>
						<label class="depositeddate">Deposited Date: <input type="text" class="depositeddates" id="depodate" name="depositeddate"></label>
						<label class="amount">Deposited Amount: <input type="text" class="amounts"id="amt" name="depositedamount"></label>
						<br><br>
						<script>
						function data()
						{
							var fname= document.getElementById("firstname").value;
							var lname=document.getElementById("lastname").value;
							var accno=document.getElementById("accountno").value;
							var deponame=document.getElementById("depositernames").value;
							var depodate=document.getElementById("depositeddates").value;
							var amt=document.getElementById("amounts").value;

							document.getElementById("frname").value=fname;
							document.getElementById("lrname").value=lname;
							document.getElementById("acno").value=accno;
							document.getElementById("deponame").value=deponame;
							document.getElementById("depodate").value=depodate;
							document.getElementById("amt").value=amt;
						}
						</script>
						<button class="btn btn-success" name="submit">Submit</button>
					    	<?php
		             			if (isset($_POST['submit']))
		             			{
   		               				$data=new Transcations();
   	           		   				$fname=$_POST['firstname'];
   		               				$lname=$_POST['lastname'];
   		               				$accno=$_POST['accountnumber'];
   		               				$depositername=$_POST['depositername'];
   		               				$depositeddate=$_POST['depositeddate'];
   		               				$amount=$_POST['depositedamount'];
   		               				$result=$data->deposite($fname,$lname,$accno,$depositername,$depositeddate,$amount);
										if($result==1)
											{
												?>
												<script>
													alert("Amount Deposited Successfully");
												</script>
												<?php
											}
											elseif($result==2)
											{
												?>
												<script>
													alert("Check The Username And Account Number Again.Specific Account Not Found");
												</script>
												<?php
											}
											else
											{
												?>
												<script>
													alert("Amount Could Not Be Deposited.Please Try Again Later!");
												</script>
												<?php
											}

									}
               				?>
               			</form>
					</div>
				</div>
			</div>
		</div>
</div>
</div>
</body>
</html>