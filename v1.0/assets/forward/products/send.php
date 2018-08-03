<?php
error_reporting(0);
$path = $_SERVER['DOCUMENT_ROOT'];
require($path."/ARS/assets/db/db.php");
require($path."/ARS/assets/ses/session.php");

$pro1 = $_POST['one'];
$pro2 = $_POST['two'];
$pro3 = $_POST['three'];

if($id == ''){
    echo "<script>window.location.assign('../../../');</script>";
}else {
    if ($pro1 == '' || $pro2 == '' || $pro3 == '') {
        echo "All fields are required";
    } else {
        $insquery = mysqli_query($con,"insert into product (`description`,`stock`,`cost`) values ('$pro1','$pro2','$pro3')");
        if($insquery){
            echo "ok";
        }else{
            echo "Some error Occured!!";
        }
    }
}