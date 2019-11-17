<?php
    require_once("./connect.php");

    if ( $_POST['submit'] != '' ) {

        if($_POST['username']=='') {
            $error .= "Username is required!.<br/>";
        }

        if ( $_POST['password'] == '' ) {
            $error .= "Password is required!.<br/>";
        }

        if($_POST['password2']=='') {
            $error .= "Password is required!.<br/>";
        }   

        if($_POST['email']=='') {
            $error .= "Email is required!.<br/>";
        }   

        if($_POST['firstname']=='') {
            $error .= "firstname is required!.<br/>";
        }

        if($_POST['lastname']=='') {
            $error .= "lastname is required!.<br/>";
        }   

        if($_POST['birthdate']=='') {
            //$error .= "birthdate is required!.<br/>";
        }   

        if($_POST['gender']=='') {
            //$error .= "gender is required!.<br/>";
        }       

        if(countfield("username",$_POST['username'])!=0) {
           $error .= "Username is already exist try another!.<br/>";
        }

        if ( $_POST['refer'] != '' ) {
            if ( countfield("username",$_POST['refer']) == 0 ) {
               $error .= "Referral username is not existing please enter valid one!.<br/>";
            }
        } else {
            $error .= "Referral username is required please enter a valid one.<br/>";
        }

        if(empty($_POST['g-recaptcha-response'])){
            $error[] = "Please confirm you are not robot.";
        }

        if(countfield("email",$_POST['email'])!=0) {
            $error .= "Email is already exist try another!.<br/>";
        }

        if($_POST['password']!=$_POST['password2']) {
            $error .= "Password do not match.<br/>";
        }

        if ( $error == '' ) {
            unset($_POST['submit']);
            unset($_POST['password2']);
            unset($_POST['termscondition']);
            unset($_POST['g-recaptcha-response']);
            mysql_query_cheat("INSERT INTO tbl_accounts SET ".setinsert($_POST));

            $row = getuser($_POST['username'],$_POST['password']);
            foreach ( $row as $key=>$val ) {
                $_SESSION[$key] = $val;
            }
            $_SESSION['loggedin'] = $_POST['username'];
?>
    <script>window.location = 'index.php?page=singin&success=1';</script>
<?php
           exit();
    
        }
    }

    $field[] = array("type"=>"text","value"=>"username","label"=>"Username");
    $field[] = array("type"=>"password","value"=>"password","label"=>"Password");
    $field[] = array("type"=>"password","value"=>"password2","label"=>"Re-enter Password");
    $field[] = array("type"=>"email","value"=>"email","label"=>"Email Address");
    $field[] = array("type"=>"text","value"=>"firstname","label"=>"Firstname"); 
    $field[] = array("type"=>"text","value"=>"lastname","label"=>"Lastname");
    //$field[] = array("type"=>"date","value"=>"birthdate");
    //$field[] = array("type"=>"select","value"=>"gender","option"=>array("Male","Female"));
    //$field[] = array("type"=>"text","value"=>"mobile","label"=>"Contact Number");
    $field['refer'] = array("type"=>"text","value"=>"refer","label"=>"Referred by","placeholder"=>"Please enter the username of your referrer");


    if ( !empty( $_GET['refer'] ) ) {
        $refer_data = explode("-",$_GET['refer']);
        $accounts_id_refer = $_GET['refer'];
        $qrefer = mysql_query_cheat("SELECT username FROM tbl_accounts WHERE username='$accounts_id_refer'");
        $rowqrefer = mysqli_fetch_array_cheat($qrefer);

        if ( !empty( $rowqrefer['username'] ) ) {
            $field['refer']['readonly'] = 1;
            $_POST['refer'] = $rowqrefer['username'];
        }
    }
?>


<img src='logo2.png' class='aimtoberich signinlogo'>
<div class="registration-widget">
    <div class="registration-container">
        <div class="npage-header">
            <h2>Sign Up</h2>
        </div>
        <div class="callout callout-danger">
            <ul>
        <?php
            if ( $error != '') {
                echo "<li>".$error."</li>";
            }
        ?>
            </ul>
        </div>
        <form method='POST' action=''>
            <div class="col-grp">
                <?php

                    $is_editable_field = 1;

                    foreach ( $field as $inputs ) {

                        if ( $inputs['label'] != '' ) {
                            $label = $inputs['label'];
                        } else {
                            $label = ucwords($inputs['value']);
                        }

                        if ( $is_editable_field ) {

                            if ($inputs['type']=='select') {

                ?>

                                <select name="<?php echo $inputs['value']; ?>" id="<?php echo $inputs['value']; ?>" required <?php echo $inputs['attr']; ?>>
                                    <?php
                                    foreach ( $inputs['option'] as $val ) {
                                    ?>
                                    <option <?php if($$inputs['value']==$val){echo"selected='selected'";} ?> value='<?php echo $val;?>'><?php echo $val;?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="validation-status"></span>

                <?php

                            } else {

                                if ( 
                                    $inputs['label'] == 'Password' ||
                                    $inputs['label'] == 'Re-enter Password' ||
                                    $inputs['label'] == 'Firstname' ||
                                    $inputs['label'] == 'Lastname'
                                ) {
                                    $fieldclass = 'col-6';
                                } else {
                                    $fieldclass = 'col-12';
                                }

                                echo '<div class="col '.$fieldclass.'">';
                ?>

                                <input <?php if($inputs['readonly']=='1') { echo 'readonly'; }?> <?php if($inputs['value']!='refers') { echo 'required'; }?> <?php echo $inputs['attr']; ?> type="<?php echo $inputs['type']; ?>" name="<?php echo $inputs['value']; ?>" id="<?php echo $inputs['value']; ?>" placeholder="<?php echo $inputs['label']; ?>" maxlength="255" value="<?php echo $_POST[$inputs['value']]; ?>" />
                                <span class="validation-status"></span>

                <?php
                                echo '</div>';
                            }

                        } else {

                            echo '<div class="col col-12">' . $$inputs['value'] . '</div>';

                        }

                    }


                ?>

                <div class="col col-12"><input id='terms' name='termscondition' type='checkbox'onclick="checkterms()"> I agree to the terms and conditions. <a href='javascript:void(0)' onclick="jQuery('#agreement').slideToggle();">View here</a></div>
                <?php
                    $queryx = "SELECT * FROM tbl_cmsmanager WHERE id='39'";
                    $qx = mysql_query_cheat($queryx);
                    $rowx = mysqli_fetch_array_cheat($qx);
                ?>
                <div class="col col-12"><div id='agreement'><?php echo $rowx['cmsmanager_content']; ?></div></div>

                <div class='col col-12'>

                    <script type="text/javascript">
                        var onloadCallback = function() {
                            grecaptcha.render('test', {
                                'sitekey' : '6LfmMTkUAAAAAI-BqOClWhvBByuZ65CZmFgvp9px',
                                'callback' : verifyCallback,
                            });
                        };
                        var verifyCallback = function(response) {
                            if(response!=''){
                                jQuery('#recap').val(response);
                            }
                        };
                    </script>
                    <div id='test'></div>
                    
                </div>
                <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

                <input type='hidden' name='date_created' value='<?php echo date("Y-m-d h:i:s"); ?>'>
                <div class="col col-12 action" id='registerbutton'><input type='submit' name='submit' value='Register' class="nbtn nbtn-primary" /></div>

                <div class="col col-12 loginlink"><a href="index.php?page=signin">Already have an account?</a></div>
            </div>
        </form>
    </div>
</div>
                