<?php

error_reporting(0);
session_start();
// for our registered user
if($_SESSION['ars_login']){
    $id = $_SESSION['ars_login'];
}