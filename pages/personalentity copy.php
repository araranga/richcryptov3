<?php
require_once("./connect.php");
$accounts_id = $_SESSION['accounts_id'];
$accounts_id = $_SESSION['accounts_id'];
$query = "SELECT * FROM tbl_code as a 
JOIN tbl_accounts as b 
JOIN tbl_bet as c 
JOIN tbl_rate as d 
WHERE a.code_owner=b.accounts_id  
AND a.code_owner='$accounts_id'
AND c.bet_id = a.code_bet
AND d.rate_id = a.code_package
";
$q = mysql_query_cheat($query);
?>
<h2>My Entities</h2>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
			<th>Summary/Event</th>
			<th>Cost</th>
			<th>Code</th>
			<th>Number</th>
        </tr>
    </thead>
    <tbody>
		<?php
			while($row=mysqli_fetch_array_cheat($q)){		
		?>
        <tr>
            <td><?php echo $row['rate_name']; ?> </td>
			<td><?php echo $row['rate_start']; ?></td>
            <td><?php echo $row['code_pin']; ?>/<?php echo $row['code_value']; ?></td>
            <td><?php echo $row['bet_value'][0]; ?>-<?php echo $row['bet_value'][1]; ?></td>
        </tr>
		<?php
			}
		?>
    </tbody>
</table>