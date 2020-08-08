<?php
include("../include/login.php");
include("../include/header.php");
if(isset($_POST['showallstatement']))
{
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$accno=$_POST['accno'];
$data=new statement();
$data2=new statement();
$data3=new statement();
$opnblc=$data->openingblc($firstname,$lastname,$accno);
$closeblc=$data2->closingblc($firstname,$lastname,$accno);
$record=$data3->showallstatement($firstname,$lastname,$accno);
if($record)
{
	session_start();
	$_SESSION['firstname']=$firstname;
	$_SESSION['lastname']=$lastname;
	$_SESSION['accountnumber']=$accno;
	$_SESSION['openblc']=$opnblc;
	$_SESSION['closeblc']=$closeblc;
}
}
elseif(isset($_POST['particularstatement']))
{
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$accno=$_POST['accno'];
	$startdate=$_POST['startdate'];
	$enddate=$_POST['enddate'];
	$data=new statement();
	$data1=new statement();
	$data2=new statement();
	$record=$data->statementbydate($firstname,$lastname,$accno,$startdate,$enddate);
	$opnblc=$data1->openblc($firstname,$lastname,$accno,$startdate,$enddate);
	$closeblc=$data2->closeblc($firstname,$lastname,$accno,$startdate,$enddate);
	if($record)
	{
	session_start();
	$_SESSION['firstname']=$firstname;
	$_SESSION['lastname']=$lastname;
	$_SESSION['accountnumber']=$accno;
	$_SESSION['openblc']=$opnblc;
	$_SESSION['closeblc']=$closeblc;
	$_SESSION['startdate']=$startdate;
	$_SESSION['enddate']=$enddate;
    }

}
?>
<link rel="stylesheet" href="../css/statement1.css"> 
<div class="col-sm-9 col-md-10" >
	<div class="container" id="con">
		<h1 class="heading">Bank Management System</h1>
		<hr class="lines">
		<p class="para">Electronic Account Statement</p>
		<br><br>
		<label class="name">Account Holder Name: <strong><?php echo $firstname; echo " ";echo $lastname;?></strong></label>
		<label class="openingbalance">Opening Balance:<strong><?php echo $opnblc;?></strong></strong></label>
		<br><br>
		<label class="accountno">Account Number:<Strong><?php echo $accno;?></Strong></label>
		<label class="closingbalance">Closing Balance:<strong><?php echo $closeblc;?></strong></label>
		<br><br>
		<label class="currency">Currency Code:<strong> NPR</strong></label>
		<?php
		if(isset($_POST['particularstatement']))
			{
				?>
		<label class="date"><strong>Date: <?php echo $startdate;?></strong><?php echo " " ?>To<?php echo" ";?><strong><?php echo $enddate;?></strong></label>
		<?php
	}
		?>
		<br>
		<hr class="lines">
		<div class="table">
			<table class="table">
				<thead>
				<tr>
					<th scope="col" id="name">Transcation Date</th>
					<th scope="col" id="name">Description</th>
					<th scope="col" id="name">Deposit</th>
					<th scope="col" id="name">WithDraw</th>
					<th scope="col" id="name">Cheque Number</th>
					<th scope="col" id="name">Balance</th>
				</tr>
			</thead>
			<?php while($row=$record->fetch_array(MYSQLI_ASSOC)){?>
			<tr class="tabledata">
				<td><?php echo $row['Date'];?></td>
				<td><?php echo $row['Particulars']; ?></td>
				<td><?php echo $row['Deposite_Amount']; ?></td>
				<td><?php echo $row['Withdrawn_Amount']; ?></td>
				<td><?php echo $row['Cheque Number']; ?></td>
				<td><?php echo $row['Balance']; ?></td>
			</tr>
			<?php
		}
		?>
			</table>
			<hr class="lines">
			<p class="rows">Showing <?php $r= mysqli_num_rows($record); echo $r;?> OF <?php echo $r ;?> Records</p>	
			<p class="date"><Strong>Report Generated On:</Strong><?php date_default_timezone_set("Asia/Kathmandu"); echo date("Y-m-d"); echo "   ";echo date("h:i:sa");?> </p><br>
			<hr class="lines">
		</div>
	</div>
	<?php
	if(isset($_POST['showallstatement']))
	{
	?>
	<a class="btn btn-danger" href="statementpdf.php">Download As PDF</a>
	<?php
     }
     elseif(isset($_POST['particularstatement']))
     {
     	?>
     	<a class="btn btn-danger" href="particularstatementpdf.php">Download As PDF</a>
     	<?php
     }
     ?>
</div>
</body>
</html>