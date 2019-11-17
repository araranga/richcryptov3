<?php
	




	function countfield($field,$value)
	{
		$query = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE $field='$value'");
		return mysqli_num_rows($query);
	}
	function countquery($querytxt){
		$query = mysql_query_cheat($querytxt);
		return mysqli_num_rows($query);		
	}
	function setinsert($array)
	{
	$return = array();
	
		foreach($array as $key=>$val)
		{
		$return[] = "$key='$val'";
		}
	
	return implode(",",$return);
	}	
	
	function formquery($post)
	{
	$return = array();
	foreach($post as $key=>$val)
	{
		$return[] = "$key='$val'";
	}
	 return implode(",",$return);
	}



function sendmail($to,$subject,$content,$cc = '')
{

$content2 =  <<<EOF
<html xmlns="http://www.w3.org/1999/xhtml"><head>
		<title>Email</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style type="text/css">
			* {
				-ms-text-size-adjust:100%;
				-webkit-text-size-adjust:none;
				-webkit-text-resize:100%;
				text-resize:100%;
			}
			a{
				outline:none;
				color:#40aceb;
				text-decoration:underline;
			}
			a:hover{text-decoration:none !important;}
			.nav a:hover{text-decoration:underline !important;}
			.title a:hover{text-decoration:underline !important;}
			.title-2 a:hover{text-decoration:underline !important;}
			.btn:hover{opacity:0.8;}
			.btn a:hover{text-decoration:none !important;}
			.btn{
				-webkit-transition:all 0.3s ease;
				-moz-transition:all 0.3s ease;
				-ms-transition:all 0.3s ease;
				transition:all 0.3s ease;
			}
			table td {border-collapse: collapse !important;}
			.ExternalClass, .ExternalClass a, .ExternalClass span, .ExternalClass b, .ExternalClass br, .ExternalClass p, .ExternalClass div{line-height:inherit;}
			@media only screen and (max-width:500px) {
				table[class="flexible"]{width:100% !important;}
				table[class="center"]{
					float:none !important;
					margin:0 auto !important;
				}
				*[class="hide"]{
					display:none !important;
					width:0 !important;
					height:0 !important;
					padding:0 !important;
					font-size:0 !important;
					line-height:0 !important;
				}
				td[class="img-flex"] img{
					width:100% !important;
					height:auto !important;
				}
				td[class="aligncenter"]{text-align:center !important;}
				th[class="flex"]{
					display:block !important;
					width:100% !important;
				}
				td[class="wrapper"]{padding:0 !important;}
				td[class="holder"]{padding:30px 15px 20px !important;}
				td[class="nav"]{
					padding:20px 0 0 !important;
					text-align:center !important;
				}
				td[class="h-auto"]{height:auto !important;}
				td[class="description"]{padding:30px 20px !important;}
				td[class="i-120"] img{
					width:120px !important;
					height:auto !important;
				}
				td[class="footer"]{padding:5px 20px 20px !important;}
				td[class="footer"] td[class="aligncenter"]{
					line-height:25px !important;
					padding:20px 0 0 !important;
				}
				tr[class="table-holder"]{
					display:table !important;
					width:100% !important;
				}
				th[class="thead"]{display:table-header-group !important; width:100% !important;}
				th[class="tfoot"]{display:table-footer-group !important; width:100% !important;}
			}
		</style>
	</head>
	<body style="margin:0; padding:0;" bgcolor="#eaeced">
		<table style="min-width:320px;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#eaeced">
			<!-- fix for gmail -->
			<tbody><tr>
				<td class="hide">
					<table width="600" cellpadding="0" cellspacing="0" style="width:600px !important;">
						<tbody><tr>
							<td style="min-width:600px; font-size:0; line-height:0;">&nbsp;</td>
						</tr>
					</tbody></table>
				</td>
			</tr>
			<tr>
				<td class="wrapper" style="padding:0 10px;">
					<!-- module 2 -->
					<table data-module="module-2" data-thumb="thumbnails/02.png" width="100%" cellpadding="0" cellspacing="0">
						<tbody><tr>
							<td data-bgcolor="bg-module" bgcolor="#eaeced">
								<table class="flexible" width="600" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
									<tbody>
									<tr>
										<td data-bgcolor="bg-block" class="holder" style="padding:58px 60px 52px;" bgcolor="#f9f9f9">
											<table width="100%" cellpadding="0" cellspacing="0">
												<tbody><tr>
													<td data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:35px/38px Arial, Helvetica, sans-serif; color:#292c34; padding:0 0 24px;">
														{$subject}
													</td>
												</tr>
												<tr>
													<td data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" align="center" style="font:bold 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;">
														{$content}
													</td>
												</tr>
											</tbody></table>
										</td>
									</tr>
									<tr><td height="28"></td></tr>
								</tbody></table>
							</td>
						</tr>
					</tbody></table>
					<!-- module 3 -->				
				</td>
			</tr>
			<!-- fix for gmail -->
			<tr>
				<td style="line-height:0;"><div style="display:none; white-space:nowrap; font:15px/1px courier;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div></td>
			</tr>
		</tbody></table>
	
</body></html>
EOF;



// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <noreply@cryptotradeplus.co>' . "\r\n";
	if(!empty($cc)){
		$headers .= 'Cc: ' .$cc. "\r\n";  
	}
mail($to,$subject,$content2,$headers);
 

}



