<?php include("../include/header.php");?>
<?php include("../include/login.php");?>
 <!--start of the 2nd column of side bar-->
<div class="col-sm-9 col-md-10">
	<h2 style="text-align:center; margin-top:30px;">Active User's Data</h2>
	<br>
	<div class="container" style="height:100%; width:600px;">
			<?php
                 $view=new viewdetails();
                 $result=$view->showalldetail();
			?>
		</tr>
	</table>
</div>
</div>
</div>
</body>
</html>
