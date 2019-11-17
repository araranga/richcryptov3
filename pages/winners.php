<?php
require_once("./connect.php");
$query = "SELECT * FROM tbl_logo";
$q = mysql_query_cheat($query);
?>
<style>
.mainectable > div > div {
    border: 1px solid;
	width: 15%;
	float:left;
}
.mainectable {
	width:60%;
	margin:0 auto;
}
.mainectable span{
	padding:7px;
}
.pantay {
	min-height:75px;
}
</style>
<?php
	while($row=mysqli_fetch_array_cheat($q)){	
?>
			<h1><?php echo $row['title']; ?></h1>
				<div class='row'>
					<div class='contentnews col-lg-12 col-md-12'>
						<img style='float:left;padding:10px;' src='adminpage/media/<?php echo $row['image']; ?>'>
						
						<?php echo $row['header']; ?>		
					</div>
				</div>
			<hr>
<?php
	}
?>

