<?php
include "../inc/dbcon.php";

$user_id = $_GET["user_id"];

$sql = "SELECT * FROM posts WHERE user_id = '$user_id' ORDER BY post_date DESC";
$result = mysqli_query($dbcon, $sql);


if ($result->num_rows > 0) {
    $posts = array();
    
    while($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($posts, JSON_UNESCAPED_UNICODE);
} else {
    $error_data = array('error' => '게시글을 찾을 수 없습니다.');
    header('Content-Type: application/json');
    echo json_encode($error_data, JSON_UNESCAPED_UNICODE);
}
?>