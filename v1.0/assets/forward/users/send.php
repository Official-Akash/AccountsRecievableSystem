<?php
error_reporting(0);
$path = $_SERVER['DOCUMENT_ROOT'];
require($path."/ARS/assets/db/db.php");
require($path."/ARS/assets/ses/session.php");

$cust1 = $_POST['one'];
$cust2 = $_POST['two'];
$cust3 = $_POST['three'];

if($id == ''){
    echo "<script>window.location.assign('../../../');</script>";
}else {
    if ($cust1 == '' || $cust2 == '' || $cust3 == '') {
        echo "All fields are required";
    } else {
        $insquery = mysqli_query($con,"insert into cust_mer (`cust_name`,`cust_contact`,`cust_email`,`cust_debit`) values ('$cust1','$cust3','$cust2','0')");
        if($insquery){
            echo "ok";
        }else{
            echo "Some error Occured!!";
        }
    }
}