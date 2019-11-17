<?php
require_once("./connect.php");




$query = 'SELECT SUM(amount) as sums FROM tbl_buycode_history WHERE accounts_id = '.$_SESSION['accounts_id'];

$q = mysql_query_cheat($query);

$row = mysqli_fetch_array_cheat($q);

 $sums  = $row['sums'];	


$query = "SELECT * FROM tbl_rate WHERE rate_id=".$_GET['id']." AND rate_start <= $sums";
$q = mysql_query_cheat($query);
?>
<style>
.mainectable > div > div {
    border: 1px solid #ccc1c1 ;
}
.mainectable > div {
	display: inline-table;
	width: 25%;
	
}
.mainectable > div > div { 
	background: linear-gradient(-35deg,white 15px, #ccc1c1 15px,white 19px, white 3px);
	
}
</style>
<?php

	


	while($row=mysqli_fetch_array_cheat($q)){	
?>
			<h1><?php echo $row['rate_name']; ?></h1>
				<div class='row'>
					<div class='contentnews col-lg-12 col-md-12'>
				
						<?php echo $row['content_data']; ?>
					</div>
				</div>
			<hr>
<?php
	}
?>

