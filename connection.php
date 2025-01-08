<?php
$serverName = "DESKTOP-E618NNR\SQLEXPRESS";
$database = "shop";
$uid = "";
$pass= "";

$connection = [
    "Database"=> $database,
    "Uid"=> $uid,
    "PWD"=> $pass
];

$conn = sqlsrv_connect($serverName,$connection);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}else{
    //echo"connection established";
}