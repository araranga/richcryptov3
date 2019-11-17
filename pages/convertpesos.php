

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

		$balance_id = 'pesos_value';
		$balance_id_variable = 'balance_pesos';

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

		$new = round($_POST[$balance_id] / $row2['cmsmanager_content'],5) + $row['balance'];

		mysql_query_cheat("UPDATE tbl_accounts SET $balance_id_variable='".$sum."',balance='$new' WHERE accounts_id='$accounts_id'"	);



	$newdata = round($_POST[$balance_id] / $row2['cmsmanager_content'],2);

	$msg = "Convert USD TO BTC: USD:{$_POST[$balance_id]} To BTC({$newdata}) --  BTC rate is: {$row2['cmsmanager_content']}";
	saveLogs($_SESSION['accounts_id'],$msg);


$accounts_id = $_SESSION['accounts_id'];
$q = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE accounts_id='$accounts_id'");
$row = mysqli_fetch_array_cheat($q);		
		}		


	}
//


?> 

<div class="npage-header">
	<h2>Convert Dollars to BTC</h2>
</div>

<div class="col-grp">
	<div class="col col-6">
		<div class="coversion-rate">
			<h6>Conversion Rate</h6>
			<p>1 BTC = $<?php echo round($row2['cmsmanager_content'],2); ?> USD</p>
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
	<div class="col col-6">
		<h3>Convert</h3>
		<?php
			if ( $error != '' ) {
			?>
				<div class="warning"><ul class="fa-ul"><li><?php echo $error;?></li></ul></div>
			<?php
			}
			
			if ( $success != '' ) {
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
							<i class="icon-dollar"></i>
							<input value='<?php echo $row['balance_pesos']; ?>'  onkeyup="convertBTC()" required="" type="float" name="pesos_value" id="pesos_value" size="40" maxlength="255" value="">
						</div>
						<span class="validation-status"></span>	
					</div>
				</div>
				<div class="col col-12">
					<div class='antibug'>
						<div class="field-w-icon">
							<i class="icon-bitcoin"></i>
							<input readonly="readonly" onkeyup="convertBTC()" required="" type="float" name="btc_value" id="btc_value" size="40" maxlength="255" value="">
						</div>
						<span class="validation-status"></span>	
					</div>
				</div>
				<div class="col col-12 action"><a href='index.php?page=convert'>Click here to convert BTC to Dollars</a><input class="nbtn nbtn-primary" type="submit" name="submit" value="Process"></div>
			</div>		
		</form>
	</div>
</div> 


<script>
jQuery( document ).ready(function() {
  convertBTC();
});
	function convertBTC(){


		var btc = parseFloat(jQuery('#pesos_value').val());

		if(isNaN(btc)){
			jQuery('#btc_value').val('');
			jQuery('#pesos_value').val(0);
			return;
		}

		var total = btc / <?php echo $row2['cmsmanager_content']; ?>

		jQuery('#btc_value').val(total.toFixed(5));
	}
</script>