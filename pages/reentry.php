<?php
require_once("./connect.php");


$package_query = mysql_query_cheat("SELECT * FROM tbl_rate WHERE activated='1' AND rate_bet!=2");	
$arr = array();
while($row_package = mysqli_fetch_array_cheat($package_query))
{
	$arr[$row_package	['rate_id']] = $row_package['rate_name']. " - ".$row_package['rate_start'];
}

?>
<style>
.fa-info-circle{
	color:red;
}
.fa-check-circle{
	color:green;
}
</style>
<div id="notibar">



</div>





                        <div class="panel panel-default">

                        <div class="panel-heading" style=' background-color: #ddd'>

                        <strong>Place Entries</strong>  

                        </div>

                            <div class="panel-body">

                                <form role="form">

                                       <br />

										<div class="form-group input-group" style='width:100%;'>



                                            <input id="code_pin" type="text" class="form-control" placeholder="Code Pin" style='width:100%;' />

                                        </div>                              
										<div class="form-group input-group" style='width:100%;'>

   

                                            <input id="code_value" type="text" class="form-control" placeholder="Code Value" style='width:100%;' />

                                        </div> 
										
										<div class="form-group input-group" style='width:100%;'>										
											<select name="rate" id="rate" onchange="checkbets()" class="form-control" style='width:100%;'>
													<option value=''>Select a Event</option>
													<?php
														foreach($arr as $key=>$val)
														{
															echo "<option value='$key'>$val</option>";
														}
													
													?>
											</select>
                                        </div> 

										<div class="form-group input-group" style='width:100%;'>
											<div id='betpos'></div>
                                        </div>										
										
                                     <a href="javascript:void(0);" onclick="send()" class="btn btn-primary ">Add Entry</a>

									
									<input type='hidden' id='betset'>
                                    </form>

                            </div>

                          

                        </div>

                    </div>

                

	<script>
	function send(){
		$(window).scrollTop( 0 );
		$('#notibar').html('');
		var packages = $('#rate').val();
		var bet = $('#betset').val();
		var code_pin = $('#code_pin').val();
		var code_value = $('#code_value').val();
		
		
		var error_msg = 0;
		if(!code_pin || !code_value){
			$('#notibar').append('<div class="noti"><ul class="fa-ul"><li><i class="fa fa-info-circle" aria-hidden="true">Please enter correct code value and pin.</i> </li></ul></div>');
			error_msg = 1;
		}		
		if(!packages){
			$('#notibar').append('<div class="noti"><ul class="fa-ul"><li><i class="fa fa-info-circle" aria-hidden="true">Please select a event.</i> </li></ul></div>');
			error_msg = 1;
		}
		if(!bet){
			$('#notibar').append('<div class="noti"><ul class="fa-ul"><li><i class="fa fa-info-circle" aria-hidden="true">Please select a number.</i> </li></ul></div>');
			error_msg = 1;
		}		
		if(error_msg==1){
			return false;
		}
		$('#notibar').html('<div class="noti"><ul class="fa-ul"><li><i class="fa fa-cog fa-spin fa-li"></i> Please wait.. Saving...</li></ul></div>');

		$.post("action/process-savebets.php",{packages:packages,bet:bet,code_pin:code_pin,code_value:code_value}, function(data, status){
			if(data=='error1'){
				$('#notibar').html('<div class="noti"><ul class="fa-ul"><li><i class="fa fa-info-circle" aria-hidden="true"> Codes are not working.. Please recheck.</i></li></ul></div>');
			}
			if(data=='error2'){
				$('#notibar').html('<div class="noti"><ul class="fa-ul"><li><i class="fa fa-info-circle" aria-hidden="true"> Sorry :(. The selected number is already picked.</i></li></ul></div>');
			}	
			if(data=='done'){
				$('#notibar').html('<div class="noti"><ul class="fa-ul"><li><i class="fa fa-check-circle" aria-hidden="true"> Congratulations. Entry is already saved. Goodluck!</i></li></ul></div>');		
				$('#rate , #betset , #code_pin , #code_value').val('');
				$('#betpos').html('');
			}
		});			
	}
	function checkbets()

	{
		jQuery('#betset').val('');
		var packages = $('#rate').val();
		
		if(!packages){
			$('#betpos').html('');
			return false;
		}
		
		$('#betpos').html('<div class="noti"><ul class="fa-ul"><li><i class="fa fa-cog fa-spin fa-li"></i> Please wait.. Loading available numbers.</li></ul></div>');

		$.post("action/process-bets.php",{packages:packages}, function(data, status){
			$('#betpos').html(data);
		});		

	}

	</script>
                