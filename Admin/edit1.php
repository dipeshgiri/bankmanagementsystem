 <?php
 include("../include/login.php");
        if(isset($_POST['update']))
        {
             $fname=$_POST['fname'];
             $lname=$_POST['lname'];
             $fathername=$_POST['fathername'];
             $mothername=$_POST['mothername'];
             $grandfathername=$_POST['grandfathername'];
             $grandmothername=$_POST['grandmothername'];
             $phonenumber=$_POST['phonenumber'];
             $email=$_POST['email'];
             $address=$_POST['address'];
             $gender=$_POST['gender'];
             $dob=$_POST['dateofbirth'];
             $nationality=$_POST['nationality'];
             $citizenship=$_POST['citizenshipnumber'];
             $id=$_GET['id'];

         }
         $edit=new edit();
         $check=$edit->editdetails($fname,$lname,$fathername,$mothername,$grandfathername,$grandmothername,$phonenumber,$email,$address,$gender,$dob,$nationality,$citizenship,$id);
         if($check==1)
         {
            header("Location:Dashboard.php");
         }
         else if($check==0)
         {
            echo "Please Try Again Error Has Occured";
         }

             
         ?>         
