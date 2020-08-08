<?php 
include("../include/header.php");
include("../include/login.php");
?>
<link rel="stylesheet" href="../css/statement.css">

<!--second column-->
<div class="col-sm-9 col-md-10" >
	<br>
<div class="container">
	<div class="row text-center mx-5">
		<div class="col-sm-6 mt-5">
			<div class="card text-white bg-success mb-3" style="max-width:20rem;">
				<div class="card-header">
					<p>Show All Statements</p>
				</div>
				<div class="card-body">
					<p>Click Below</p>
				</div>
				<div class="card-title">
					<a class="btn btn-danger" data-target="#allstatement" data-toggle="modal">Get Data</a>
      	    	</div>
			</div>
		</div>
			<div class="col-sm-6 mt-5">
				<div class="card text-white bg-warning mb-3" style="max-width:20rem; margin-left:130px;";>
					<div class="card-header">
						<p>Show Particular Statement</p>
					</div>
					<div class="card-body">
						<p>Click Below</p>
					</div>
					<div class="card-title">
						<a class="btn btn-primary" data-target="#datestatement" data-toggle="modal">Get Data</a>
					</div>
				</div>
			</div>
		</div>
		<!--Modal class-->
			<div class="modal" id="datestatement" role="dialog">
			<form class="modal-content" method="post" action="statement1.php">
				<div class="container">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h1>Statements</h1>
					<p> Please Fill In This Form To Get Your Statement.</p>
					<hr>
					<label for="First Name"><b>First Name</b></label>
					<input type="text" placeholder="Enter First Name" class="firstname" name="firstname" required/><br>

					<label for="lastname"><b>Last Name</b></label>
					<input type="text" placeholder="Enter Last Name" class="lastname" name="lastname" required/><br>

					<label for="accountno"><b>Account Number</b></label>
					<input type="text" placeholder="Enter The Account Number" class="accountno" name="accno" required/><br>

					<label for="accountno"><b>Starting Date</b></label>
					<input type="text" placeholder="Enter The Starting Date" class="startdate" name="startdate" required/><br>

					<label for="accountno"><b>Ending Date</b></label>
					<input type="text" placeholder="Enter The Ending Date" class="enddate" name="enddate" required/><br>
					<button type="submit" class="btn btn-success" name="particularstatement">Submit</button>
				</div>
				</div>
			</form>
		</div>
	
		<div class="modal" id="allstatement" role="dialog">
			<form class="modal-content" method="post" action="statement1.php">
				<div class="container">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h1>Statements</h1>
					<p> Please Fill In This Form To Get Your Statement.</p>
					<hr>
					<label for="First Name"><b>First Name</b></label>
					<input type="text" placeholder="Enter First Name" class="firstname" name="firstname" required/><br>

					<label for="lastname"><b>Last Name</b></label>
					<input type="text" placeholder="Enter Last Name" class="lastname" name="lastname" required/><br>

					<label for="accountno"><b>Account Number</b></label>
					<input type="text" placeholder="Enter The Account Number" class="accountno" name="accno" required/><br>
					<button type="submit" class="btn btn-success" name="showallstatement">Submit</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html> 