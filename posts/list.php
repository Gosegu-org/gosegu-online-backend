<?php
// 데이터베이스 연결
include "../inc/dbcon.php";

$limit = 10; // 한 페이지에 표시할 항목 수
$page = isset($_GET['no']) ? $_GET['no'] : 1; // 현재 페이지 번호
$start = ($page - 1) * $limit;

// 사용자 정보를 가져오는 쿼리
$sql = "SELECT * FROM posts LIMIT $start, $limit";
echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // 각 사용자 정보를 출력
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
    }
} else {
    echo "0 results";
}

// 페이지 링크 생성
$sql_total = "SELECT * FROM posts";
$result_total = $conn->query($sql_total);
$total_records = $result_total->num_rows;
$total_pages = ceil($total_records / $limit);

for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href='?no=" . $i . "'>" . $i . "</a> ";
}

$conn->close();
?>
