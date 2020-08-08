<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<!--font awesome link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Dashboard.css">
</head>
<body>
<nav class="navbar navbar-dark navbar-expand-lg fixed-top shadow bg-primary"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../frontpage.html" >Banking System</a></nav>
<div id="wrapper">
	<!--sidebar-->
	<div class="contanier-fluid" style="margin-top:40px;">
		<div class="row">
			<nav class="col-sm-2 bg-light sidebar py-5"><!--start sidebar first column-->
				<div class="sidebar-sticky">
					<ul class="nav flex-column">
						<li class="nav-item"><a class="nav-link <?php if(PAGE=='Dashboard'){echo 'active';}?>" href="Dashboard.php"><i class="fa fa-home"></i> Home</a></li>
						<li class="nav-item"><a class="nav-link <?php if(PAGE=='Transcations'){echo 'active';}?>" href="Transcation.php"><i class="fa fa-btc"></i> Transcations</a></li>
						<li class="nav-item"><a class="nav-link <?php if(PAGE=='Users'){echo 'active';}?>" href="userdata.php"><i class="fa fa-user"></i> Users</a></li>
						<li class="nav-item"><a class="nav-link <?php if(PAGE=='Deposite'){echo 'active';}?>" href="deposite.php"><i class="fa fa-money"></i> Deposite Money</a></li>
						<li class="nav-item"><a class="nav-link <?php if(PAGE=='Withdraw'){echo 'active';}?>" href="withdraw.php"><i class="fa fa-money"></i> WithDraw Money</a></li>
						<li class="nav-item"><a class="nav-link <?php if(PAGE=='Statements'){echo 'active';}?>" href="statements.php"><i class="fa fa-file"></i> Statements</a></li>
						<li class="nav-item"><a class="nav-link <?php if(PAGE=='Block'){echo 'active';}?>" href="blockuser.php"><i class="fa fa-ban"></i> Block User</a></li>
						<li class="nav-item"><a class="nav-link <?php if(PAGE=='Setting'){echo 'active';}?>" href="setting.php"><i class="fa fa-gear"></i> Settings</a></li>

						<li class="nav-item"><a class="nav-link <?php if(PAGE=='Loan'){echo 'active';}?>" href="loan.php"><i class="fa fa-bitcoin"></i> Loan</a></li>

						<li class="nav-item"><a class="nav-link <?php if(PAGE=='Log Out'){echo 'active';}?>" href="logout.php"><i class="fa fa-user"></i> Log Out</a>
						</li>						
						</ul>
					</div>
				</nav><!--end of the 1st column side bar-->
				
