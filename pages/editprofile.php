<?php



$accounts_id = $_SESSION['accounts_id'];



	if($_POST['submit']!='')

	{

	

		if(countfield("email",$_POST['email'])!=0 && $_POST['email']!=$_SESSION['email'])

		{

			$error .= "<i class=\"fa fa-warning\"></i>Email is already exist.<br>";



		}

		

		if($error=='')

		{

		$_SESSION['email'] = $_POST['email'];

		unset($_POST['submit']);
		unset($_POST['balance']);
		unset($_POST['balance_pesos']);
		unset($_POST['balance_wallet']);

		$fields = formquery($_POST);

		mysql_query_cheat("UPDATE tbl_accounts SET $fields WHERE accounts_id='$accounts_id'");

		$success = 1;

		}

	}







$field[] = array("type"=>"text","value"=>"username","attr"=>"disabled");

#$field[] = array("type"=>"password","value"=>"password","attr"=>"disabled");

$field[] = array("type"=>"email","value"=>"email","attr"=>"disabled");

$field[] = array("type"=>"text","value"=>"firstname");

$field[] = array("type"=>"text","value"=>"lastname");

$field[] = array("type"=>"date","value"=>"birthdate");

$field[] = array("type"=>"select","value"=>"gender","option"=>array("Male","Female"));

$field[] = array("type"=>"text","value"=>"occupation");

$field[] = array("type"=>"select","value"=>"civilstatus","option"=>array("Single","Married","Separated","Widowed"));

$field[] = array("type"=>"text","value"=>"address");

$field[] = array("type"=>"text","value"=>"mobile");

$field[] = array("type"=>"text","value"=>"telno");



//

$q = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE accounts_id='$accounts_id'");

$row = mysqli_fetch_array_cheat($q);

foreach($field as $f)

{

	$$f['value'] = $row[$f['value']];

}


if($error!='')

{

?>

<div class="warning"><ul class="fa-ul"><li><?php echo $error;?></li></ul></div>

<?php

}

?>





<?php

if($success!='')

{

?>

<div class="noti"><ul class="fa-ul"><li><i class="fa fa-check fa-li"></i>Done updating your details!.</li></ul></div>

<?php

}

?>



<style>
button[disabled], html input[disabled] {
    cursor: default;
    background: #d8d2d2;
}
</style>



<form method='POST' action='' class="form-container editprofile">
	<div class="npage-header">
		<h2>Edit Profile</h2>
	</div>
	<div class="col-grp">
		<?php

			$is_editable_field = 1;

				foreach($field as $inputs) {
					if($$inputs['value']!='' && $inputs['value']=='code_id') {
						$label = "Package / Account Type";
					} else {
						$label = ucwords($inputs['value']);
					}

		?>

					<!-- <div class="row"> -->
						<!-- <td style="width:180px;" class="key" valign="top" >
							<label for="accounts_name"><?php echo $label; ?><?php echo $req_fld?>:</label>
						</td> -->

		<?php 

					if ( $is_editable_field ) { 

						if ( $inputs['value'] == 'address' ) {
							$colclass =  'col-12';
						} else {
							$colclass =  'col-6';
						}
						

					?>
	
						<div class="col <?php echo $colclass; ?>">
							<?php
								if ($inputs['type']=='select') {
									if($$inputs['value']!='' && $inputs['value']=='code_id') { 
									} else {
							?>

										<select name="<?php echo $inputs['value']; ?>" id="<?php echo $inputs['value']; ?>" required <?php echo $inputs['attr']; ?>>
											<?php foreach($inputs['option'] as $val) { ?>
											<option <?php if($$inputs['value']==$val){echo"selected='selected'";} ?> value='<?php echo $val;?>'><?php echo $val;?></option>
											<?php } ?>
										</select>
										<span class="validation-status"></span>

							<?php
									}
								} else {
							?>
							
									<input required <?php echo $inputs['attr']; ?> type="<?php echo $inputs['type']; ?>" name="<?php echo $inputs['value']; ?>" id="<?php echo $inputs['value']; ?>" size="40" maxlength="255" value="<?php echo $$inputs['value']; ?>" placeholder="<?php echo $inputs['value']; ?>" />
									<span class="validation-status"></span>												
							<?php
								}
 							?>
						</div>
				
					<?php } else { ?>
							<div class="col-md-6"><?php echo $$inputs['value']; ?></div>
					<?php } ?>                                                                                                    

					<!-- </div> -->

			<?php
				}
			?>

	</div>

<div class="action"><input class='nbtn nbtn-primary' type='submit' name='submit' value='Update'></div>

</form>