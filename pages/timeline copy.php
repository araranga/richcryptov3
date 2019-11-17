<?php
require_once("./connect.php");
$accounts_id = $_SESSION['accounts_id'];
$q = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE accounts_id='$accounts_id'");
$row = mysqli_fetch_array_cheat($q);

$row1 = mysqli_fetch_array_cheat(mysql_query_cheat("SELECT SUM(amount) as sum FROM tbl_bonus WHERE accounts_id='$accounts_id' AND bonus_type='rb'"));
$row2 = mysqli_fetch_array_cheat(mysql_query_cheat("SELECT SUM(amount) as sum FROM tbl_bonus WHERE accounts_id='$accounts_id' AND bonus_type='rf'"));
$row3 = mysqli_fetch_array_cheat(mysql_query_cheat("SELECT SUM(amount) as sum FROM tbl_withdraw_new_history WHERE accounts_id='$accounts_id'"));
?>
<h1>Your Timeline</h1>
<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Available Balance
					</div>
					<div class="panel-body">
						<p><?php echo number_format($row['balance'],2); ?></p>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Referral Earning
					</div>
					<div class="panel-body">
						<p><?php echo number_format($row2['sum'],2); ?></p>
					</div>
				</div>
			</div>	
			<div class="col-lg-6 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Rebates
					</div>
					<div class="panel-body">
						<p><?php echo number_format($row1['sum'],2); ?></p>
					</div>
				</div>
			</div>					
			<div class="col-lg-6 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Total Earnings
					</div>
					<div class="panel-body">
						<p><?php echo number_format($row1['sum']+$row2['sum']+$row3['sum']+$row['balance'],2); ?></p>
					</div>
				</div>
			</div>	
			<div class="col-lg-6 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Total Withdrawals
					</div>
					<div class="panel-body">
						<p><?php echo number_format($row3['sum'],2); ?></p>
					</div>
				</div>
			</div>					
						
</div>