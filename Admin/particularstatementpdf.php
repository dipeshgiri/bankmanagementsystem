<?php
include("../include/login.php");
require("../include/pdf/fpdf.php");

session_start();
$firstname=$_SESSION['firstname'];
$lastname=$_SESSION['lastname'];
$accno=$_SESSION['accountnumber'];
$openbalance=$_SESSION['openblc'];
$closebalance=$_SESSION['closeblc'];
$startdate=$_SESSION['startdate'];
$enddate=$_SESSION['enddate'];
$data=new pdf();
$data->particularpdfdata($firstname,$lastname,$accno,$openbalance,$closebalance,$startdate,$enddate);
unset($_SESSION['firstname']);
unset($_SESSION['lastname']);
unset($_SESSION['accountnumber']);
unset($_SESSION['openblc']);
unset($_SESSION['closeblc']);
unset($_SESSION['startdate']);
unset($_SESSION['enddate']);

?>