<?php
$tbl = "tbl_accounts";
$ga = new GoogleAuthenticator();
  

$error = array();
$success = array();
$securelog = '';


?>
<div class="login-widget" style='max-width:100%;'>
    <div class="login-container">
        <div class="npage-header">
          <h2>Please agree on terms before using the site.</h2>
        </div>
        <?php
          $queryx = "SELECT * FROM tbl_cmsmanager WHERE id='39'";
          $qx = mysql_query_cheat($queryx);
          $rowx = mysqli_fetch_array_cheat($qx);
        ?>
        <?php echo $rowx['cmsmanager_content']; ?>  

        <button onclick="window.location = 'index.php?agree=1'">I Agree</button>
        <button onclick="window.location = 'index.php?page=signout'">I Do not Agree</button>
    </div>
</div>