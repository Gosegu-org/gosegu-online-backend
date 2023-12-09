<?php
include "../inc/dbcon.php";

session_start();
$user_id = $_GET["user_id"];

$sql = "SELECT * FROM users WHERE user_id='$user_id';";
$result = mysqli_query($dbcon, $sql);

$array = mysqli_fetch_array($result);

header('Content-Type: application/json');
echo json_encode($array);
?>