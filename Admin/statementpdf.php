<?php
include("../include/login.php");
require("../include/pdf/fpdf.php");

session_start();
$firstname=$_SESSION['firstname'];
$lastname=$_SESSION['lastname'];
$accno=$_SESSION['accountnumber'];
$openbalance=$_SESSION['openblc'];
$closebalance=$_SESSION['closeblc'];
$data=new pdf();
$data->pdfdata($firstname,$lastname,$accno,$openbalance,$closebalance);
unset($_SESSION['firstname']);
unset($_SESSION['lastname']);
unset($_SESSION['accountnumber']);
unset($_SESSION['openblc']);
unset($_SESSION['closeblc']);
?>