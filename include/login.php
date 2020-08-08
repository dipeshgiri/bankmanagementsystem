<?php
class connections
{
	protected $conn;
	protected $servername="localhost";
	protected $username="root";
	protected $password="";
	protected $databasename="Bankmanagementsystem";

	public function __construct()
	{}
}

trait connect
{
	
	public function __construct()
	{
		$this->conn=new mysqli($this->servername,$this->username,$this->password,$this->databasename);
		if($this->conn->connect_errno)
		{
			exit();
		}
	}
}


	 /*** for login process ***/
	 class user extends connections
	 {
	 	use connect;

	        public function check_login($username, $password)
	        {
	            
	            $sql="SELECT `SN` FROM `Admin` WHERE `Username`='$username' AND `Password`='$password'";
	            //checking for the username is present 
	            $result = $this->conn->query($sql);
	            $user_data = $result->fetch_array(MYSQLI_ASSOC);
	            $count_row = $result->num_rows;	 
               if($count_row==1)   
                {
	                // this login var will use for the session thing
	                session_start();
	                $_SESSION['login'] = true;
	                $_SESSION['SN'] = $user_data['SN'];
	                return true;
	            }
	            else{
	                return false;

	        }	        }    	
 }

class check {

	public function checkdata($firstname,$lastname,$fathername,$mothername,$grandfathername,$grandmothername,$nationality,$phonenumber,$email)
	{ 
	    $var1=$var2=$var3=$var4=$var5=$var6=$var7=$var8=$var9=1;

			
		if(!preg_match("/^[a-zA-Z ]*$/",$firstname)) 
		{
			echo "Please Enter The Valid First Name"."<br/>";
			$var1=0;

		}

		if(!preg_match("/^[a-zA-Z ]*$/",$lastname)) 
		{
	         echo "Please Enter The Valid Last Name"."<br/>";
	         $var2=0;
		}

		if(!preg_match("/^[a-zA-Z ]*$/",$mothername ))
		{
           echo"Please Enter The Valid Mother Name"."<br/>";
           $var3=0;
		}

		if(!preg_match("/^[a-zA-Z ]*$/",$fathername ))
		{
           echo"Please Enter The Valid Father Name"."<br/>";
           $var4=0;

		}

		if(!preg_match("/^[a-zA-Z ]*$/",$grandmothername ))
		{
           echo"Please Enter The Valid Grand Mother Name"."<br/>";
           $var5=0;
          
		}

		if(!preg_match("/^[a-zA-Z ]*$/",$grandfathername ))
		{
           echo"Please Enter The Valid Grand Father Name"."<br/>";
           $var6=0;
  		}

		if(!preg_match("/^[a-zA-Z ]*$/",$nationality ))
		{
           echo"Please Enter The Valid Nationality"."<br/>";
           $var7=0;
        }

        if(!is_numeric($phonenumber))
        {
        	echo "Please Enter The Valid Phone Number"."<br/>";
        	$var8=0;
        }

        if(!FILTER_VAR($email,FILTER_VALIDATE_EMAIL))
        {
        	echo"Please Enter The Valid Email Address"."<br/>";
        	$var9=0;
        }
        if($var1 and $var2 and $var3 and $var4 and $var5 and $var6 and $var7 and $var8 and $var9==1)
        {
        	return 1;
        }
        else
        {
        	return 0;
        }
         
     }  


 }


 class register extends connections
 {
 	use connect;
 	public function insertdata($firstname,$lastname,$fathername,$mothername,$grandfathername,$grandmothername,$phonenumber,$address,$nationality,$citizenship,$email,$pass,$account,$gender,$dob,$photo,$citizenshipfront,$citizenshipback)
 	{
        $sql="INSERT INTO `User`(`First Name`,`Last Name`,`Father Name`,`Mother Name`,`GrandFather Name`,`GrandMother Name`,`Phone Number`,`Email Address`,`Password`,`Account Number`,`Address`,`Nationality`,`Gender`,`Date Of Birth`,`Citizenship Number`,`Photo`,`Citizenship Front`,`Citizenship Back`) VALUES ('$firstname','$lastname','$fathername','$mothername','$grandfathername','$grandmothername','$phonenumber','$email','$pass','$account','$address','$nationality','$gender','$dob','$citizenship','$photo','$citizenshipfront','$citizenshipback');";

	    $result=$this->conn->query($sql);

	    if($result==1)
	    {
	    	echo "Data inserted successfully";
	    }
	    else
	    {
	    	echo"There is an error";
	    }

	}
	public function account($account)
	{
		  $sql="CREATE TABLE `$account` (Id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,Date VARCHAR(10) NOT NULL,Particulars VARCHAR(100) NOT NULL,Deposite_Amount INT(100),Withdrawn_Amount INT(100),Balance INT(100))";
		  $this->conn->select_db("Account Details");
		  $this->conn->query($sql);
	}
}



