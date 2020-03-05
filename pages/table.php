<?php
require_once("./connect.php");
$accounts_id = $_SESSION['accounts_id'];
$accounts_id = $_SESSION['accounts_id'];



$qxmono = mysql_query_cheat("SELECT a.id,(SELECT COUNT(child) FROM tbl_othertablebeta WHERE child=a.id OR parent=a.id) as count FROM tbl_monoline as a HAVING count = 0 ORDER by id ASC");

while($rowmono = mysqli_fetch_array_cheat($qxmono)){
    success200($rowmono['id']);

}









$query = "SELECT * FROM `tbl_monoline` as a WHERE a.accounts_id='{$accounts_id}' AND a.payout_status=0 ORDER by a.id ASC LIMIT 1";
$q = mysql_query_cheat($query);

$row = mysqli_fetch_array_cheat($q);

$firstdats = $row;


$myid = $row['id'];
breakfree_child_wager(array($myid),"wager",123123);
$myarraydata = countdownlines_dashboard($_GET['wager'],2);
$counter_exit = countdownlines_dashboard($_GET['wager'],1);

$q1 = "SELECT *,(0) as count FROM `tbl_monoline` as a WHERE a.id IN ({$myarraydata})";
$q1r = mysql_query_cheat($q1);




?>
<style>
.timers{
  padding: 10px;
    background: green;
    color: white;
    font-weight: bolder;
    width: 154px;
}

.win{
    background: rgba(210,255,82,1);
    background: -moz-linear-gradient(left, rgba(210,255,82,1) 0%, rgba(145,232,66,1) 100%);
    background: -webkit-gradient(left top, right top, color-stop(0%, rgba(210,255,82,1)), color-stop(100%, rgba(145,232,66,1)));
    background: -webkit-linear-gradient(left, rgba(210,255,82,1) 0%, rgba(145,232,66,1) 100%);
    background: -o-linear-gradient(left, rgba(210,255,82,1) 0%, rgba(145,232,66,1) 100%);
    background: -ms-linear-gradient(left, rgba(210,255,82,1) 0%, rgba(145,232,66,1) 100%);
    background: linear-gradient(to right, rgba(210,255,82,1) 0%, rgba(145,232,66,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d2ff52', endColorstr='#91e842', GradientType=1 );
}

.win23
{

background: rgba(241,231,103,1);
background: -moz-linear-gradient(45deg, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(241,231,103,1)), color-stop(100%, rgba(254,182,69,1)));
background: -webkit-linear-gradient(45deg, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
background: -o-linear-gradient(45deg, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
background: -ms-linear-gradient(45deg, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
background: linear-gradient(45deg, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1e767', endColorstr='#feb645', GradientType=1 );


}


.win2{



background: rgba(255,175,75,1);
background: -moz-linear-gradient(left, rgba(255,175,75,1) 0%, rgba(255,146,10,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(255,175,75,1)), color-stop(100%, rgba(255,146,10,1)));
background: -webkit-linear-gradient(left, rgba(255,175,75,1) 0%, rgba(255,146,10,1) 100%);
background: -o-linear-gradient(left, rgba(255,175,75,1) 0%, rgba(255,146,10,1) 100%);
background: -ms-linear-gradient(left, rgba(255,175,75,1) 0%, rgba(255,146,10,1) 100%);
background: linear-gradient(to right, rgba(255,175,75,1) 0%, rgba(255,146,10,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffaf4b', endColorstr='#ff920a', GradientType=1 );
color:grey;
font-weight: 700;

}

.noperson{
background: rgba(242,246,248,1);
background: -moz-linear-gradient(top, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 50%, rgba(181,198,208,1) 99%, rgba(224,239,249,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(242,246,248,1)), color-stop(50%, rgba(216,225,231,1)), color-stop(99%, rgba(181,198,208,1)), color-stop(100%, rgba(224,239,249,1)));
background: -webkit-linear-gradient(top, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 50%, rgba(181,198,208,1) 99%, rgba(224,239,249,1) 100%);
background: -o-linear-gradient(top, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 50%, rgba(181,198,208,1) 99%, rgba(224,239,249,1) 100%);
background: -ms-linear-gradient(top, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 50%, rgba(181,198,208,1) 99%, rgba(224,239,249,1) 100%);
background: linear-gradient(to bottom, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 50%, rgba(181,198,208,1) 99%, rgba(224,239,249,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f6f8', endColorstr='#e0eff9', GradientType=0 );    
}
.bordermlm {
    border: 1px solid black;
    padding: 20px;
    margin-top: 4px;
    border-radius: 17px;
    float:left;
    height:66px;
    text-align: center;
    overflow: hidden;
}


.bordermlm.countdata1 {
    width: 100%;
}


.bordermlm.countdata2 , .bordermlm.countdata3 {
    width: 50%;
}


.bordermlm.countdata4 , .bordermlm.countdata5 , .bordermlm.countdata6 , .bordermlm.countdata7  {
    width: 25%;
}

.bordermlm.countdata8,
.bordermlm.countdata9,
.bordermlm.countdata10,
.bordermlm.countdata11,
.bordermlm.countdata12,
.bordermlm.countdata13,
.bordermlm.countdata14,
.bordermlm.countdata15 {
    width:12.5%;
}

tr.neardata1 {
    background-color: #e6ffe6;
}

</style>


<div class="npage-header">
    <h2>My Investment Status</h2>
</div>
<div>
  <?php

  if(!empty($firstdats['id'])) 

  {
  $count = 1;
  while($dats=mysqli_fetch_array_cheat($q1r)){

    echo "<div class='bordermlm countdata{$count} win2'><span>{$dats['username']}</span></div>";

    $count++;

}

for ($x = $count; $x <= 15; $x++) {
    echo "<div class='bordermlm countdata{$x} noperson'><span>EMPTY</span></div>";
}






?>
<hr>


</div>
<br style='clear:both;'/>



<br/><br/>
<?php
$qx = mysql_query_cheat("SELECT *,(SELECT COUNT(*) FROM tbl_monoline WHERE id>=a.id LIMIT 15) as count FROM `tbl_monoline` as a WHERE a.accounts_id='{$accounts_id}' AND a.payout_status!=1 HAVING count <= 15 ORDER by a.id ASC");
?>
<div class="ntable">
    <table>
        <thead>
            <tr>
                <th>Unique ID</th>
                <th>Next Payout (If not completed)</th>
                <th>Total Payouts</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $xcount = 1;
            while ( $row=mysqli_fetch_array_cheat($qx) ) {       

                #var_dump($row);
                //var_dump(dateDiff($row['history']));
        ?>
        <tr class='neardata<?php echo $xcount; ?>'>
            <td><?php echo $row['hash']; ?></td>
            <td><?php echo $row['payout_date']; ?></td>
            <td><?php echo $row['total_payouts']; ?> / 10</td>
            <td>

                <strong>Status:<?php echo empty($row['payout_status']) ? 'Ongoing' : 'Done' ?></strong>
                <hr>
                <strong>Completion Bonus: ₱<?php echo number_format($row['payout_win'],2); ?></strong>
                <br/>
                <strong>Every 90 Days Bonus: ₱<?php echo number_format($row['payout_lose'],2); ?></strong>                

            </td>
        </tr>

        <?php
        $xcount++;
        }
        ?>
        </tbody>
    </table>
<?php 

}
else{
    echo "No Data to show.";
} 


?>
</div>