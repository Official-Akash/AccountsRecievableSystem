<?php
error_reporting(0);
$path = $_SERVER['DOCUMENT_ROOT'];
require($path."/ARS/assets/db/db.php");
require($path."/ARS/assets/ses/session.php");

?>
<!DOCTYPE html>
<html>
<head>
    <title>LEDGER | SYSTEM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../css/index.css">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <script src="../../../js/jquery-3.2.1.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/main.js"></script>
</head>
<body>
    <div>
        <?php
        if($id != '') {
            require($path . "/ARS/assets/head/header.php");
            ?>
            <div id="container">
                <?php
                require($path."/ARS/assets/forward/ledger/userslist/index.php");
                ?>
            </div>
            <?php
        }else{
            echo "<script>window.location.assign('../../../');</script>";
        }
        ?>
    </div>
</body>
</html>