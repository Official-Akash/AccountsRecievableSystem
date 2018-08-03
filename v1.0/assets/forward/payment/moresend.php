<?php
error_reporting(0);
$path = $_SERVER['DOCUMENT_ROOT'];
require($path."/ARS/assets/db/db.php");
require($path."/ARS/assets/ses/session.php");

$inv_num = $_POST['one'];
$narr = $_POST['two'];
$inv_amt = $_POST['three'];

if($id == ''){
    echo "<script>window.location.assign('../../../');</script>";
}else {
    $get_all_invoices = mysqli_query($con,"select * from invoice_s where inv_nu=$inv_num");
    $fetch = mysqli_fetch_array($get_all_invoices);
    if($fetch[2] != $inv_amt){
        echo "You have to Pay full Invoice Amount i.e. ".$fetch[2];
    }else{
        //insert into pay_ments
        $date = date('d-m-Y');
        $insert_voucher = mysqli_query($con,"insert into pay_ments (narr,inv_num,date_payment) values ('$narr','$inv_num','$date')");
        if($insert_voucher){
            //update no to yes
            abc: $update_paid = mysqli_query($con,"update invoice_s set status='YES' where inv_nu=$inv_num");
            if($update_paid){
                $update_debit_amt = mysqli_query($con,"select * from cust_mer where cust_id=$fetch[0]");
                $fetche = mysqli_fetch_array($update_debit_amt);
                mysqli_query($con,"update cust_mer set cust_debit=($fetche[4]-$inv_amt)");
                echo 'ok';
            }else{
                goto abc;
            }
        }else{
            echo "Failed To Create Voucher. Reload the page and try again";
        }
    }
}