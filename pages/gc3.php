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


function success2002($id)
{


$curtbladded = '1';
$log  = '';
            $q1 = mysql_query_cheat("SELECT parent as parentx,curtbl,(SELECT COUNT(child) FROM tbl_othertablebeta WHERE parent=parentx AND curtbl='$curtbladded') AS total FROM tbl_othertablebeta WHERE curtbl = '$curtbladded' AND parent!=0
            GROUP by parent
            HAVING total < 2");         
            $q1row = mysqli_fetch_array_cheat($q1);
            if($q1row['parentx']=='')
            {
                $q2 = mysql_query_cheat("SELECT child FROM tbl_othertablebeta  WHERE curtbl='$curtbladded' AND child NOT IN (SELECT parent FROM tbl_othertablebeta WHERE curtbl='$curtbladded') GROUP by child ORDER BY id ASC LIMIT 0 , 1");           
                $q2row = mysqli_fetch_array_cheat($q2);
                if($q2row['child']!='')
                {
                    mysql_query_cheat("INSERT INTO tbl_othertablebeta SET curtbl='$curtbladded',child='$id',parent='".$q2row['child']."'");                             
                }
                else
                {
                    $q3 = mysql_query_cheat("SELECT child FROM tbl_othertablebeta WHERE parent=0 AND curtbl='$curtbladded'");                                   
                    if(mysqli_num_rows($q3)==0)
                    {
                    mysql_query_cheat("INSERT INTO tbl_othertablebeta SET curtbl='$curtbladded',child='$id',parent='0'");                       
                    }
                    else
                    {
                    $q3row = mysqli_fetch_array_cheat($q3);
                    mysql_query_cheat("INSERT INTO tbl_othertablebeta SET curtbl='$curtbladded',child='$id',parent='".$q3row['child']."'");                                         
                    mysql_query_cheat("DELETE FROM tbl_othertablebeta WHERE child='".$q3row['child']."' AND parent='0' AND curtbl='$curtbladded'");
                    } 
                }
            } 
            else
            {   
                mysql_query_cheat("DELETE FROM tbl_othertablebeta WHERE child='".$q1row['parentx']."' AND parent='0' AND curtbl='$curtbladded'");
                mysql_query_cheat("INSERT INTO tbl_othertablebeta SET curtbl='$curtbladded',child='$id',parent='".$q1row['parentx']."'");                       
            }   
            
            #mysql_query_cheat("INSERT INTO tbl_logger SET acc='$id',log='$log'");
    
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
		$ptype = $check_row['prod_type'];

		$divisible  = $_POST['amount']  / $check_row['cost_block'];
		$sdate = date('Y-m-d');
		$payoutmono = date('Y-m-d', strtotime("{$sdate} + 90 weekdays"));

		$payout_lose = $check_row['cost_block'] * 0.30;
		$payout_win = $check_row['cost_block_end'];








		if(!is_int($divisible)){

			$suggest1 = ceil($divisible) * $check_row['cost_block'];

			$suggest2 = (ceil($divisible) - 1) * $check_row['cost_block'];

			$error .= "<i class=\"fa fa-warning\"></i>Amount needed must be divisible by ({$check_row['cost_block']}) try this $suggest1 OR $suggest2<br>";	
		}


		//$error .= "<i class=\"fa fa-warning\"></i>$sql<br>";


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

			$c1 = date('Y-m-d', strtotime("{$startDate} + 90 weekdays"));
			$c2 = date('Y-m-d', strtotime("{$startDate} + 180 weekdays"));
			$c3 = date('Y-m-d', strtotime("{$startDate} + 270 weekdays"));
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
			if ( $_POST['datatype'] == 'yes' ) {
				$refersummary = "5% From {$check_row['rate_start']} - {$row['username']}";
				$q2 = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE username='{$row['refer']}'");
				$row2 = mysqli_fetch_array_cheat($q2);
				mysql_query_cheat("INSERT INTO tbl_bonus SET amount='$rebates',accounts_id='{$row2['accounts_id']}',bonus_type='{$row['accounts_id']}',refer_summary='$refersummary'");
				mysql_query_cheat("UPDATE tbl_accounts SET balance_pesos= balance_pesos + $rebates WHERE accounts_id='{$row2['accounts_id']}'");



			$msg = "5% --{$rebates}-- Referral bonus given to {$row2['username']} Code is: $code_value-$code_pin";
			saveLogs($_SESSION['accounts_id'],$msg);
			}

			}


			// if(!empty(count($getparent))){
				

			// 	$rebatesuni = $check_row['rate_start'] * 0.01;


			// 	foreach($getparent as $id=>$idname){

			// 	$refersummary = "1% Unilevel Bonus From {$check_row['rate_start']} - {$row['username']}";
			// 	$q2 = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE username='{$idname}'");
			// 	$row2 = mysqli_fetch_array_cheat($q2);
			// 	mysql_query_cheat("INSERT INTO tbl_bonus SET amount='$rebatesuni',accounts_id='{$row2['accounts_id']}',bonus_type='{$row['accounts_id']}',refer_summary='$refersummary',unilevel='{$_SESSION['accounts_id']}'");
			// 	mysql_query_cheat("UPDATE tbl_accounts SET balance_pesos= balance_pesos + $rebatesuni WHERE accounts_id='{$row2['accounts_id']}'");


			// $msg = "1% --{$rebatesuni}-- Unilevel bonus given to {$row2['username']} Code is: $code_value-$code_pin";
			// saveLogs($_SESSION['accounts_id'],$msg);

			// 	}



			// }






/////

/////


for ($x = 1; $x <= $divisible; $x++) {
	$hash = strtolower(md5($_SESSION['accounts_id'])."-".pin().pin()."-".time());
	$sql = "INSERT INTO tbl_monoline SET accounts_id='{$_SESSION['accounts_id']}',username='{$_SESSION['username']}',package='{$check_row['rate_id']}',payout_date='{$payoutmono}',payout_win='{$payout_win}',payout_lose='{$payout_lose}',hash='$hash'";


			mysql_query_cheat($sql);
			$msg = "Added entry to monoline ({$_SESSION['username']}) hash:$hash";
			saveLogs($_SESSION['accounts_id'],$msg);


}

$qxmono = mysql_query_cheat("SELECT a.id,(SELECT COUNT(child) FROM tbl_othertablebeta WHERE child=a.id OR parent=a.id) as count FROM tbl_monoline as a HAVING count = 0 ORDER by id ASC");

while($rowmono = mysqli_fetch_array_cheat($qxmono)){
    success200($rowmono['id']);

}


			mysql_query_cheat("INSERT INTO tbl_buycode_history SET package_id='$package_id',package_summary='$package_summary',accounts_id='$buycodeaccounts_id',position='$position',code_pin='$code_pin',code_value='$code_value',rebates='$rebates',maturity_date='$new_date',amount='{$check_row['rate_start']}',maturity_amount='$maturity_amount',c1='$c1',c2='$c2',c3='$c3',prod_type='$ptype'");

			$q = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE accounts_id='$accounts_id'");
			$row = mysqli_fetch_array_cheat($q);	
			$success = "Here is the reference: $code_value-$code_pin";
		}
	}

	$package_query = mysql_query_cheat("SELECT * FROM tbl_rate WHERE activated='1' AND rate_bet!=2 AND prod_type=2");	
	$arr = array();
	$package_description = array();
	while($row_package = mysqli_fetch_array_cheat($package_query))
	{
		$arr[$row_package['rate_id']] = $row_package['rate_name']; 
	}

	$own = array();

	$own['yes'] = "Purchase Product For Myself";
	//$own['no'] = "Purchase Activation Codes";

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
    <h2>Buy Products</h2>
