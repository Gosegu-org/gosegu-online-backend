<?php
$db_host = "cloud.swdev.kr:4030";
$db_user = "gosegu";
$db_pass = "dod54321##";
$db_name = "community";

$dbcon = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$dbcon) {
    die("Connection failed: " . mysqli_connect_error());
}
?>