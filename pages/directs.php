<?phpsession_start();require_once("./connect.php");$accounts_id = $_SESSION['accounts_id'];function getchild($username){    $q = mysql_query_cheat("SELECT refer,username,accounts_id FROM tbl_accounts WHERE refer='$username'");    $return = array();    while($row=mysqli_fetch_array_cheat($q)) {        $return[] = $row;    }    return $return;}function ordinal($number) {    $ends = array('th','st','nd','rd','th','th','th','th','th','th');    if ((($number % 100) >= 11) && (($number%100) <= 13))        return $number. 'th';    else        return $number. $ends[$number % 10];}function reb($array,$count){    if($count==6){        return;    }    foreach($array as $d){        $_GET['reb'][$count][$d['accounts_id']] = $d['username'];        $a = getchild($d['username']);        $count2 = $count + 1;        reb($a,$count2);    }}$reb = array();$level1 = getchild($_SESSION['username']);reb($level1,1);$count = 0;$mylevel = array();$mylevelname = array();$completed  = array();$debug = array();if(!empty(count($_GET['reb']))){foreach($_GET['reb'] as $reb){    $count++;    foreach($reb as $id=>$d){        $mylevel[$id] = $count;        $mylevelname[$id] = $d;        $completed[] = $id;        $debug[$id] = "$count = $id =".$d;;    }}}//SELECT SUM(amount) as total,accounts_id FROM `tbl_buycode_history` GROUP by accounts_id#$start_year = 201;$months = array(    'January',    'February',    'March',    'April',    'May',    'June',    'July ',    'August',    'September',    'October',    'November',    'December',);$select_records = array();$last = date("Y");for ($start_year = 2019; $start_year <= $last; $start_year++) {    for ($x2 = 1; $x2 <= 12; $x2++) {        $month_data = $x2;        if(strlen($month_data)==1){            $month_data  = "0".$month_data;                    }        $select_records[$start_year."-".$month_data] = $months[$x2 - 1]." ".$start_year;        }}?><div class="npage-header">    <h2>Direct Referral Logs</h2></div>Select Date: &nbsp;<select onchange='triggerdate(this.value)'>    <option value=''>----</option>    <?php        foreach($select_records as $d=>$k){            $selected = '';            if($d==$_GET['filterdate']){                $selected = 'selected="selected"';            }            echo "<option $selected value='$d'>$k</option>";        }    ?></select><br><br><script type="text/javascript">    function triggerdate(data){        window.location = 'index.php?page=directs&filterdate='+data;    }    function goloc(){        window.location = "<?php echo "csvs/".$_SESSION['accounts_id']."{$_GET['filterdate']}.csv"; ?>";    }</script><?phpif(!empty($_GET['filterdate']) && !empty(count($completed))){    $queryx = "SELECT SUM(amount) as total,accounts_id FROM `tbl_buycode_history`  WHERE accounts_id IN (".implode(",", $completed).") AND history LIKE '%{$_GET['filterdate']}%' GROUP by accounts_id ORDER by total DESC";    $q = mysql_query_cheat($queryx);    if(!empty(mysqli_num_rows($q))){    ?><div class="ntable">    <table>        <thead>            <tr>                <th>Level</th>                <th>Username</th>                <th>Amount</th>            </tr>        </thead>        <tbody>        <?php        $file = fopen("csvs/".$_SESSION['accounts_id']."{$_GET['filterdate']}.csv","w");        $line = array('Level','Username','Amount');        fputcsv($file, $line);        while($row=mysqli_fetch_array_cheat($q)) {        ?>            <tr>                <td><?php echo $col1 = ordinal($mylevel[$row['accounts_id']]); ?></td>                <td><?php echo $col2 = $mylevelname[$row['accounts_id']]; ?></td>                <td><?php echo $col3 = "&#8369;".number_format($row['total'],2); ?></td>            </tr>        <?php        $line = array($col1,$col2,$col3);        fputcsv($file, $line);        }        fclose($file);        ?>        </tbody>    </table></div> <br><input  onclick="goloc()"; class="nbtn nbtn-primary" type="button" name="submit" value="Print to CSV"><?php    }else{        ?>        <p>No found result in <?php echo $select_records[$_GET['filterdate']]; ?> </p>        <?php    }}?>  