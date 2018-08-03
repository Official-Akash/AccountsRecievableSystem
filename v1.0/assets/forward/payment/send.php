<?php
error_reporting(0);
$path = $_SERVER['DOCUMENT_ROOT'];
require($path."/ARS/assets/db/db.php");
require($path."/ARS/assets/ses/session.php");

$user_id = $_POST['uid'];

if($id == ''){
    echo "<script>window.location.assign('../../../');</script>";
}else {
    $get_all_invoices = mysqli_query($con,"select * from invoice_s where cust_id=$user_id  and status='NO'");
    if(mysqli_num_rows($get_all_invoices) > 0) {
        $user_info =mysqli_query($con,"select * from cust_mer where cust_id=$user_id");
        $fetched = mysqli_fetch_array($user_info);
        $user_name = $fetched[1];
        $data = "<h3 class='text-center text-capitalize'>$user_name</h3>";
        $data .= "<label for='inv_select_list'>Select Invoice:</label><select name='inv_select_list' id='inv_select_list' class='form-control'>";
        $data .= "<option value=''>----------</option>";
        while ($fetch = mysqli_fetch_array($get_all_invoices)) {
            $data .= "<option value='$fetch[0]'>$fetch[0]</option>";
        }
        $data .= "</select><br>";
        $data .= "<input type='text' class='form-control' name='nar' placeholder='Enter Narration' id='nar'/><br>";
        $data .= "<input type='text' class='form-control' name='amt_invv' id='amt_invv' placeholder='Enter Amount of Deposition'/><br>";
        $data .= "<button id='pay_rec' class='btn btn-block btn-primary' onclick='submit_amt_for_inv()'>Add</button>";
    }else{
        $data = 'No';
    }
}
echo $data;