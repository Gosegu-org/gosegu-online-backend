<?php
include "../inc/dbcon.php";

$post_id = $_POST["psot_id"];
$post_title = $_POST["post_title"];
$post_contents = $_POST["post_contents"];

$sql = "UPDATE posts SET
        SET post_title='$post_title', post_contents='$post_contents'
        WHERE post_id='$post_id'
        ";

mysqli_query($dbcon, $sql);
?>