</div>

<?php
$colors = array();
	$colors[1] = '#9fdb8c';
	$colors[2] = '#dbb58c';
	$colors[3] = '#db8c8c';
	$col = 1;
?>
<style>
.course-list .course div h3 {
    font-size: 100%;
}
</style>
<div class="col-grp course-list">
	<?php 
		$package_query = mysql_query_cheat("SELECT * FROM tbl_rate WHERE activated='1' AND rate_bet!=2 AND prod_type=2");	
		while ( $row_packagex = mysqli_fetch_array_cheat($package_query) ) {
	?>
		<div class="col col-4 course course-a" style='min-height: 400px;'>
			<div>
				<h3 style='background: <?php echo $colors[$col]; ?>'><?php echo $row_packagex['rate_name']; ?></h3>
				<p>
					<span class="minimum"><i>Minimum</i> <strong>&#8369;<?php echo number_format($row_packagex['rate_start'],2); ?></strong></span>
					<span class="maximum" style='color:<?php echo $colors[$col]; ?>'><i>Maximum</i> <strong>&#8369;<?php echo number_format($row_packagex['rate_end'],2); ?></strong></span>
					<span class="bonus-rate"><i>30%(₱<?php echo number_format($row_packagex['cost_block'] * 0.30,2); ?>) Rewards Every 90 business days that had passed without your chart getting 100% completed or get ₱<?php echo number_format($row_packagex['cost_block_end'],2); ?> on payout directly.</i>
						<br/>
						Slot Cost: ₱<?php echo number_format($row_packagex['cost_block'],2); ?>
					</span>


				</p>			
			</div>
		</div>
	<?php
	$col++;
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