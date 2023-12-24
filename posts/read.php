<?php
include "../inc/dbcon.php";

$post_id = $_GET["post_id"];

$sql = "SELECT category_id, post_title, post_contents, post_date FROM posts WHERE post_id = $post_id";
$result = mysqli_query($dbcon, $sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $posts = array(
        'category_id' => $row['category_id'],
        'post_title' => $row['post_title'],
        'post_contents' => $row['post_contents'],
        'post_date' => $row['post_date']
    );
    
    header('Content-Type: application/json');
    echo json_encode($posts, JSON_UNESCAPED_UNICODE);
} else {
    $error_data = array('error' => '게시글을 찾을 수 없습니다.');
    header('Content-Type: application/json');
    echo json_encode($error_data, JSON_UNESCAPED_UNICODE);
}
