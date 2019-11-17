<?php
require_once("./connect.php");
$query = "SELECT * FROM tbl_bannermanager";
$q = mysql_query_cheat($query);
?>
<!-- <style>
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
</style> -->
<div class="npage-header">
	<h2>Announcements</h2>
</div>
<?php
	while($row=mysqli_fetch_array_cheat($q)){	
?>
			<h4><?php echo $row['bannermanager_title']; ?></h4>
				<div class='row'>
					<div class='contentnews col-lg-12 col-md-12'>
						<img style='float:left;padding:10px;width: 50%;' src='adminpage/media/<?php echo $row['bannermanager_image_large']; ?>'>
						
						<?php echo $row['bannermanager_content']; ?>
					</div>
				</div>
			<hr>
<?php
	}
?>
