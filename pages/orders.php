﻿<?phprequire_once("./connect.php");$accounts_id = $_SESSION['accounts_id'];$prods = mysql_query_cheat("SELECT * FROM tbl_cprods");$products = array();while($row=mysqli_fetch_array_cheat($prods)){    $products[] = $row;}    if($_POST['submit']!='')    {            if(count($_POST['items'])){                $_POST['items'] = json_encode($_POST['items']);                $postdata = array();                unset($_POST['submit']);                $_POST['quote'] = "#ORDER-".time()." for ". $_POST['name'];                foreach($_POST as $key=>$val)                {                    $val = addslashes($val);                    $postdata[] = "$key='$val'";                }                 mysql_query_cheat("INSERT INTO tbl_corders SET ".implode(",", $postdata));                  $success  = 1;            }                }$field[] = array("type"=>"text","value"=>"name","label"=>"Buyer Name");$field[] = array("type"=>"text","value"=>"address","label"=>"Buyer Address");$field[] = array("type"=>"text","value"=>"mobile","label"=>"Mobile/Phone");$field[] = array("type"=>"select","value"=>"pickup","option"=>array("Yes","No"),"label"=>"Pickup?");if($error!=''){?><div class="warning"><ul class="fa-ul"><li><?php echo $error;?></li></ul></div><?php}?><?phpif($success!=''){?><div class="noti"><ul class="fa-ul"><li><i class="fa fa-check fa-li"></i>Done submitting your orders <?php echo $_POST['quote']; ?>.</li></ul></div><?php}?><form method='POST' action='' class="form-container">    <div class="npage-header">        <h2>Orders</h2>    </div>    <div class="col-grp"><hr>        Order Referrer: &nbsp;<strong><?php echo $_SESSION['username']; ?></strong><br><input required="" readonly type="hidden" name="referrer" id="referrer" size="40" maxlength="255" value="<?php echo $_SESSION['username']; ?>" placeholder="Referrer">        <input required="" readonly type="hidden" name="quote" id="quote" size="40" maxlength="255" value="#order<?php echo time(); ?>-<?php echo $_SESSION['accounts_id']; ?>" placeholder="Referrer"><hr>                        <?php                        $is_editable_field = 1;                        foreach($field as $inputs)                        {                                                if($inputs['label']!='')                                                {                                                $label = $inputs['label'];                                                }                                                else                                                {                                                $label = ucwords($inputs['value']);                                                }                        ?>                                    <!---weee--->                                            <!-- <td style="width:180px;" class="key" valign="top" ><label for="accounts_name"><?php echo $label; ?><?php echo $req_fld?>:</label></td> -->                                            <?php if ( $is_editable_field ) { ?>                                            <div class="col col-12">                                            <?php                                            if ($inputs['type']=='select')                                            {                                                if($$inputs['value']!='' && $inputs['value']=='code_id')                                                {                                                 }                                                else                                                {                                                           ?>                                                <?php echo $inputs['label']; ?>                                                <select name="<?php echo $inputs['value']; ?>" id="<?php echo $inputs['value']; ?>" required <?php echo $inputs['attr']; ?>>                                                <?php                                                foreach($inputs['option'] as $val)                                                {                                                    ?>                                                    <option <?php if($$inputs['value']==$val){echo"selected='selected'";} ?> value='<?php echo $val;?>'><?php echo $val;?></option>                                                    <?php                                                }                                                ?>                                                </select>                                                <span class="validation-status"></span>                                                <?php                                                }                                            }                                            else                                            {                                                ?>                                                <input required <?php echo $inputs['attr']; ?> type="<?php echo $inputs['type']; ?>" name="<?php echo $inputs['value']; ?>" id="<?php echo $inputs['value']; ?>" size="40" maxlength="255" value="<?php echo $$inputs['value']; ?>" placeholder="<?php echo $label; ?>" />                                                <span class="validation-status"></span>                                                                                             <?php                                            }                                            ?>                                            </div>                                            <?php } else { ?>                                            <div class="col col-12"><?php echo $$inputs['value']; ?></div>                                            <?php } ?>                                                                                                                            <?php                        }                        ?>    </div><style>.itemstable td{    padding:5px;}input.qtydats {    width: 57px!important;}</style><?php$selectdata = array(); foreach($products as $prod){    $prod['price'] = number_format($prod['price'],2);    $selectdata[] = "<option value='{$prod['id']}'>{$prod['name']} - {$prod['price']}</option>"; }?><script>    function removeorder(id){        jQuery('#orderitems'+id).remove();    }    function addmorefields(){        var optiondata = "<?php echo implode("", $selectdata); ?>";        var startingids = parseInt(jQuery('.selectdata').length) + 1;        jQuery('#addmorefields').append("<tr id='orderitems"+startingids+"'><td><select class='selectdata' name='items["+startingids+"][name]'>"+optiondata+"</select></td><td><input required class='qtydats' type='number' name='items["+startingids+"][qty]'></td><td><a onclick='removeorder("+startingids+")' href='javascript:void(0)'>Remove</td></tr>");    }    </script><div class='itemstable'>    Add Products: <a  onclick='addmorefields()'href='javascript:void(0);'>Add more</a>        <table border='1' padding='1' width='100%'>            <thead>                <tr>                    <td>Product</td>                    <td>Qty</td>                    <td>Action</td>                </tr>            </thead>            <tbody id='addmorefields'>                            </tbody>        </table></div><div class="action"><input class='nbtn nbtn-primary' type='submit' name='submit' value='Send Order'></div></form><script type="text/javascript">jQuery( document ).ready(function() {    addmorefields();});  </script>