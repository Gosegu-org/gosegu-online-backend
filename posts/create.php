<?php
include "../inc/dbcon.php";

$user_id = $_POST["user_id"];
$category_id = $_POST["category_id"];
$post_title = $_POST["post_title"];
$post_contents = $_POST["post_contents"];

// 데이터베이스에 삽입할 쿼리 작성
$sql = "INSERT INTO posts (user_id, category_id, post_title, post_contents) VALUES ('$user_id', '$category_id', '$post_title', '$post_contents')";
mysqli_query($dbcon, $sql);
?>