function getmageconfig($path){
	$q = mysql_query_cheat("SELECT value FROM btc_core_config_data WHERE path = '$path' LIMIT 1");
	$row = mysqli_fetch_array_cheat($q);
	return $row['value'];	
}



function checklogin($username,$password){
	$q = mysql_query_cheat("SELECT COUNT(*) as count FROM tbl_accounts WHERE username = '$username'  AND password = '$password'");
	$row = mysqli_fetch_array_cheat($q);
	return $row['count'];	
}


function btctosatoshi($value){
	return $value * 100000000;
}

function checklogin_confirmation($username,$password){
	$q = mysql_query_cheat("SELECT COUNT(*) as count FROM tbl_accounts WHERE username = '$username'  AND password = '$password' AND confirm='' ");
	$row = mysqli_fetch_array_cheat($q);
	return $row['count'];	
}

function getemailconfirmation($username){
	$q = mysql_query_cheat("SELECT confirm FROM tbl_accounts WHERE username = '$username'");
	$row = mysqli_fetch_array_cheat($q);
	return $row['confirm'];	
}

function getemailconfirmationemail($username){
	$q = mysql_query_cheat("SELECT email FROM tbl_accounts WHERE username = '$username'");
	$row = mysqli_fetch_array_cheat($q);
	return $row['email'];	
}




function checkuserbyelu($address){
	$q = mysql_query_cheat("SELECT username FROM tbl_accounts WHERE elu_address='$address'");
	$row = mysqli_fetch_array_cheat($q);
		if($row['username']==''){
			return '';
		}
		return $row['username'];	
}

function checkuserbyeluemail($address){
	$q = mysql_query_cheat("SELECT email FROM tbl_accounts WHERE elu_address='$address'");
	$row = mysqli_fetch_array_cheat($q);
		if($row['email']==''){
			return '';
		}
		return $row['email'];	
}




function checkemailcode($username,$password,$code){
	$q = mysql_query_cheat("SELECT COUNT(*) as count FROM tbl_accounts WHERE username = '$username'  AND password = '$password' AND security1_val = '$code'");
	$row = mysqli_fetch_array_cheat($q);

	if($row['count']==0){
	return '';
	}
	return $row['count'];	
}

function btcamountsum($username){
	$q = mysql_query_cheat("SELECT SUM(amount) as total FROM btc_btcwithdraw WHERE username='$username' AND withdraw_type='btc' AND status='1'");
	$row = mysqli_fetch_array_cheat($q);

	if($row['total']==''){
	return '0';
	}
	return $row['total'];	
}

function getUserBalance($username){
	$q = mysql_query_cheat("SELECT balance FROM tbl_accounts WHERE username = '$username'");
	$row = mysqli_fetch_array_cheat($q);
	return $row['balance'];	
}
function getuserbyEmail($email){
	$q = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE email = '$email'");
	$row = mysqli_fetch_array_cheat($q);
	return $row;	
}

function getuserbyConfirm($confirm){
	$q = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE confirm = '$confirm'");
	$row = mysqli_fetch_array_cheat($q);
	return $row;	
}

function confirmTheUser($username){
	$q = mysql_query_cheat("UPDATE tbl_accounts SET confirm='' WHERE username = '$username'");
}


function getuser($username,$password){
	$q = mysql_query_cheat("SELECT * FROM tbl_accounts WHERE username = '$username'  AND password = '$password'");
	$row = mysqli_fetch_array_cheat($q);
	return $row;	
}

function createRandomPassword($max = 7) { 

    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= $max) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 

    return $pass; 

}  


function generateEmailKey($username,$email){
 $random = createRandomPassword();
 mysql_query_cheat("UPDATE tbl_accounts  SET security1_val='$random' WHERE username = '$username'");
 sendmail($email,"Email Authentication Code","Your Code is {$random}");
}

function getCurrentBTC(){

	$btc = json_decode(httpGet(BTCVALUE),true);
	return $btc['USD']['buy'];

}



function getCountries(){
	$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

		return $countries;
}


function httpGet($url)
{
    $ch = curl_init();  
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $output=curl_exec($ch);
    curl_close($ch);
    return $output;
}

?>