<?php include("../include/header.php"); ?>
<?php include("../include/login.php");  ?>
<link rel="stylesheet" href="../css/users.css">
   <!--start of the 2nd column of side bar-->
				<div class="col-sm-9 col-md-10">
					<div class="row text-center mx-5">
						<div class="col-sm-6 mt-5">
							 <div class="card text-white bg-danger mb-3" style="max-width:18rem;">
							    <div class="card-header">
							    	<p>Show All Users Data</p>
							    </div>
							    <div class="card-body">
							    	<?php echo "Click Below";?>
							    </div>
							    	<div class="card-title">
                                            <a href="userdata1.php" style="color:white;">Get Data</a>
							    	</div>

							    </div>
							 </div>
							 <div class="col-sm-6 mt-5">
							 <div class="card text-white bg-success mb-3" style="max-width:18rem;">
							    <div class="card-header">
							    	<p>Search Users By Name</p>
							    </div>
							    <div class="card-body">
							    	<?php echo "Click Below";?>
				 			    </div>
							    	<div class="card-title">
                                        <a href="showuserbyname.php" style="color:white;">Get Data</a>
							    	</div>

							    </div>
							 </div>
							</div>
						
						<div class="row text-center mx-5">
							<div class="container">
								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
								<br>
							<h4>Search User By Acc Number</h4>
							<hr>
							<label>Account Number </label><input type="text" name="accno" id="accno">
							<br>
							<button class="btn btn-info text-white" name="submit">Search</button>
                              </form>
							</div>
						</div>

						<br>
						<div class="tables">
							<h4>Details</h4>
		       <?php
                     if(isset($_POST['submit']))
                     {
                     	$accno=$_POST['accno'];
                     	
                     	$data=new userdetails();
                     	$data->showdetailbyaccno($accno);
                    }
                     ?>

					</div>
				</div>
	

	</body>
	</html>