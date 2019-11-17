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


		mysql_query_cheat("UPDATE tbl_accounts SET balance_pesos= balance_pesos - {$_POST['pesos_value']},balance_wallet = balance_wallet + {$_POST['pesos_value']} WHERE accounts_id='$accounts_id'"	);



	$msg = "Transfer USD TO E-wallet: AMT: {$_POST['pesos_value']}}";
	saveLogs($_SESSION['accounts_id'],$msg);



$accounts_id = $_SESSION['accounts_id'];
$q = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE accounts_id='$accounts_id'");
$row = mysqli_fetch_array_cheat($q);		
		}		


	}
//


?>
 


<?php
if($error!='')
{
?>
<div class="warning"><ul class="fa-ul"><li><?php echo $error;?></li></ul></div>
<?php
}
?>

<?php
if($success!='')
{
?>
<div class="noti"><ul class="fa-ul"><li><i class="fa fa-check fa-li"></i>Done requesting for withdrawal please see status <a href='?page=withdrawhistory'>here</a> </li></ul></div>
<?php
}
?>


<form method="POST" action="" class="form-container dollartoewallet">
	<div class="npage-header">
		<h2>Convert Dollars to E-wallet</h2>
		<p>Please note that any transfer amount to E-wallet can't be sent back to your Dollar-Wallet.</p>  
	</div>

	<div class="amount-box user-balance">
		<ul class="amount-box-list">
			<li>
				<i class="icon-dollar"></i>
				<span><em>Dollar</em> <?php echo "$".number_format($row['balance_pesos'],2);?></span>
			</li>
			<li>
				<i class="icon-wallet"></i>
				<span><em>E-Wallet</em> <?php echo "$".number_format($row['balance_wallet'],2);?></span>
			</li>
		</ul>
	</div>

	<div class="col-grp">
		<div id='optionspayment' class="col col-12"></div>
		<div class="col col-12" id='defaultfield'>
			<div class="antibug">
				<input placeholder="Dollar to Convert" value='<?php echo $row['balance_pesos']; ?>' required="" type="float" name="pesos_value" id="pesos_value" size="40" maxlength="255" value="">
               <span class="validation-status"></span>
			</div>
		</div>
	</div>

	<div class="action"><input class="nbtn nbtn-primary" type="submit" name="submit" value="Process"></div>
</form>
