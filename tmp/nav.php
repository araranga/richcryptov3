<header id="dashboard-header">
	<a class="logo" href='index.php?page=home'>
		<picture>
			<source media="(max-width: 1000px)" srcset="assets/img/logo-only.png">
			<img src="logo2.png" alt="" />
		</picture>
		<!-- <img src='logo2.png' class='aimtoberich'> -->
	</a>
	<?php if ( $_SESSION['loggedin'] ) { ?>
	<div class="myaccount">
		<span class="nbtn nbtn-primary"><i class="icon-user"></i> <em>My Account</em> <i class="icon-chevron-small-down"></i></span>
		<ul>
			<li><a href="index.php?page=editprofile">Edit Profile</a></li>   
			<li><a href="index.php?page=changepass">Change Password</a></li>
			<li><a href="index.php?page=withdrawhistory">Withdrawal History</a></li>
			<li><a href="index.php?page=timeline">My Timeline</a></li>
			<li><a href="index.php?page=directs">Direct Bonus</a></li>
			<li><a href="index.php?page=unilevel">Unilevel Bonus</a></li>
			<li><a href="index.php?page=coms">Product Commission</a></li>   
			<li><a href="index.php?page=security">Security</a></li>  
			<li><a href="index.php?page=rebate">Referrals</a></li>  
			<li><a href="index.php?page=codeactivate">Code Activate</a></li>  
		</ul>
	</div>
	<?php } ?>
	<nav>
		<div>
			<ul id="main-menu">
					
			<?php

				if ( $_SESSION['loggedin'] ) {
					$query 	= 'SELECT SUM(amount) as sums FROM tbl_buycode_history WHERE accounts_id = '.$_SESSION['accounts_id'];
					$q 		= mysql_query_cheat($query);
					$row 	= mysqli_fetch_array_cheat($q);
					$sums  	= $row['sums'];	
					$currentpage = $_GET['page'];

					if ( empty($sums) ) { $sums = 0; }	
					//SELECT rate_name,rate_id FROM `tbl_rate` WHERE rate_start <= 2499					
					//$qrate= mysql_query_cheat("SELECT rate_name,rate_id FROM `tbl_rate` WHERE rate_start <= $sums");
			?>

				<li <?php echo $currentpage == 'home' ? 'class="active"' : ''; ?>><a href="index.php?page=home" ><i class="icon-megaphone"></i> <span>Announcement</span></a></li>	
				<li <?php echo $currentpage == 'tutorials' ? 'class="active"' : ''; ?>>
					<a href="index.php?page=tc" ><i class="icon-book"></i> <span>Trading Courses</span></a>
				</li>					
				<li <?php echo $currentpage == 'personalentity' ? 'class="active"' : ''; ?>><a href="index.php?page=personalentity" ><i class="icon-price-tag"></i> <span>My Products</span></a></li>

				<li <?php echo $currentpage == 'fundtransfer' ? 'class="active"' : ''; ?>><a href="index.php?page=fundtransfer" ><i class="icon-dollar"></i> <span>Fund Transfer</span></a></li>



				<li <?php echo $currentpage == 'orders' ? 'class="active"' : ''; ?>><a href="index.php?page=orders" ><i class="icon-shopping-basket"></i> <span>Send Orders</span></a></li>



				<!--<li><a href="index.php?page=reentry" ><i class="fa fa-pencil-square-o"></i>Add Entry</a></li>-->
				<li <?php echo $currentpage == 'gc' ? 'class="active"' : ''; ?>><a href="index.php?page=gc" ><i class="icon-shopping-basket"></i> <span>Purchase Courses</span></a></li>		

				<li <?php echo $currentpage == 'gc2' ? 'class="active"' : ''; ?>><a href="index.php?page=gc2" ><i class="icon-book"></i> <span>Purchase Products</span></a></li>		


				<li <?php echo $currentpage == 'btcwallet' ? 'class="active"' : ''; ?>><a href="index.php?page=btcwallet" ><i class="icon-share-alternitive"></i> <span>Deposit</span></a></li>	
		<!-- 		<li <?php echo $currentpage == 'transaction' ? 'class="active"' : ''; ?>><a href="index.php?page=transaction" ><i class="icon-shield"></i> <span>Verify My Deposit</span></a></li>	 -->
				<li <?php echo $currentpage == 'withdrawal' ? 'class="active"' : ''; ?>><a href="index.php?page=withdrawal" ><i class="icon-dollar"></i> <span>Withdrawal</span></a></li>
				<li><a href="index.php?page=signout" ><i class="icon-log-out"></i> <span>Logout</span></a></li>

			<?php
				} else {
			?>

				<li><a href="index.php?page=signin" ><i class="fa fa-sign-in"></i>Login</a></li>
				<li><a href="index.php?page=register" ><i class="fa fa-user"></i>Register</a></li>

			<?php
				}
			?>

			</ul>
		</div>

    </nav> 

</header>