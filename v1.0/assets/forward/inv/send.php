<?php
error_reporting(0);
$path = $_SERVER['DOCUMENT_ROOT'];
require($path."/ARS/assets/db/db.php");
require($path."/ARS/assets/ses/session.php");

$customer = $_POST['a'];
$products = $_POST['b'];
$qty = $_POST['c'];
$prices = $_POST['d'];
$total_price_invoice = $_POST['e'];
$inv_date = $_POST['f'];
$rand = mt_rand();
$data_for_file = array($customer,$products,$qty,$prices,$total_price_invoice,$inv_date);
if($id == ''){
    echo "<script>window.location.assign('../../../');</script>";
}else {
    $check_cust = mysqli_query($con,"select * from cust_mer where cust_id=$customer");
    if(($fetch = mysqli_fetch_array($check_cust)) > 0) {
        $amt_debit = $fetch[4];
        $getStock = mysqli_query($con,"select stock from product where pr_id=$products");
        $fetch1 = mysqli_fetch_array($getStock);
        $stock = $fetch1[0];
        if($stock >= $qty) {
            $newstock = $stock - $qty;
            $insquery = mysqli_query($con, "insert into invoice_s (cust_id,inv_amt,file_name,date_inv,due_dt_inv) values ($customer,$total_price_invoice,$rand,'$inv_date','15')");
            if ($insquery) {
                $new_amt_Debited = $amt_debit + $total_price_invoice;
                $get = mysqli_query($con, "select * from invoice_s where cust_id=$customer and inv_amt=$total_price_invoice and file_name=$rand and date_inv='$inv_date'");
                $fetch2 = mysqli_fetch_array($get);
                $invoicenum = $fetch[0];
                $filename = $invoicenum . "" . $fetch2[3] . ".csv";
                //create path
                $pathh = "../../moredata/invoices/" . $customer . "/";
                mkdir($pathh, 0, true);
                //create a file
                $fileopen = fopen($pathh . "/" . $filename, "x");
                //insert header array
                fputcsv($fileopen, $data_for_file);//put data to file
                fclose($fileopen);
                $update = mysqli_query($con, "update invoice_s set file_name='$filename' where inv_nu=$invoicenum");
                if ($update) {
                    $update_rating = mysqli_query($con,"select * from invoice_s where cust_id=$customer");
                    $numrows = mysqli_num_rows($update_rating);
                    if($numrows < 20 && $numrows >= 10){
                        $toda = date('d-m-Y');
                        $due = date('d-m-Y',strtotime($toda." + 30 days"));
                        mysqli_query($con,"update cust_mer set cust_rating='B' and cust_debit=$new_amt_Debited where cust_id=$customer");
                        mysqli_query($con, "update invoice_s set due_dt_inv='$due' where inv_nu=$invoicenum");
                        array_push($data_for_file,30);
                    }elseif ($numrows >= 20){
                        $toda = date('d-m-Y');
                        $due = date('d-m-Y',strtotime($toda." + 45 days"));
                        mysqli_query($con,"update cust_mer set cust_rating='A' and cust_debit=$new_amt_Debited where cust_id=$customer");
                        mysqli_query($con, "update invoice_s set due_dt_inv='$due' where inv_nu=$invoicenum");
                        array_push($data_for_file,45);
                    }else{
                        $toda = date('d-m-Y');
                        $due = date('d-m-Y',strtotime($toda." + 15 days"));
                        mysqli_query($con,"update cust_mer set cust_debit=$new_amt_Debited where cust_id=$customer");
                        mysqli_query($con, "update invoice_s set due_dt_inv='$due' where inv_nu=$invoicenum");
                        array_push($data_for_file,15);
                    }
                    if(mysqli_query($con,"update product set stock=$newstock where pr_id=$products"))
                        echo "ok";
                    else
                        echo "Stock didn't updated";
                } else {
                    echo "Something went wrong!!";
                }
            } else {
                echo "Some error Occured while Creating Invoice!";
            }
        }else{
            echo "Qty can't be greater than available stock";
        }
    }else{
        echo "Customer Id doesn't exist";
    }
}