class viewdetails extends connections
{
	use connect;

	public function showalldetail()
	{
		 $result_per_page=15;
         $sql="SELECT * FROM `User`;";
         $result=$this->conn->query($sql);
         $numberofresult=$this->conn->affected_rows;
         $number_of_pages=ceil($numberofresult/$result_per_page);
          if(!isset($_GET['page']))
           {
     	      $page=1;
           }
         else
            {
     	$page=$_GET['page'];
            } 
             $this_page_first_result=($page-1)*$result_per_page;
             $sql="SELECT * FROM User LIMIT " . $this_page_first_result . ',' . $result_per_page;
             $result= $this->conn-> query($sql);

         ?>
        <table class="table">
		<tr>
			<thead>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th style="text-align:center;">Action</th>
			</thead>
		</tr>
		<?php
         while($row=$result->fetch_array(MYSQLI_ASSOC))
         {
         	?>
         		<tr>
         			<td><?php echo $row['ID'];?></td>
         			<td><?php echo $row['First Name']; ?></td>
         			<td><?php echo $row['Last Name'];?></td> 
         			<td><a href="viewalldata.php?id=<?php echo $row['ID'];?>" class="btn btn-success btn-sm" style="margin-left:10px;">View</a>
                     	<a href="edit.php?id=<?php echo $row['ID'];?>" class="btn btn-warning btn-sm" style="margin-left:10px;">Edit</a>
                     	<a href="delete.php?id=<?php echo $row['ID'];?>" class="btn btn-danger btn-sm" style="margin-left:10px;">Delete</a>
                     </td>
                    <?php
         }

                    ?>
                 </tr>
        </table>
<?php
for($page=1; $page<=$number_of_pages; $page++)
      {
      	echo'<a href="userdata1.php?page='.$page.'" class="btn btn-success" style="margin-left:10px;">'.$page.'</a>';
      }
	}
}




