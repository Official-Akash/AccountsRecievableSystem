<?php
error_reporting(0);
$path = $_SERVER['DOCUMENT_ROOT'];
require($path."/ARS/assets/db/db.php");
require($path."/ARS/assets/ses/session.php");

$tf = $_POST['tf'];
$ft = $_POST['ft'];

if($id == ''){
    echo "<script>window.location.assign('../../../');</script>";
}else {
    if($tf == ''){
        echo "Error";
    }else{
        (int)$tff = trim($tf,"itcd");
        $qu = mysqli_query($con,"select cost from product where pr_id=$ft");
        $fet = mysqli_fetch_array($qu);
        $cost = $fet[0];
        $data = "$tff,$cost";
        echo $data;
    }
}