<?php
error_reporting(0);
$path = $_SERVER['DOCUMENT_ROOT'];
require($path."/ARS/assets/db/db.php");
require($path."/ARS/assets/ses/session.php");

?>
<!DOCTYPE html>
<html>
<head>
    <title>ACCOUNTS | SYSTEM</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
<div class="mainbodycontainer">
<?php
if($id != '') {
    require($path . "/ARS/assets/head/header.php");
    ?>
    <div id="container">
        <?php
        require($path."/ARS/assets/forward/index.php");
        ?>
    </div>
    <?php
}else{
    ?>
    <div class="container elsecontainer">
        <div class="row">
            <div class="col-sm-4 col-xs-12"></div>
            <div class="col-sm-4 col-xs-12 mainadmin">
                <div class="container-fluid">
                    <div class="row two">
                        <h4>Welcome ADMIN.</h4>
                    </div><br/>
                    <div class="row text-danger text-center text-capitalize" id="_ad4"></div><br/>
                    <div class="row">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" id="_ad2" class="form-control" placeholder="Enter Admin name" />
                        </div>
                    </div></br>
                    <div class="row">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" id="_ad3" class="form-control" placeholder="Enter Admin Password" />
                        </div>
                    </div></br>
                    <div class="row">
                        <div class="btn btn-success btn-block" id="_ad1">Login&nbsp;<span class="glyphicon glyphicon-log-in"></span></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12"></div>
        </div>
    </div>
<?php
}
?>
</div>
</body>
</html>