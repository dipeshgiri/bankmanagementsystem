<?php 
include("../include/header.php");
include("../include/login.php");
 ?>
 <link rel="stylesheet" href="../css/withdraw.css">

<!--second column-->
<div class="col-sm-9 col-md-10" >
	<br>
<div class="container" id="hello">
		<h3 id="heading">WithDraw Money</h3>
		<hr>
		<label id="fname">Account Holder First Name :</label><input type="text" id="firstname"><br>
		<label id="lname">Account Holder Last Name :</label><input type="text" id="lastname"><br>
		<label id="accno">Account Number :</label><input type="text" id="accountno"><br>
		<label id="chqno">Cheque Number :</label><input type="text" id="chequeno"><br>
	    <label id="Withdrawername">WithDrawer Name :</label><input type="text" id="withdrawernames"><br>
		<label id="Withdrawndate"> Date :</label><input type="text" id="withdrawndates"><br>
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
						<label class="chqno">Cheque Number: <input type="text" class="cheqnumber" id="cheqno" name="chequenumber"></label>
						<label class="withdrawername">WithDrawer Name: <input type="text" class="withdrawname" id="withdrawname" name="withdrawername"></label>
						<label class="withdrawdate">WithDraw Date: <input type="text" class="withdrawndates" id="withdrawdate" name="withdrawdate"></label>
						<label class="amount">WithDrawn Amount: <input type="text" class="amounts"id="amt" name="withdrawnamount"></label>
						<br><br>
						<script>
						function data()
						{
							var fname= document.getElementById("firstname").value;
							var lname=document.getElementById("lastname").value;
							var accno=document.getElementById("accountno").value;
							var chqno=document.getElementById("chequeno").value;
							var withdrawname=document.getElementById("withdrawernames").value;
							var withdrawdate=document.getElementById("withdrawndates").value;
							var withdrawamt=document.getElementById("amounts").value;

							document.getElementById("frname").value=fname;
							document.getElementById("lrname").value=lname;
							document.getElementById("acno").value=accno;
							document.getElementById("cheqno").value=chqno;
							document.getElementById("withdrawname").value=withdrawname;
							document.getElementById("withdrawdate").value=withdrawdate;
							document.getElementById("amt").value=withdrawamt;
						}
					</script>
					<button class="btn btn-success" name="submit">Submit</button>
					<?php
					if(isset($_POST['submit']))
					{
						$data=new Transcations();
						$fname=$_POST['firstname'];
   		               	$lname=$_POST['lastname'];
   		               	$accno=$_POST['accountnumber'];
   		               	$chqno=$_POST['chequenumber'];
   		               	$withdrawername=$_POST['withdrawername'];
   		               	$withdrawndate=$_POST['withdrawdate'];
   		               	$withdrawnamount=$_POST['withdrawnamount'];
   		               	$result=$data->withdraw($fname,$lname,$accno,$chqno,$withdrawername,$withdrawndate,$withdrawnamount);
   		               	if($result==1)
   		               	{
   		               		?>
   		               		<script>
   		               		   alert("Cheque Number Mismatched .This Cheque Has Been Already Withdrawn ");
   		               		</script>
   		               		<?php
   		               	}
   		               	elseif($result==2)
   		               	{
   		               		?>
   		               		<script>
   		               		   alert("Cheque Bounce! Insufficent Balance Cheque Cannot Be WithDrawn.");
   		               		</script>
   		               		<?php
   		               	}
   		               	elseif($result==3)
   		               	{
   		               		?>
   		               		<script>
   		               			alert("Check The Username And Account Number Again.Specific Account Not Found");
   		               		</script>
   		               		<?php
   		               	}
   		               	elseif($result==4)
   		               	{
   		               		?>
   		               		<script >
   		               			alert("Cheque Has Been Cashed Successfully.");
   		               		</script>
   		               		<?php
   		               	}
   		               	else 
   		               	{
   		     	           ?>
   		     	           <script>
   		     	           	alert("Amount Cannot Be WithDrawn.Please Try Again.");
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
