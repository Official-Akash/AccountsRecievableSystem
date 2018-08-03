<?php

error_reporting(0);
$path = $_SERVER['DOCUMENT_ROOT'];
require($path."/ARS/assets/db/db.php");
require($path."/ARS/assets/ses/session.php");

$one = $_POST['one'];
$two = $_POST['two'];

if($one === '' || $two === ''){
    echo "BOTH FIELDS ARE REQUIRED!";
}else{
    //db code
    $query = mysqli_query($con,"Select * from vu where user_name='$one'");
    if(($num = mysqli_num_rows($query)) > 0){
        $fetch = mysqli_fetch_array($query);
        $pass = $fetch[2];
        if(password_verify($two,$pass)){
            session_start();
            $_SESSION['ars_login'] = $fetch[0];
            echo "ok";
        }else{
            echo "Password Not matched";
        }
    }else{
        echo "User Doesn't Exist!";
    }
}
