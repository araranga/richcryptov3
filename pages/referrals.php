<?php
require_once("./connect.php");
$accounts_id = $_SESSION['accounts_id'];
$username = $_SESSION['username'];
$query = "SELECT * FROM tbl_code as a 
JOIN tbl_accounts as b 
JOIN tbl_bet as c 
JOIN tbl_rate as d 
WHERE a.code_owner=b.accounts_id  
AND b.refer='$username'
AND c.bet_id = a.code_bet
AND d.rate_id = a.code_package
";
$q = mysql_query_cheat($query);



 $queryx = "SELECT SUM(amount) as rebs  FROM tbl_bonus WHERE bonus_type='rf' AND accounts_id='$accounts_id'";
$qrsum = mysqli_fetch_array_cheat(mysql_query_cheat($queryx));
?>

<div class="npage-header">
    <h2>My Referrals (Total: <?php echo $qrsum['rebs']; ?>)</h2>
</div>
<div class="ntable">
	<table class="table table-striped table-bordered table-hover">
	    <thead>
	        <tr>
				<th>Summary/Event</th>
				<th>Cost</th>
				<th>Code</th>
				<th>Username</th>
	        </tr>
	    </thead>
	    <tbody>
			<?php
				while($row=mysqli_fetch_array_cheat($q)){		
			?>
	        <tr>
	            <td><?php echo $row['rate_name']; ?> - <?php echo $row['rate_start']; ?></td>
				<td><?php echo $row['rate_start'] * 0.10; ?></td>
	            <td>PIN:	<?php echo $row['code_pin']; ?>
				<br>VALUE:	<?php echo $row['code_value']; ?></td>
				<td><?php echo $row['username']; ?></td>
	        </tr>
			<?php
				}
			?>
	    </tbody>
	</table>
</div>