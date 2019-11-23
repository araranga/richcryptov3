<?php
require_once("./connect.php");
$accounts_id = $_SESSION['accounts_id'];
$q = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE accounts_id='$accounts_id'");
$row = mysqli_fetch_array_cheat($q);

function getparent($username){

    $q = mysql_query_cheat("SELECT refer,username,accounts_id FROM tbl_accounts WHERE username='$username'");

    $return = array();

    while($row=mysqli_fetch_array_cheat($q)) {

        $return[] = $row;

    }
    return $return;

}

function getparentreb($array,$count){

    if($count==6){
        return;
    }

    foreach($array as $d){
        $_GET['reb'][$count][$d['accounts_id']] = $d['username'];


        $a = getparent($d['refer']);
        $count2 = $count + 1;
        getparentreb($a,$count2);
    }

}

$getparent = array();

$level1 = getparent($row['refer']);

getparentreb($level1,1);

$count = 6;

if(!empty(count($_GET['reb'])))
{

foreach($_GET['reb'] as $reb){

    $count--;

    foreach($reb as $id=>$d){

        $getparent[$id] = $d;
    }



}

}


function pin()
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 7; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}

	if($_POST['submit']!='')
	{

		$check_rate = mysql_query_cheat("SELECT * FROM tbl_rate WHERE rate_id='".$_POST['rate']."'");
		$check_row  = mysqli_fetch_array_cheat($check_rate);
		$check_row_main = $check_row;
		$check_row['rate_start'] = $_POST['amount'];

		if($_POST['password']!=$row['password'])
		{
			$error .= "<i class=\"fa fa-warning\"></i>Password incorrect!.<br>";
		}
		
		if($check_row['rate_start']>$row[$_POST['balancetype']])
		{
			$error .= "<i class=\"fa fa-warning\"></i>Insufficient Funds!.<br>";
		}


		if($check_row_main['rate_start']>$_POST['amount'])
		{
			$error .= "<i class=\"fa fa-warning\"></i>Mininum amount for this course is {$check_row_main['rate_start']}.<br>";
		}
		if($check_row_main['rate_end']<$_POST['amount'])
		{
			$error .= "<i class=\"fa fa-warning\"></i>Maximum amount for this course is {$check_row_main['rate_end']}.<br>";
		}

		if($_POST['amount']==0 || $_POST['amount']<0)
		{
			$error .= "<i class=\"fa fa-warning\"></i>Please input valid and not empty amount to fund.<br>";
		}

		if($error=='')
		{
			$current_balance  = $row['balance_pesos'] - $check_row['rate_start'];
			$rebates = $check_row['rate_start'] * 0.05;
			$code_pin = pin();
			$code_value = pin();
			$code_package = $_POST['rate'];
			$code_referrer = $accounts_id;
			mysql_query_cheat("INSERT INTO tbl_code SET code_value='$code_value',code_package='$code_package',code_pin='$code_pin',code_referrer='$code_referrer',activated='1'");
			mysql_query_cheat("UPDATE tbl_accounts SET {$_POST['balancetype']} = {$_POST['balancetype']} -  {$check_row['rate_start']} WHERE accounts_id='$accounts_id'");
			//rebates
			//history
			$package_id = $check_row['rate_id'];
			$package_summary = $check_row['rate_name']. " - ".$check_row['rate_start'];
			$startDate = date('Y-m-d');
			$wDays = $check_row_main['days'];
			$new_date = date('Y-m-d', strtotime("{$startDate} +{$wDays} weekdays"));

			$c1 = date('Y-m-d', strtotime("{$startDate} + 30 weekdays"));
			$c2 = date('Y-m-d', strtotime("{$startDate} + 60 weekdays"));
			$c3 = date('Y-m-d', strtotime("{$startDate} + 90 weekdays"));
			$maturity_amount = (($check_row_main['maturity'] / 100) * $check_row['rate_start']) + $check_row['rate_start'];
			$buycodeaccounts_id = 0;
			$position = $_SESSION['accounts_id'];

			if ( $_POST['datatype'] == 'yes' ) {
				$position  = 0;
				$buycodeaccounts_id = $_SESSION['accounts_id'];
			}



			$msg = "Purchase a product ({$package_summary}) AMT:{$_POST['amount']}: $code_value-$code_pin";
			saveLogs($_SESSION['accounts_id'],$msg);




			if ( !empty( $row['refer'] ) )
			{
				$refersummary = "5% From {$check_row['rate_start']} - {$row['username']}";
				$q2 = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE username='{$row['refer']}'");
				$row2 = mysqli_fetch_array_cheat($q2);
				mysql_query_cheat("INSERT INTO tbl_bonus SET amount='$rebates',accounts_id='{$row2['accounts_id']}',bonus_type='{$row['accounts_id']}',refer_summary='$refersummary'");
				mysql_query_cheat("UPDATE tbl_accounts SET balance_pesos= balance_pesos + $rebates WHERE accounts_id='{$row2['accounts_id']}'");



			$msg = "5% --{$rebates}-- Referral bonus given to {$row2['username']} Code is: $code_value-$code_pin";
			saveLogs($_SESSION['accounts_id'],$msg);


			}


			if(!empty(count($getparent))){

				$rebatesuni = $check_row['rate_start'] * 0.01;


				foreach($getparent as $id=>$idname){

				$refersummary = "1% Unilevel Bonus From {$check_row['rate_start']} - {$row['username']}";
				$q2 = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE username='{$idname}'");
				$row2 = mysqli_fetch_array_cheat($q2);
				mysql_query_cheat("INSERT INTO tbl_bonus SET amount='$rebatesuni',accounts_id='{$row2['accounts_id']}',bonus_type='{$row['accounts_id']}',refer_summary='$refersummary',unilevel='{$_SESSION['accounts_id']}'");
				mysql_query_cheat("UPDATE tbl_accounts SET balance_pesos= balance_pesos + $rebatesuni WHERE accounts_id='{$row2['accounts_id']}'");


			$msg = "1% --{$rebatesuni}-- Unilevel bonus given to {$row2['username']} Code is: $code_value-$code_pin";
			saveLogs($_SESSION['accounts_id'],$msg);

				}



			}






			mysql_query_cheat("INSERT INTO tbl_buycode_history SET package_id='$package_id',package_summary='$package_summary',accounts_id='$buycodeaccounts_id',position='$position',code_pin='$code_pin',code_value='$code_value',rebates='$rebates',maturity_date='$new_date',amount='{$check_row['rate_start']}',maturity_amount='$maturity_amount',c1='$c1',c2='$c2',c3='$c3'");

			$q = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE accounts_id='$accounts_id'");
			$row = mysqli_fetch_array_cheat($q);	
			$success = "Here is the reference: $code_value-$code_pin";
		}
	}

	$package_query = mysql_query_cheat("SELECT * FROM tbl_rate WHERE activated='1' AND rate_bet!=2");	
	$arr = array();
	$package_description = array();
	while($row_package = mysqli_fetch_array_cheat($package_query))
	{
		$arr[$row_package['rate_id']] = $row_package['rate_name']; 
	}

	$own = array();

	$own['yes'] = "Purchase Product For Myself";
	$own['no'] = "Purchase Activation Codes";

	$own2 = array();

	$own2['balance_pesos'] = "Peso Balance.";
	#$own2['balance_wallet'] = "E-wallet";
		
	$field[] = array("type"=>"select","value"=>"rate","label"=>"Choose Your Package","option"=>$arr);
	$field[] = array("type"=>"select","value"=>"datatype","label"=>"Choose your purpose","option"=>$own);
	$field[] = array("type"=>"select","value"=>"balancetype","label"=>"Which account to deduct","option"=>$own2);
	$field[] = array("type"=>"text","value"=>"amount","label"=>"Enter Amount");
	$field[] = array("type"=>"password","value"=>"password","label"=>"Enter Password");
