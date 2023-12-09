<?php
include "../inc/dbcon.php";

// 데이터베이스에서 카테고리 정보를 가져오는 쿼리 작성
$sql = "SELECT category_id, category_name FROM categories";

// 쿼리 실행
$result = mysqli_query($dbcon, $sql);

// 결과를 담을 배열 초기화
$categories = array();

// 가져온 결과를 배열에 저장
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}

// JSON 형태로 응답 반환
header('Content-Type: application/json');
echo json_encode($categories);
?>
