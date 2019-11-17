<?php
require_once("./connect.php");
$query = "SELECT * FROM tbl_bannermanager";
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
			<h1><?php echo $row['bannermanager_title']; ?></h1>
				<div class='row'>
					<div class='contentnews col-lg-12 col-md-12'>
						<img style='float:left;padding:10px;' src='adminpage/media/<?php echo $row['bannermanager_image_large']; ?>'>
						
						<?php echo $row['bannermanager_content']; ?>
						<div style='width: 75%;margin: 0 auto;clear: both;'>
						<?php
							if($row['event']){
							$querybets = "SELECT * FROM tbl_bet";
							$qbets = mysql_query_cheat($querybets);	
							
							

							?>
								<div class="mainectable">
									
										<?php 
											$countbet = 0;
											
											$start1 = array("1", "26", "51", "76");
											while($qbetsrow=mysqli_fetch_array_cheat($qbets)){
											$getbetter = mysql_query_cheat("SELECT b.username FROM tbl_code as a JOIN tbl_accounts as b WHERE code_package='".$row['event']."' AND a.code_owner=b.accounts_id AND a.code_bet='".$qbetsrow['bet_id']."'");
											$rowgetbetter = mysqli_fetch_array_cheat($getbetter);		
											$countbet++;
										
											if (in_array($countbet, $start1)){
												
												echo "<div class='col' data-content='$countbet'>";

											}
											
											
										?>
													<div class='pantay' data-content='<?php echo $countbet; ?>'>  
														<span><?php echo $qbetsrow['bet_value'][0];?>-<?php echo $qbetsrow['bet_value'][1];?></span>
														<p style='word-wrap: break-word;text-align: center;'><?php echo $rowgetbetter['username']; ?></p>
													</div>
										<?php
											if($countbet==25){
												echo "</div>";
											}
											if($countbet==50){
												echo "</div>";
											}																					
											if($countbet==75){
												echo "</div>";
											}
											if($countbet==100){
												echo "</div>";
											}	
											}
										?>
								</div>
														
							<?php
							}
						?>
						</div>
					</div>
				</div>
			<hr>
<?php
	}
?>

