<?php
require_once("./connect.php");
$accounts_id = $_SESSION['accounts_id'];
$accounts_id = $_SESSION['accounts_id'];
$query = "SELECT * FROM tbl_buycode_history as a 
JOIN tbl_accounts as b 
WHERE a.accounts_id=b.accounts_id  
AND a.accounts_id='$accounts_id'
";
$q = mysql_query_cheat($query);


function dateDiff($d1){
    $date1=strtotime($d1);
    $date2=strtotime(date("Y-m-d h:i:sa"));
    $seconds = $date1 - $date2;
    $weeks = floor($seconds/604800);
    $seconds -= $weeks * 604800;
    $days = floor($seconds/86400);
    $seconds -= $days * 86400;
    $hours = floor($seconds/3600);
    $seconds -= $hours * 3600;
    $minutes = floor($seconds/60);
    $seconds -= $minutes * 60;
    $months=round(($date1-$date2) / 60 / 60 / 24 / 30);
    $years=round(($date1-$date2) /(60*60*24*365));
    $diffArr=array("Seconds"=>$seconds,
                  "minutes"=>$minutes,
                  "Hours"=>$hours,
                  "Days"=>$days,
                  "Weeks"=>$weeks,
                  "Months"=>$months,
                  "Years"=>$years
                 ) ;
   return $diffArr;
}


$monthly = "amount,maturity_date,maturity_amount";
?>
<style>
.timers{
  padding: 10px;
    background: green;
    color: white;
    font-weight: bolder;
    width: 154px;
}
</style>


<div class="npage-header">
    <h2>My Products</h2>
</div>
<div class="ntable">
    <table>
        <thead>
            <tr>
    			<th>My Product Database</th>
                <th>History</th>
                <th>Amount</th>
                <th>Cycle 1</th>
                <th>Cycle 2</th>
                <th>Cycle 3</th>
            </tr>
        </thead>
        <tbody>
		<?php
			while ( $row=mysqli_fetch_array_cheat($q) ) {		

                #var_dump($row);
				//var_dump(dateDiff($row['history']));
		?>
            <tr>
                <td><?php echo $row['package_summary']; ?></td>
                <td><?php echo $row['history']; ?></td>
                <td>&#8369;<?php echo number_format($row['amount'],2); ?></td>
                <?php
                for ($x = 1; $x <= 3; $x++) {
                ?>
                <td>
                    <?php
                        if ( empty( $row['c'.$x.'status'] ) ) {

                            $startDate = date('Y-m-d');
                            if ( $row['c'.$x] == $startDate ) {
                                echo "Status: Please wait for the system to compute your payout.";
                            }else{
                                echo "Bonus Date: ".$row['c'.$x];
                            }
                        } else {
                            echo "Amount : &#8369;".number_format($row['c'.$x.'amount'],2);
                            echo "<br>Status: Completed";
                        }

                    ?>
                </td>
                <?php
                }
                ?>



            </tr>
		<?php
			}
		?>
        </tbody>
    </table>
</div>