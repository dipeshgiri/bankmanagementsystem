<?php

include('../include/login.php');
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//php data checking
$mail=new check();	
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$mothername=$_POST['mothername'];
$fathername=$_POST['fathername'];
$grandfathername=$_POST['grandfathername'];
$grandmothername=$_POST['grandmothername'];
$phonenumber=$_POST['phonenumber'];
$address=$_POST['address'];
$nationality=$_POST['nationality'];
$citizenship=$_POST['citizenship'];
$email=$_POST['email'];
$password=$_POST['password'];
$gender=$_POST['Gender'];
$dob=$_POST['date'];


$check=$mail->checkdata($firstname,$lastname,$fathername,$mothername,$grandfathername,$grandmothername,$nationality,$phonenumber,$email);

if($check==1)
{
//php mail sending to customer
$var=rand(10000,999);
$mail=new PHPMailer();
$mail->isSMTP();
$mail->Host="smtp.gmail.com";
$mail->SMTPAuth="true";
$mail->SMTPSecure="tls";
$mail->Port="587";
$mail->Username="dipeshgiri618@gmail.com";
$mail->Password="space@555";
$mail->Subject="Bank Managment System Verifiaction Code";
$mail->setFrom("dipeshgiri618@gmail.com","Bank Management System");
$varr="Thank You For Creating The Account To verify Your Account Please Enter the Given OTP Code In Our Verifiaction Page. Your OTP CODE is ".$var;
$mail->Body=($varr);
$mail->addAddress($email);



if($mail->Send())
{

$photo=$_FILES['photo']['name'];
$tempphoto=$_FILES['photo']['tmp_name'];

$citizenshipfront=$_FILES['front']['name'];
$tempfront=$_FILES['front']['tmp_name'];

$citizenshipback=$_FILES['back']['name'];
$tempback=$_FILES['back']['tmp_name'];

move_uploaded_file($tempphoto,"../photos/$photo");
move_uploaded_file($tempfront,"../photos/$citizenshipfront");
move_uploaded_file($tempback, "../photos/$citizenshipback");

session_start();
$_SESSION["check"] = $var;
$_SESSION["firstname"]=$firstname;
$_SESSION["lastname"]=$lastname;
$_SESSION["fathername"]=$fathername;
$_SESSION["mothername"]=$mothername;
$_SESSION["grandfathername"]=$grandfathername;
$_SESSION["grandmothername"]=$grandmothername;
$_SESSION["phonenumber"]=$phonenumber;
$_SESSION["email"]=$email;
$_SESSION["address"]=$address;
$_SESSION["nationality"]=$nationality;
$_SESSION["citizenship"]=$citizenship;
$_SESSION["password"]=$password;
$_SESSION["gender"]=$gender;
$_SESSION["dob"]=$dob;
$_SESSION["photo"]=$photo;
$_SESSION["citizenshipfront"]=$citizenshipfront;
$_SESSION["citizenshipback"]=$citizenshipback;

     Header("Location:emailverification1.php");
}
else
{
	echo "there is an error".$mail->ErrorInfo;
}

}
?>