class userdetails extends connections
{
	use connect;
	private $id;
	public function details()
	{
		$this->id=$_GET['id'];
        if (isset($this->id)) 
            {
             $this->id=$this->conn->real_escape_string($this->id);
             $record = $this->conn->query("SELECT * FROM `User` WHERE `ID`='$this->id';");
             while($row=$record->fetch_array(MYSQLI_ASSOC))
             {
             	?>
             	<h2 class="text-center" style="margin-top:30px;"><?php echo $row['First Name']; echo" ";echo $row['Last Name'];?></h2>
             	<br>
             	<div class="col" style="width:500px; float:left;">
             	<table class="table table-bordered table-hover">
             		<tr>
             			<td>First Name</td>
             			<td><?php echo $row['First Name'];?></td>
             		</tr>
             		<tr>
             			<td>Last Name</td>
             			<td><?php echo $row['Last Name'];?></td>
             		</tr>
             		<tr>
             			<td>Father Name</td>
             			<td><?php echo $row['Father Name']; ?></td>
             		</tr>

             		<tr>
             			<td>Mother Name</td>
             			<td><?php echo $row['Mother Name']; ?></td>
             		</tr>

             		<tr>
             			<td>GrandFather Name</td>
             			<td><?php echo $row['GrandFather Name']; ?></td>
             		</tr>

             		<tr>
             			<td>GrandMother Name</td>
             			<td><?php echo $row['GrandMother Name']; ?></td>
             		</tr>

             		<tr>
             			<td>Account Number</td>
             			<td class="text-danger"><?php echo $row['Account Number']; ?></td>
             		</tr>

             		<tr>
             			<td>Phone Number</td>
             			<td><?php echo $row['Phone Number']; ?></td>
             		</tr>

             		<tr>
             			<td>Email Address</td>
             			<td><?php echo $row['Email Address']; ?></td>
             		</tr>

             		<tr>
             			<td>Address</td>
             			<td><?php echo $row['Address']; ?></td>
             		</tr>
             		
             		<tr>
             			<td>Gender</td>
             			<td><?php echo $row['Gender']; ?></td>
             		</tr>
             		
             		<tr>
             			<td>Date Of Birth</td>
             			<td><?php echo $row['Date Of Birth']; ?></td>
             		</tr>
             		

             		<tr>
             			<td>Nationality</td>
             			<td><?php echo $row['Nationality']; ?></td>
             		</tr>
             		
             		<tr>
             			<td>CitizenShip Number</td>
             			<td><?php echo $row['Citizenship Number']; ?></td>
             		</tr>

             		<?php
             		$accno=$row['Account Number'];
             		$photo=$row['Photo'];
             		$citizenshipfront=$row['Citizenship Front'];
             		$citizenshipback=$row['Citizenship Back'];
             		$this->conn->select_db("Account Details");
             		$sql="SELECT * FROM `$accno` ORDER BY `Id` DESC LIMIT 1;";
             		$record=$this->conn->query($sql);
             		while($row=$record->fetch_array(MYSQLI_ASSOC))
             		{
             		?>
               		<tr>
             			<td>Current Balance</td>
             			<td><?php echo $row['Balance'];} ?></td>
             		</tr>
             	</table>
             </div>
             <div class="col" style="width:400px; float:left;">
             <img src="../photos/<?php echo $photo;?>" style="height:50mm; width:50mm;">
             <br>
             <br>
             <img src="../photos/<?php echo $citizenshipfront;?>" style="height:60mm; width:100mm;">
             <br>
             <br>
             <img src="../photos/<?php echo $citizenshipback;?>" style="height:60mm; width:100mm;">
             
	
             
             </div>

        <?php     }


    }
	        }
	        public function showdetailbyname($fname,$lname)
	        {
	        	$sql="SELECT * FROM `User` WHERE `First Name`='$fname' AND `Last Name`='$lname';";
	        	$record=$this->conn->query($sql);
	        	?>
	        	<div class="tables">
	        		<br>
                     	<h4 style="margin-top:50px; text-align:center;">Details</h4>
                     	<br>
                     	<table class="table">
                     		<thead>
                     			<tr>
                     				<th scope="col" id="name">First Name</th>
                     				<th scope="col" id="name">Last Name</th>
                     				<th scope="col" id="action">Action</th>
                     			</tr>
                     		</thead>
                    <?php
	        	while($row=$record->fetch_array(MYSQLI_ASSOC))
	        	{
	        		?>
	        	 		<tr>
                     		<td style="text-align: left"><?php echo $row["First Name"];  ?></td>
                     		<td style="text-align: center;"><?php echo $row["Last Name"]; ?></td>
                     		<td style="text-align:right;"><a href="viewalldata.php?id=<?php echo $row['ID'];?>" class="btn btn-success btn-sm" style="margin-left;10px;">View</a>
                     		<a href="edit.php?id=<?php echo $row['ID'];?>" class="btn btn-warning btn-sm" style="margin-left;10px;">Edit</a>
                     		<a href="delete.php?id=<?php echo $row['ID'];?>" class="btn btn-danger btn-sm" style="margin-left;10px;">Delete</a></td>
                     		</tr>
                     
                     <?php
	        	}?>
	        		</table>
                     </div>

	  <?php      
	    }

