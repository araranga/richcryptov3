<?php
ini_set("log_errors", 1);
ini_set("error_log", "php-error.log");
	error_reporting(E_ALL);
	session_start();
	require_once("connect.php");
	require_once("function.php");
	require_once 'googleLib/GoogleAuthenticator.php';
	$ga = new GoogleAuthenticator();	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include("tmp/head.php"); ?>

<body <?php echo !$_SESSION['loggedin'] ? 'class="outside"' : ''; ?>>

    <div id="wrapper">
    	<?php 
	    	
    		if ( $_SESSION['loggedin'] ) {
	    		include("tmp/nav.php"); 
	    	}

    	?>

    	<div id="dashboard-body">
    		<?php if ( $_SESSION['loggedin'] ) { ?>
    		<div class="topstrip">
    			<?php if ( !empty($_SESSION['username']) ) { ?>
    				<div class="theuser">Hi, <?php echo $_SESSION['firstname'] .' '. $_SESSION['lastname']; ?><span class="profilepic"></span></div>
    			<?php } ?>
    		</div>
    		<?php
    			}
				#echo $startDate = date('Y-m-d');
				#cho "-";
				#$wDays = 5;
				#echo $new_date = date('Y-m-d', strtotime("{$startDate} +{$wDays} weekdays"));
			
				if ( $_SESSION['loggedin'] ) {
					if ( $_GET['page']=='signin' || $_GET['page']=='register' ) {
						$_GET['page'] = "home";
					}
				} else {
					if ( $_GET['page']!='signin' && $_GET['page']!='register' && $_GET['page']!='home' && $_GET['page']!='forgotpass' && $_GET['page']!='signout' ) {
						$_GET['page'] = "signin";
					}				
				}
			
				if( !$_GET['page'] ) {
					echo "<div class='wrap'>";
						include("pages/home.php");
					echo "</div>";
				} else {
					echo "<div class='wrap'>";
					include("pages/".$_GET['page'].".php");
					echo "</div>";
				}
			?>
    	</div>
    </div>
        <!-- <div class="navbar navbar-inverse navbar-fixed-top" style='background-color: #fbfbfb;'>
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse" style='background-color:grey;'>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>   
				<a class="navbar-brand" href='index.php?page=home' style='color:#214761;'>
					<img src='logo2.png' class='aimtoberich' style='height:100px;'>
				</a>					
                </div>
				<?php if(!empty($_SESSION['username'])) {  ?>
				<div style="color: black;padding: 47px 50px 5px 50px;float: right;font-size: 16px;"> Hi, <?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['lastname']; ?></div>
				<?php } ?>
            </div>
        </div> -->
          


    
<script>
jQuery(document).ready(function(){

    // Select and loop the container element of the elements you want to equalise
    jQuery('.mainectable').each(function(){  
      
      // Cache the highest
      var highestBox = 0;
      
      // Select and loop the elements you want to equalise
      jQuery('.pantay', this).each(function(){
        
        // If this box is higher than the cached highest then store it
        if($(this).height() > highestBox) {
          highestBox = $(this).height(); 
        }
      
      });  
            
      // Set the height of all those children to whichever was highest 
      jQuery('.pantay',this).height(highestBox);
                    
    }); 

});

function checkterms(){
	if(jQuery("#terms").is(':checked')){
		jQuery("#registerbutton").show();
	}else{
		jQuery("#registerbutton").hide();
	}
}
</script>  
</body>
</html>
