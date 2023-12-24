<?php
include "../inc/dbcon.php";

$sql = "SELECT * FROM posts ORDER BY RAND() LIMIT 3";
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