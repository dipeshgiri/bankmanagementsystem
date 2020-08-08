<?php
include ("../include/header.php");
include("../include/login.php");
$forex= new forex();
$data=$forex->dailyforex();

?>
    <div class="col-sm-9 col-md-10">
    	<h1 style="margin-top:20px; text-align:center">CURRENCY</h1><br>
    	<p style="text-align:left; color:red;">Base:<?php echo $data->base;?> <span style="float:right;margin-right:10px; color:red;">Date:<?php echo $data->date; ?></span></p> <br>
    	<div class="col" style="width:500px; margin-left:300px;">
    	<table class="table">
    		<tr>
    			<thead>
    			<th scope="col" style="color:red;">Country</th>
    			<th scope="col" style="color:red;">Rate</th>
    		</thead>
    		</tr>
    		<tr>
    			<td>Nepal NPR</td>
    			<td><?php echo $data->rates->NPR;?></td>
    		</tr>
    		<tr>

    			<td>Australian Dollar AUD</td>
    			<td><?php echo $data->rates->AUD;?></td>
    		</tr>
    		<tr>
    			<td>American Dollar USD</td>
    			<td><?php echo $data->rates->USD;?></td>
    		</tr>
    		<tr>
    			<td>United Arab Emirates</td>
    			<td><?php echo $data->rates->AED;?></td>
    		</tr>
    		<tr>
    			<td>Bangladeshi Taka</td>
    			<td><?php echo $data->rates->BDT;?></td>
    		</tr>
    		<tr>
    			<td>Chinese Yuan</td>
    			<td><?php echo $data->rates->CNY;?></td>
    		</tr>
    		<tr>
    			<td>Indian Ruppe</td>
    			<td><?php echo $data->rates->INR;?></td>
    		</tr>
    		<tr>
    			<td>Srilanka Dinar</td>
    			<td><?php echo $data->rates->LKR;?></td>
    		</tr>

    		<tr>
    			<td>Japanese Yen</td>
    			<td><?php echo $data->rates->JPY;?></td>
    		</tr>

    		<tr>
    			<td>Malaysian Ringgit</td>
    			<td><?php echo $data->rates->MYR;?></td>
    		</tr>

    		<tr>
    			<td>Saudi Riyal</td>
    			<td><?php echo $data->rates->SAR;?></td>
    		</tr>

    		<tr>
    			<td>Thai Bhat</td>
    			<td><?php echo $data->rates->THB;?></td>
    		</tr>
    		<tr>
    			<td>Kuwaiti Dinar</td>
    			<td><?php echo $data->rates->KWD;?></td>
    		</tr>
    		<tr>
    			<td>British Pound Sterling</td>
    			<td><?php echo $data->rates->GBP;?></td>
    		</tr>
    	</table>   
    </div>
<p style="text-align: center; color:red;" >Source:www.fixer.io</p>
</div>
