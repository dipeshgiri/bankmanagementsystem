<?php
session_start();
if(isset($_SESSION['SN']))
{
	echo "<h1 align='center'>YOU ARE ALREADY LOGGED IN </h1>";
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="../css/signin.css">
</head>
<body>
<div class="container">
<h1>LOG IN</h1>
<form action="user.php" method="POST">

<div class="tbox">
<input type="text" placeholder="@username" name="Username" >
</div>
<br>
<div class="tbox">
<input type="password" name="Password" placeholder="@password">
</div>
<br>
<button class="btn btn-outline-success " value="submit">Submit</button>
</form>
</div>
</body>
</html>