	    public function showdetailbyaccno($accno)
	    {
	    	$sql="SELECT * FROM `User` WHERE `Account Number`='$accno';";
	    	$record=$this->conn->query($sql);
	    	?>
              
                     	<br>
                     	<table class="table">
                     		<thead>
                     			<tr>
                     				<th scope="col" id="fname">First Name</th>
                     				<th scope="col" id="lname" style="text-align:center;" >Last Name</th>
                     				<th scope="col" id="action" style="text-align:right;">Action</th>
                     			</tr>
                     		</thead>
                     		<?php
                     		while($row=$record->fetch_array(MYSQLI_ASSOC))
                     		{
                     			?>
                     		<tr>
                     			<td style="text-align:left;"><?php echo $row['First Name'];?></td>
                     			<td style="text-align:center;"><?php echo $row['Last Name'];?></td>
                     			<td style="text-align:right;"><a href="viewalldata.php?id=<?php echo $row['ID'];?>" class="btn btn-success btn-sm" style="margin-left:10px;">View</a>
                     				<a href="edit.php?id=<?php echo $row['ID'];?>" class="btn btn-warning btn-sm"style="margin-left:10px;">Edit</a>
                     				<a href="delete.php?id=<?php echo $row['ID'];?>" class="btn btn-danger btn-sm"style="margin-left:10px;">Delete</a></td>
                     		</tr>
                     		<?php
                     	}?>
                     	</table>
                     </div>
<?php
	    }

}


class edit extends connections
{
	use connect;
	private $id;
	public function basicdetails()
	{
		$this->id=$_GET['id'];
        if (isset($this->id)) 
            {
             $this->id=$this->conn->real_escape_string($this->id);
             $record = $this->conn->query("SELECT * FROM `User` WHERE `ID`='$this->id';");
             while($row=$record->fetch_array(MYSQLI_ASSOC))
             {
             	return $row;
             	?>
              <?php
          }
    }
}
public function editdetails($fname,$lname,$fathername,$mothername,$grandfathername,$grandmothername,$phonenumber,$email,$address,$gender,$dob,$nationality,$citizenship,$ids)
     {

         $sql="UPDATE `User` SET `First Name`='$fname',`Last Name`='$lname',`Father Name`='$fathername',`Mother Name`='$mothername',`GrandFather Name`='$grandfathername',`GrandMother Name`='$grandmothername',`Phone Number`='$phonenumber',`Email Address`='$email',`Address`='$address',`Gender`='$gender',`Nationality`='$nationality',`Date Of Birth`='$dob',`Citizenship Number`='$citizenship' WHERE `ID`='$ids';";
             $result=$this->conn->query($sql);
             if($result==1)
             {
                return 1;
             }
             else
             {
                return 0;
             }


    }

}             
class delete extends connections
{
    use connect;
    private $id;
    public function deletedata($id)
    {
        $this->id=$id;
        $sql="SELECT * FROM `User` WHERE `ID`='$this->id';";
        $record=$this->conn->query($sql);
        while($row=$record->fetch_array(MYSQLI_ASSOC))
        {
            $accno=$row['Account Number'];
            $photo=$row['Photo'];
            $citizneshipfront=$row['Citizenship Front'];
            $citizenshipback=$row['Citizenship Back'];
        }
        $delete="DELETE FROM `User` WHERE `ID`='$this->id';";
        $this->conn->query($delete);
        unlink("../photos/$photo");
        unlink("../photos/$citizneshipfront");
        unlink("../photos/$citizenshipback");
        $this->conn->select_db("Account Details");
        $deleteacc="DROP TABLE $accno;";
        $this->conn->query($deleteacc);
        return 1;

    }
}
class forex
{
    private $url;
    private $data;
    private $curl;
    public function dailyforex()
 {
    $this->url="http://data.fixer.io/api/latest?access_key=f20449115fc6a97f2c76e086bc69dee4";
    $this->curl = cURL_init($this->url);
    cURL_setopt($this->curl,CURLOPT_URL,$this->url);
    cURL_setopt($this->curl,CURLOPT_SSL_VERIFYPEER,false);
    cURL_setopt($this->curl,CURLOPT_RETURNTRANSFER,true);
    cURL_setopt($this->curl,CURLOPT_FOLLOWLOCATION,1);
    cURL_setopt($this->curl,CURLOPT_VERBOSE,0);
    $this->data=cURL_exec($this->curl);
    curl_close($this->curl);
    $this->data=json_decode($this->data);
    return $this->data;
}
}

