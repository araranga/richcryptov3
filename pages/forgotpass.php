<?php
require_once("./connect.php");
?>

<div id="notibar">



</div>

<?php

if($_GET['error']==1)

{

	?>

<div class="warning"><ul class="fa-ul"><li><i class="fa fa-warning fa-li"></i> Please login before accessing that page.</li></ul></div>

	<?php

}

?>



                        

                                <form role="form" class="form-container forgotpassword">

									<div class="npage-header">
										<h2>Forgot Password?</h2>
									</div>

                                    <div class="col-grp">
										<div class="col col-12">
											<input id="email" type="email" placeholder="Your Email" />
										</div>
										<div class="col col-12 action">
											<a href='index.php?page=signin'><i class="icon-chevron-small-left"></i> Back</a>
											<a href="javascript:void(0);" onclick="processemail()" class="nbtn nbtn-primary ">Send now</a>		
										</div>          
									</div>            

                                </form>

                    </div>

                

	<script>

	function processemail()

	{

		var email = $('#email').val();

		$('#notibar').html('<div class="noti"><ul class="fa-ul"><li><i class="fa fa-cog fa-spin fa-li"></i> Please wait.. Checking your acccount.</li></ul></div>');

    $.post("action/process-email.php",{email:email}, function(data, status){

		//alert(data);

		$('#notibar').html('');

		if(data=="0")

		{

			$('#notibar').html('<div class="warning"><ul class="fa-ul"><li><i class="fa fa-warning fa-li"></i>Please check your email not exist.</li></ul></div>');

		}

		if(data=="1")

		{

			$('#notibar').html('<div class="noti"><ul class="fa-ul"><li><i class="fa fa-check fa-li"></i> Password sent to the email.</li></ul></div>');

		}

    });		

	}

	</script>
                