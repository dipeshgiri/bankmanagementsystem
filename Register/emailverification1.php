<!DOCTYPE html>
<html>
<head>
	<title>Verification Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>


<style>
h1
{
 
  color:red;
}

p
{
	color:green;
	font-size:20px;
}

#otpcode
{
	background:none;
	outline:none;
	text-align:center;
	border:none;
	border-bottom:1px solid grey;
	
}
.container1 .id
{

	font-size: 20px;
}
body
{
	background:red;
}

.container1
{  

	width:50%;
	height:50%;
	position:absolute;
	top:10%;
	left:25%;
	text-align:center;
	background:white;
	
}
</style>
<body>
<div class="container1">
<h1>Verify your Account</h1>
<p>Please Check your Gmail For The OTP Code</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<p class="id"><strong>OTP CODE</strong></p>
<p><input type="text" placeholder="Please Enter Your OTP CODE" name="otpcode" id="otpcode"><br></p>
<?php
include('../include/login.php');
session_start();
$var=$_SESSION["check"];
$firstname=$_SESSION["firstname"];
$lastname=$_SESSION["lastname"];
$fathername=$_SESSION["fathername"];
$mothername=$_SESSION["mothername"];
$grandfathername=$_SESSION["grandfathername"];
$grandmothername=$_SESSION["grandmothername"];
$phonenumber=$_SESSION["phonenumber"];
$email=$_SESSION["email"];
$address=$_SESSION["address"];
$nationality=$_SESSION["nationality"];
$citizenship=$_SESSION["citizenship"];
$password=$_SESSION["password"];
$gender=$_SESSION["gender"];
$dob=$_SESSION["dob"];
$photo=$_SESSION["photo"];
$citizenshipfront=$_SESSION["citizenshipfront"];
$citizenshipback=$_SESSION["citizenshipback"];
$accnumber=uniqid("00000");

if(isset($_POST['submit']))
{
	if($var==$_POST['otpcode'])
	{      
         
		$pass=md5($password);
	     $reg= new register();
		  $reg->insertdata($firstname,$lastname,$fathername,$mothername,$grandfathername,$grandmothername,$phonenumber,$address,$nationality,$citizenship,$email,$pass,$accnumber,$gender,$dob,$photo,$citizenshipfront,$citizenshipback);
		  $reg->account($accnumber);
				?>	
		<Script>alert("You'r Registered Successfully.");</Script>
			<?php
	}

		else
		{
			?>
			<script>alert("Incorrect OTP Please Try Again!");</script>
			<?php
		}
	
}


	?>

<br>
<p><button type="submit" class="btn btn-outline-success" name="submit">SUBMIT</button><p>
</div>
</form>
</body>
</html>