class Transcations extends connections
{
    use connect;
    public function deposite($firstname,$lastname,$accno,$depositername,$depositeddate,$amount)
    {
        $record = $this->conn->query("SELECT * FROM `User` WHERE `First Name`='$firstname' AND `Last Name`='$lastname' AND `Account Number`='$accno';");
        $row=mysqli_num_rows($record);
        if($row==1)
        {
            $this->conn->select_db("Account Details");
            $record=$this->conn->query("SELECT `Balance` FROM `$accno` ORDER BY `Id` DESC LIMIT 1;");
            $data=$record->fetch_array(MYSQLI_ASSOC);
            $balance=$data['Balance'];
            $balance=$amount+$balance;
            $record=$this->conn->query("INSERT INTO `$accno`(`Date`,`Particulars`,`Deposite_Amount`,`Balance`) VALUES('$depositeddate','$depositername','$amount','$balance');");
            if($record==1)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 2;
        }
       
    }
    public function withdraw($firstname,$lastname,$accno,$chqno,$withdrawername,$withdrawndate,$withdrawnamount)
    {
        $record=$this->conn->query("SELECT * FROM `User` WHERE `First Name`='$firstname' AND `Last Name`='$lastname' AND `Account Number`='$accno';");
        $row=mysqli_num_rows($record);
        if($row==1)
        {
            $this->conn->select_db("Account Details");
            $record=$this->conn->query("SELECT `Cheque Number` FROM `$accno` WHERE `Cheque Number`='$chqno';");
            $row=mysqli_num_rows($record);
            if($row>=1)
            {
                    return 1;
            }
            else
            {
             $record=$this->conn->query("SELECT `Balance` FROM `$accno` ORDER BY `Id` DESC LIMIT 1;");
             $data=$record->fetch_array(MYSQLI_ASSOC);
             $balance=$data['Balance'];
            if($balance>$withdrawnamount)
               {
                $balance=$balance-$withdrawnamount;
                $record=$this->conn->query("INSERT INTO `$accno`(`Date`,`Particulars`,`Withdrawn_Amount`,`Cheque Number`,`Balance`) VALUES('$withdrawndate','$withdrawername','$withdrawnamount','$chqno','$balance');");
                if($record==1)
                {
                    return 4;
                }
                else
                {
                    return 0;
                }
               }
               else
                {
                    return 2;
                }
            }

         }
         else
         {
            return 3;
         }
    }
}
class statement extends connections
{
    use connect;
    public function showallstatement($firstname,$lastname,$accno)
    {
     $record=$this->conn->query("SELECT * FROM `User` WHERE `First Name`='$firstname' AND `Last Name`='$lastname' AND `Account Number`='$accno';");
        $row=mysqli_num_rows($record);
        if($row==1)
        {
            $this->conn->select_db("Account Details");
            $record=$this->conn->query("SELECT * FROM `$accno`;");
            return $record;

        }
        else
        {
            return 0;
        }
    }
    public function openingblc($firstname,$lastname,$accno)
    {
        $record=$this->conn->query("SELECT * FROM `User` WHERE `First Name`='$firstname' AND `Last Name`='$lastname' AND `Account Number`='$accno';");
        $row=mysqli_num_rows($record);
        if($row==1)
        {
            $this->conn->select_db("Account Details");
            $record=$this->conn->query("SELECT `Balance` FROM `$accno` ORDER BY `Id` ASC LIMIT 1 ;");
            while($row=$record->fetch_array(MYSQLI_ASSOC))
            {
                return $row['Balance'];
            }
        }
    }
    public function closingblc($firstname,$lastname,$accno)
    {
        $record=$this->conn->query("SELECT * FROM `User` WHERE `First Name`='$firstname' AND `Last Name`='$lastname' AND `Account Number`='$accno';");
        $row=mysqli_num_rows($record);
        if($row==1)
        {
            $this->conn->select_db("Account Details");
            $record=$this->conn->query("SELECT `Balance` FROM `$accno` ORDER BY `Id` DESC LIMIT 1 ;");
            while($row=$record->fetch_array(MYSQLI_ASSOC))
            {
                return $row['Balance'];
            }
        }
    }
    public function statementbydate($firstname,$lastname,$accno,$startdate,$enddate)
    {
     $record=$this->conn->query("SELECT * FROM `User` WHERE `First Name`='$firstname' AND `Last Name`='$lastname' AND `Account Number`='$accno';");
        $row=mysqli_num_rows($record);
        if($row==1)
        {
            $this->conn->select_db("Account Details");
            $record=$this->conn->query("SELECT * FROM `$accno` WHERE `Date` BETWEEN '$startdate' AND '$enddate' ORDER BY `Id`;");
            return $record;
        }
        else
        {
            return 0;
        }
    }
      public function openblc($firstname,$lastname,$accno,$startdate,$enddate)
    {
        $record=$this->conn->query("SELECT * FROM `User` WHERE `First Name`='$firstname' AND `Last Name`='$lastname' AND `Account Number`='$accno';");
        $row=mysqli_num_rows($record);
        if($row==1)
        {
            $this->conn->select_db("Account Details");
            $record=$this->conn->query("SELECT `Balance` FROM `$accno` WHERE `Date` BETWEEN '$startdate' AND '$enddate' ORDER BY `Id` ASC LIMIT 1;");
            while($row=$record->fetch_array(MYSQLI_ASSOC))
            {
                return $row['Balance'];
            }
        }
    }
          public function closeblc($firstname,$lastname,$accno,$startdate,$enddate)
    {
        $record=$this->conn->query("SELECT * FROM `User` WHERE `First Name`='$firstname' AND `Last Name`='$lastname' AND `Account Number`='$accno';");
        $row=mysqli_num_rows($record);
        if($row==1)
        {
            $this->conn->select_db("Account Details");
            $record=$this->conn->query("SELECT `Balance` FROM `$accno` WHERE `Date` BETWEEN '$startdate' AND '$enddate' ORDER BY `Id` DESC LIMIT 1;");
            while($row=$record->fetch_array(MYSQLI_ASSOC))
            {
                return $row['Balance'];
            }
        }
    }
  
    
}
class pdf extends connections
{
    use connect;
    public function pdfdata($firstname,$lastname,$accno,$openblnc,$closeblnc)
    {
        $this->conn->select_db("Account Details");
        $record=$this->conn->query("SELECT * FROM `$accno`;");
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);
        $pdf->cell(0,10,"Bank Management System",0,1,'C');
        $pdf->SetFont('Arial','I',12);
        $pdf->cell(0,10,"Electronic Account Statement",0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->cell(0,10,"Account Holder Name: $firstname $lastname",0,0,'L');
        $pdf->cell(0,10,"Opening Balance: $openblnc",0,1,'R');
        $pdf->cell(0,10,"Account Number: $accno" ,0,0,'L');
        $pdf->cell(0,10,"Closing Balance: $closeblnc",0,1,'R');
        $pdf->cell(0,10,"Currency Code: NPR",0,1,'L');
        $pdf->Line(0,60,210,60);//horizontal line
        $pdf->Ln(5);//line break
        $pdf->SetFont('Arial','B',9);
        $pdf->cell(30,10,"Transcation Date",1,0,'C');
        $pdf->cell(35,10,"Description",1,0,'C');
        $pdf->cell(35,10,"Deposited Amount",1,0,'C');
        $pdf->cell(35,10,"WithDraw Amount",1,0,'C');
        $pdf->cell(27,10,"Cheque Number",1,0,'C');
        $pdf->cell(30,10,"Balance",1,1,'C');
        $pdf->SetFont('Arial','',10);
        while($row=$record->fetch_array(MYSQLI_ASSOC))
        {
            $pdf->cell(30,10,$row['Date'],1,0,'C');
            $pdf->cell(35,10,$row['Particulars'],1,0,'C');
            $pdf->cell(35,10,$row['Deposite_Amount'],1,0,'C');
            $pdf->cell(35,10,$row['Withdrawn_Amount'],1,0,'C');
            $pdf->cell(27,10,$row['Cheque Number'],1,0,'C');
            $pdf->cell(30,10,$row['Balance'],1,1,'C');
        }
        $data=mysqli_num_rows($record);
        date_default_timezone_set("Asia/Kathmandu");
        $date=date("Y-m-d");
        $time= date("h:i:sa");
        $pdf->Ln(9);
        $pdf->cell(0,10,"Showing $data OF $data Records",0,0,'L');
        $pdf->cell(0,10,"Report Generated On: $date  $time",10,1,'R');
        $pdf->OutPut();
    }
    public function particularpdfdata($firstname,$lastname,$accno,$openblnc,$closeblnc,$startdate,$enddate)
    {
          $this->conn->select_db("Account Details");
        $record=$this->conn->query("SELECT * FROM `$accno` WHERE `Date` BETWEEN '$startdate' AND '$enddate' ORDER BY `Id`;");
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);
        $pdf->cell(0,10,"Bank Management System",0,1,'C');
        $pdf->SetFont('Arial','I',12);
        $pdf->cell(0,10,"Electronic Account Statement",0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->cell(0,10,"Account Holder Name: $firstname $lastname",0,0,'L');
        $pdf->cell(0,10,"Opening Balance: $openblnc",0,1,'R');
        $pdf->cell(0,10,"Account Number: $accno" ,0,0,'L');
        $pdf->cell(0,10,"Closing Balance: $closeblnc",0,1,'R');
        $pdf->cell(0,10,"Currency Code: NPR",0,0,'L');
        $pdf->cell(0,10,"From: $startdate To: $enddate",0,1,'R');        
        $pdf->Line(0,60,210,60);//horizontal line
        $pdf->Ln(5);//line break
        $pdf->SetFont('Arial','B',9);
        $pdf->cell(30,10,"Transcation Date",1,0,'C');
        $pdf->cell(35,10,"Description",1,0,'C');
        $pdf->cell(35,10,"Deposited Amount",1,0,'C');
        $pdf->cell(35,10,"WithDraw Amount",1,0,'C');
        $pdf->cell(27,10,"Cheque Number",1,0,'C');
        $pdf->cell(30,10,"Balance",1,1,'C');
        $pdf->SetFont('Arial','',10);
        while($row=$record->fetch_array(MYSQLI_ASSOC))
        {
            $pdf->cell(30,10,$row['Date'],1,0,'C');
            $pdf->cell(35,10,$row['Particulars'],1,0,'C');
            $pdf->cell(35,10,$row['Deposite_Amount'],1,0,'C');
            $pdf->cell(35,10,$row['Withdrawn_Amount'],1,0,'C');
            $pdf->cell(27,10,$row['Cheque Number'],1,0,'C');
            $pdf->cell(30,10,$row['Balance'],1,1,'C');
        }
        $data=mysqli_num_rows($record);
        date_default_timezone_set("Asia/Kathmandu");
        $date=date("Y-m-d");
        $time= date("h:i:sa");
        $pdf->Ln(9);
        $pdf->cell(0,10,"Showing $data OF $data Records",0,0,'L');
        $pdf->cell(0,10,"Report Generated On: $date  $time",10,1,'R');
        $pdf->OutPut();
    }

}

?>