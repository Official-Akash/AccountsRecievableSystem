<?php
// for logging out the user
error_reporting(0);
require("session.php"); // session file
$_SESSION['ars_login'] = NULL;
session_destroy();
header("location://localhost/ARS/");