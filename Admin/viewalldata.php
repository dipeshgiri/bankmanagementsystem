<?php include("../include/header.php");?>
<?php include("../include/login.php");?>
 <!--start of the 2nd column of side bar-->
<div class="col-sm-9 col-md-10">
        <?php
         $data=new userdetails();
         $data->details();
        ?>
        
	</div>			
</body>
</html>
