<?php
include "../inc/dbcon.php";

$sql = "SELECT user_name, user_email, user_comment FROM users";

$result = mysqli_query($dbcon, $sql);

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC); // MYSQLI_ASSOC 옵션을 사용하여 연관 배열로 가져옴

// JSON 형식으로 반환
$data = array();
foreach ($rows as $key => $row) {
    $data[$key] = array(
        'user_name' => $row['user_name'],
        'email' => $row['user_email'],
        'comment' => $row['user_comment']
    );
}

header('Content-Type: application/json');
echo json_encode($data);
?>
