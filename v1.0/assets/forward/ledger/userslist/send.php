<?php
error_reporting(0);
$path = $_SERVER['DOCUMENT_ROOT'];
require($path."/ARS/assets/db/db.php");
require($path."/ARS/assets/ses/session.php");

$user_id = $_POST['uidi'];

if($id == ''){
    echo "<script>window.location.assign('//localhost/ARS/');</script>";
}else {
    $get_all_invoices = mysqli_query($con,"select * from invoice_s where cust_id=$user_id");
    $user_info =mysqli_query($con,"select * from cust_mer where cust_id=$user_id");
    $fetched = mysqli_fetch_array($user_info);
    $user_name = $fetched[1];
    $debit = 0;
    $credit = 0;
    $data = "<h3 class='text-center'>$user_name</h3>";
    $data .= "<div class='col-md-6 col-sm-12'>";
        $data .= "<div class='row'>";
            $data .= "<div class='btn btn-primary text-center btn-block'>Invoices</div>";
        $data .= "</div>";
        $data .= "<div class='row table-responsive'>";
            $data .= "<table class='table table-bordered'><tr><th>Date</th><th>Narration</th><th>Amount Debit</th></tr>";
            while($fetc = mysqli_fetch_array($get_all_invoices)){
                $data .= "<tr><td>$fetc[4]</td><td>To B.No. $fetc[0]</td><td>&#x20B9; $fetc[2]</td></tr>";
                $debit = $debit + $fetc[2];
            }
            $data .= "</table>";
        $data .= "</div>";
    $data .= "</div>";
    $data .= "<div class='col-md-6 col-sm-12'>";
        $data .= "<div class='row'>";
            $data .= "<div class='btn btn-danger text-center btn-block'>Payments</div>";
        $data .= "</div>";
        $data .= "<div class='row table-responsive'>";
            $data .= "<table class='table table-bordered'><tr><th>Date</th><th>Narration</th><th>Amount Credit</th></tr>";
            $get_all_payments = mysqli_query($con,"select * from pay_ments");
            while($fetchh = mysqli_fetch_array($get_all_payments)){
                $check = mysqli_query($con,"select * from invoice_s where inv_nu=$fetchh[2] and cust_id=$user_id");
                if(($num = mysqli_num_rows($check)) > 0) {
                    $amt_voucher = mysqli_fetch_array($check);
                    $data .= "<tr><td>$fetchh[3]</td><td>By $fetchh[1]</td><td>&#x20B9; $amt_voucher[2]</td></tr>";
                    $credit = $credit + $amt_voucher[2];
                }else{
                    continue;
                }
            }
            $data .= "</table>";
        $data .= "</div>";
        $data .= "<div class='row text-right'><h4>Total Debit Amount: &#x20B9; $debit</h4></div>";
        $data .= "<div class='row text-right'><h4>Total Credit Amount: &#x20B9; $credit</h4></div>";
        $pay = $debit - $credit;
        $data .= "<div class='row text-right'><h4>Amount To pay: &#x20B9; $pay</h4></div>";
        $data .= "<div class='row btn btn-block btn-success text-center' onclick='ledger_gene()'>Print</div>";
    $data .= "</div>";
}
echo $data;