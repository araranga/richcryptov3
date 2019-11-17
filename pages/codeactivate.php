<?php
require_once("./connect.php");
$accounts_id = $_SESSION['accounts_id'];
$q = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE accounts_id='$accounts_id'");
$row = mysqli_fetch_array_cheat($q);
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

		$codes = explode("-",$_POST['codes']);
		$p1 = $codes[0];
		$p2 = $codes[1];

		


		$qxx = mysql_query_cheat("SELECT * FROM tbl_buycode_history WHERE code_value='$p1' AND code_pin='$p2' AND accounts_id = 0");
		$qxxrow = mysqli_fetch_array_cheat($qxx);


		$num = mysqli_num_rows($qxx);


		if($num==0){

			$error .= "<i class=\"fa fa-warning\"></i>Code entered not found.<br>";

		}



		if($error=='')
		{



			$check_rate = mysql_query_cheat("SELECT * FROM tbl_rate WHERE rate_id='".$qxxrow['package_id']."'");
			$check_row  = mysqli_fetch_array_cheat($check_rate);


			$startDate = date('Y-m-d');
			$wDays = $check_row['days'];
			$new_date = date('Y-m-d', strtotime("{$startDate} +{$wDays} weekdays"));


			mysql_query_cheat("UPDATE tbl_buycode_history SET accounts_id='{$_SESSION['accounts_id']}',position=0,maturity_date='{$new_date}' WHERE id='{$qxxrow['id']}'");

			$msg = "Code activated: {$_POST['codes']}";
			saveLogs($_SESSION['accounts_id'],$msg);


			if($row['refer']){
			$q2 = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE username='{$row['refer']}'");
			$row2 = mysqli_fetch_array_cheat($q2);


			$refersummary = "5% From {$qxxrow['amount']} - {$row['username']}";


			$msg = "5% --{$qxxrow['rebates']}-- Referral given to {$row2['username']} Code is: {$_POST['codes']}";
			saveLogs($_SESSION['accounts_id'],$msg);



			mysql_query_cheat("UPDATE tbl_accounts SET balance_pesos= balance_pesos + {$qxxrow['rebates']} WHERE accounts_id='{$row2['accounts_id']}'");
mysql_query_cheat("INSERT INTO tbl_bonus SET amount='{$qxxrow['rebates']}',accounts_id='{$row2['accounts_id']}',bonus_type='{$row['accounts_id']}',refer_summary='$refersummary'");
			}




			$success = "Done activating to your account codes: {$_POST['codes']}";
	
		}
	}

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
<div class="noti"><ul class="fa-ul"><li><i class="fa fa-check fa-li"></i><?php echo $success; ?></li></ul></div>
<?php
}
?>
<?php
$payment = array();
$fields = array();
$fields['code'] = "Code";
$payment['btc'] = $fields;


?>


<form method="POST" action="" autocomplete="off" class="form-container code-activation">
	<div class="npage-header">
		<h2>Code Activation</h2>   
	</div>


   <table width="100%">
      <tbody>

         <tr style='display:none;'>
            <td style="width:180px;" class="key" valign="top"><label for="accounts_name">Widrawal Type</label></td>
            <td>
				<select id='claimtypeid' name='claimtype' onchange="widraw(this.value)" required>
						<option value='cebuana'>Cebuana</option>
						<option value='lbc'>LBC</option>
						<option value='bank_bpi'>BPI Deposit</option>
						<option value='bank_bdo'>BDO Deposit</option>
						<option value='btc' selected='selected'>BTC</option>
				</select>											
            </td>
         </tr>
	</table>

	<table id='optionspayment'></table>  
	
	<div id='defaultfield' style='display:none;'>
		<input required="" type="codes" name="codes" id="codes" size="40" maxlength="255" value="" placeholder="Please enter codes">
		<span class="validation-status"></span>
	</div>
		<!-- <tbody>					 
         <tr class="antibug">
            <td style="width:180px;" class="key" valign="top"><label for="accounts_name">Please enter codes:</label></td>
            <td> -->
               												
            <!-- </td>
         </tr>
      </tbody> -->
 
   <br>
   <div class="action"><input class="nbtn nbtn-primary" type="submit" name="submit" value="Process"></center>
</form>

<script>
	jQuery('#claimtypeid').trigger('change');
function widraw(myval)
{
	if(myval){
		jQuery('#defaultfield').show();
	}else{
		jQuery('#defaultfield').hide();
	}

	jQuery('#optionspayment').html('');
	jQuery('#optionspayment').html(jQuery('#'+myval).html());

}
</script>