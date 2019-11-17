<?php
require_once("./connect.php");
$accounts_id = $_SESSION['accounts_id'];
$accounts_id = $_SESSION['accounts_id'];
$query = "SELECT * FROM tbl_buycode_history as a 
JOIN tbl_accounts as b 
JOIN tbl_code as c
WHERE a.accounts_id=b.accounts_id  
AND a.code_value=c.code_value
AND a.code_pin=c.code_pin
AND a.accounts_id='$accounts_id' ORDER by a.history DESC";
$q = mysql_query_cheat($query);

 $queryx = "SELECT SUM(rebates) as rebs FROM tbl_buycode_history as a JOIN tbl_accounts as b WHERE a.accounts_id=b.accounts_id  AND a.accounts_id='$accounts_id' ORDER by a.history DESC";
$qrsum = mysqli_fetch_array_cheat(mysql_query_cheat($queryx));
?>
<h2>Rebates (Total: <?php echo $qrsum['rebs']; ?>)</h2>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
			<th>Summary</th>
			<th>Code (PIN / VALUE)</th>
			<th>Amount</th>
			<th>Status</th>
        </tr>
    </thead>
    <tbody>
		<?php
			while($row=mysqli_fetch_array_cheat($q)){		
		?>
        <tr>
            <td><?php echo $row['package_summary']; ?></td>
            <td>PIN:	<?php echo $row['code_pin']; ?>
			<br>VALUE:	<?php echo $row['code_value']; ?></td>
            <td><?php echo $row['rebates']; ?></td>
			<?php
				if($row['code_owner']){
					
					$ownerrow = mysqli_fetch_array_cheat(mysql_query_cheat("SELECT * FROM tbl_accounts WHERE accounts_id='".$row['code_owner']."'"));
			?>
			<td>In use by: <strong><?php echo $ownerrow['username']; ?></strong></td>
			<?php
				}
				else{
			?>
			<td>Available</td>
			<?php
				}
			?>
        </tr>
		<?php
			}
		?>
    </tbody>
</table>