//
?>

<div class="npage-header">
    <h2>Buy Courses</h2>
</div>

<div class="col-grp course-list">
	<?php 
		$package_query = mysql_query_cheat("SELECT * FROM tbl_rate WHERE activated='1' AND rate_bet!=2");	
		while ( $row_packagex = mysqli_fetch_array_cheat($package_query) ) {
	?>
		<div class="col col-4 course course-<?php echo $row_packagex['rate_name']; ?>">
			<div>
				<h3><?php echo $row_packagex['rate_name']; ?></h3>
				<p>
					<span class="minimum"><i>Minimum</i> <strong>&#8369;<?php echo number_format($row_packagex['rate_start'],2); ?></strong></span>
					<span class="maximum"><i>Maximum</i> <strong>&#8369;<?php echo number_format($row_packagex['rate_end'],2); ?></strong></span>
					<span class="bonus-rate"><i>Bonus Rate 30% up to 90% per cycle (up to 3 cycles)</i></span>
				</p>
			</div>
		</div>
	<?php
		}
	?>
</div>

<div class="col-grp balance-purchase">
	<div class="col col-5 balance">
		
		<div class="amount-box">
			<h3>Balance</h3>
			<ul class="amount-box-list balances">
				<li>
					<i class="icon-dollar"></i>
					<span><em>Pesos</em> <?php echo number_format($row['balance_pesos'],2);?></span>
				</li>
			</ul>
		</div>

	</div>
	<div class="col col-7 purchase">
		<h3>Purchase</h3>
		<?php

		if ( $error != '' ) {
			
		?>
			<div class="warning"><ul class="fa-ul"><li><?php echo $error;?></li></ul></div>

		<?php

		}

		if ( $success != '' ) {

		?> 

		<div class="noti">
			<ul class="fa-ul">
				<li>
					<i class="fa fa-check fa-li"></i>
					<?php echo $success; ?>
				</li>
			</ul>
		</div>

		<?php

		} 

		?>

		<form method='POST' action='' class="form-container">
			<div class="col-grp">
			<?php
				$is_editable_field = 1;
				foreach($field as $inputs) {
					if($inputs['label']!='') {
						$label = $inputs['label'];
					} else {
						$label = ucwords($inputs['value']);
					}


			?>

						<!-- <td style="width:180px;" class="key" valign="top" >
							<label for="accounts_name"><?php echo $label; ?><?php echo $req_fld?>:</label>
						</td> -->
						<?php if ( $is_editable_field ) { ?>
						<div class="col <?php echo $inputs['value'] == 'balancetype' ? 'col-12' : 'col-6'; ?>">
							<?php
							if ($inputs['type']=='select') {
								if($$inputs['value']!='' && $inputs['value']=='code_id') { 
								} else {
							?>
									<select name="<?php echo $inputs['value']; ?>" id="<?php echo $inputs['value']; ?>" required <?php echo $inputs['attr']; ?>>
									<?php
										foreach($inputs['option'] as $key=>$val) {
									?>
										<option <?php if($$inputs['value']==$val){echo"selected='selected'";} ?> value='<?php echo $key;?>'><?php echo $val;?></option>
									<?php
										}
									?>
							</select>
							<span class="validation-status"></span>
							<?php
								}
							} else {
							?>
								<input required <?php echo $inputs['attr']; ?> type="<?php echo $inputs['type']; ?>" name="<?php echo $inputs['value']; ?>" id="<?php echo $inputs['value']; ?>" size="40" maxlength="255" value="<?php echo $$inputs['value']; ?>" placeholder="<?php echo $label; ?>" />
								<span class="validation-status"></span>												
							<?php
							}
						?>

						</div>
						<?php 
							} else { 
						?>
								<div class="col"><?php echo $$inputs['value']; ?></div>
						<?php 
						}
						?>                                                                                                    

			<?php
				}
			?>
				<div class="col col-12 terms">
					<input id='terms' name='termscondition' type='checkbox'onclick="checkterms()">
					I agree to the terms and conditions. <a href='javascript:void(0)' onclick="jQuery('#agreement').slideToggle();">View here</a>
				</div>
				<?php
					$queryx = "SELECT * FROM tbl_cmsmanager WHERE id='39'";
					$qx = mysql_query_cheat($queryx);
					$rowx = mysqli_fetch_array_cheat($qx);
				?>
				<div id='agreement' class="col col-12"><div><?php echo $rowx['cmsmanager_content']; ?></div></div>
				<div class="col col-12 action" id='registerbutton'><input class='nbtn nbtn-primary' type='submit' name='submit' value='Process'></div>
			</div>
		</form>

	</div>
</div>


<hr>
<?php
$qnotuse = mysql_query_cheat("SELECT * FROM tbl_buycode_history WHERE position='{$_SESSION['accounts_id']}' AND accounts_id = 0");
$counternotsure = mysqli_num_rows($qnotuse);

if(!empty($counternotsure)){
	?>
	<h3>Available Codes</h3>
	<?php


	?>
	<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
		   <th>Codes</th>
           <th>Amount</th>
           <th>Other Data</th>
        </tr>
    </thead>
    <tbody>
<?php
while($rowqnotuse = mysqli_fetch_array_cheat($qnotuse)){
	$check_rate = mysql_query_cheat("SELECT * FROM tbl_rate WHERE rate_id='".$rowqnotuse['package_id']."'");
	$check_row  = mysqli_fetch_array_cheat($check_rate);


	?>
        <tr>
		   <td><?php echo $rowqnotuse['code_value']; ?>-<?php echo $rowqnotuse['code_pin']; ?></td>
           <td>&#8369;<?php echo number_format($rowqnotuse['amount'],2); ?></td>
           <td>
           	Trading Course: <?php echo $check_row['rate_name']; ?><br>
           	
           </td>
        </tr>
	<?php
}
?>

    </tbody>
</table>
	<?php
}
?>