<?php
require_once("./connect.php");
$accounts_id = $_SESSION['accounts_id'];
$q = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE accounts_id='$accounts_id'");
$row = mysqli_fetch_array_cheat($q);


$json_string = 'https://blockchain.info/ticker';
$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata,true);
if(!empty($obj['USD']['buy'])){
	$newest = $obj['USD']['buy'] + ($obj['USD']['buy'] * 0.05);

	mysql_query_cheat('UPDATE tbl_cmsmanager SET cmsmanager_content = '.$newest.' WHERE id = 41');
}

$query2 = "SELECT * FROM tbl_cmsmanager WHERE id='41'";
$q2 = mysql_query_cheat($query2);
$row2 = mysqli_fetch_array_cheat($q2);








	function trans()
	{
	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randstring = '';
	    for ($i = 0; $i < 12; $i++) {
	        $randstring .= $characters[rand(0, strlen($characters))];
	    }
	    return $randstring;
	}

	if($_POST['submit']!='')
	{

		$balance_id = 'btc_value';
		$balance_id_variable = 'balance';

		if($_POST[$balance_id]==0 || $_POST[$balance_id]<0)
		{
			$error .= "<i class=\"fa fa-warning\"></i>Please input valid and not empty amount to convert.<br>";
		}
		if($_POST[$balance_id]>$row[$balance_id_variable]) 
		{
			$error .= "<i class=\"fa fa-warning\"></i>Amount to convert(".$_POST[$balance_id].") is insufficient on current balance(".$row[$balance_id_variable]."). Please input valid amount.<br>";
		}


		if($error=='')
		{


		$sum  = $row[$balance_id_variable] -  $_POST[$balance_id];

		$new = round($_POST[$balance_id] * $row2['cmsmanager_content'],2) + $row['balance_pesos'];

		mysql_query_cheat("UPDATE tbl_accounts SET $balance_id_variable='".$sum."',balance_pesos='$new' WHERE accounts_id='$accounts_id'"	);


	$newdata = round($_POST[$balance_id] * $row2['cmsmanager_content'],2);

	$msg = "Convert BTC TO USD: BTC:{$_POST[$balance_id]} To Dollars({$newdata}) -- BTC Rate is: {$row2['cmsmanager_content']}";
	saveLogs($_SESSION['accounts_id'],$msg);




$accounts_id = $_SESSION['accounts_id'];
$q = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE accounts_id='$accounts_id'");
$row = mysqli_fetch_array_cheat($q);		
		}		


	}
//


?>
<div class="npage-header">
	<h2>Convert BTC to Dollars</h2>   
</div>

<div class="col-grp">
	<div class="col col-6">
		<div class="coversion-rate">
			<h6>Conversion Rate</h6>
			<p>1 BTC = <?php echo round($row2['cmsmanager_content'],2); ?> USD</p>
		</div>
		<div class="amount-box">
			<h3>Balance</h3>
			<ul class="amount-box-list balances">
				<li>
					<i class="icon-bitcoin"></i>
					<span><em>bitcoin</em> <?php echo $row['balance'];?></span>
				</li>
				<li>
					<i class="icon-dollar"></i>
					<span><em>Dollar</em> <?php echo "$".number_format($row['balance_pesos'],2);?></span>
				</li>
			</ul>
		</div>
	</div>
	<div class="col col-6 convert-form-wrap">
		<h3>Convert</h3>
		<?php
			if($error!='') {
		?>
				<div class="warning"><ul class="fa-ul"><li><?php echo $error;?></li></ul></div>
		<?php
			}
		?>

		<?php
			if($success!='') {
		?>
				<div class="noti"><ul class="fa-ul"><li><i class="fa fa-check fa-li"></i>Done requesting for withdrawal please see status <a href='?page=withdrawhistory'>here</a> </li></ul></div>
		<?php
			}
		?>
		<form method="POST" action="" class="form-container convert-currency-form">
			<div class="col-grp">
				<div id='optionspayment' class="col-col-12"></div>
				<div class="col col-12">
					<div class='antibug'>
						<div class="field-w-icon">
							<i class="icon-bitcoin"></i>
							<input value='<?php echo $row['balance']; ?>'onkeyup="convertBTC()" required="" type="float" name="btc_value" id="btc_value" size="40" maxlength="255" value="">
						</div>
						<span class="validation-status"></span>												
					</div>
				</div>
				<div class="col col-12">
					<div class='antibug'>
						<div class="field-w-icon">
							<i class="icon-dollar"></i>
							<input readonly='readonly'  onkeyup="convertBTC()" required="" type="float" name="pesos_value" id="pesos_value" size="40" maxlength="255" value="">
						</div>
						<span class="validation-status"></span>												
					</div>         
				</div>
				<div class="col col-12 action"><input class="nbtn nbtn-primary" type="submit" name="submit" value="Process"><a href='index.php?page=convertpesos'>Click here to convert Dollars to BTC</a></div>
			</div>
		</form>
	</div>
</div>



<!-- <div class='coursebox' style='background-color:green;font-weight:700;'>
<p>Conversion:<br> 
	1 BTC = $<?php echo round($row2['cmsmanager_content'],2); ?> USD
</p>
</div> -->
<!-- <style>
.coursebox{
	padding: 20px;
    background-color: #2196F3;
    color: white;
    margin-bottom: 15px;
}
</style> -->


<!-- <form method="POST" action="">
   <table width="100%">
      <tbody>
	</table>
		 <table id='optionspayment'>
		 </table>
   <table id='defaultfield' width="100%">
      <tbody>					 
        <tr class='antibug'>
            <td style="width:180px;" class="key" valign="top"><label for="accounts_name">BTC:</label></td>
            <td>
               <input style="width: 302px;" value='<?php //echo $row['balance']; ?>'onkeyup="convertBTC()" required="" type="float" name="btc_value" id="btc_value" size="40" maxlength="255" value="">
               <span class="validation-status"></span>												
            </td>
         </tr>
        <tr class='antibug'>
            <td style="width:180px;" class="key" valign="top"><label for="accounts_name">Dollar:</label></td>
            <td>
               <input style="width: 302px;" readonly='readonly'  onkeyup="convertBTC()" required="" type="float" name="pesos_value" id="pesos_value" size="40" maxlength="255" value="">
               <span class="validation-status"></span>												
            </td>
         </tr>         
      </tbody>
   </table>
 
   <br>
   <center><input class="btn btn-primary btn-lg" type="submit" name="submit" value="Process"></center>
</form> -->


<script>
jQuery( document ).ready(function() {
  convertBTC();
});
	function convertBTC(){


		var btc = parseFloat(jQuery('#btc_value').val());

		if(isNaN(btc)){
			jQuery('#btc_value').val('');
			jQuery('#pesos_value').val(0);
			return;
		}

		var total = btc * <?php echo $row2['cmsmanager_content']; ?>

		jQuery('#pesos_value').val(total.toFixed(2));
	}
</script>