<?php
// $idx = $_GET["idx"]

session_start();
$user_id = $_POST["user_id"];
// echo $idx;
// exit;


/*  DB 접속 */
include "../inc/dbcon.php";


/* 쿼리 작성 */
$sql = "delete from users where user_id='$user_id';";
echo $sql;
// exit;

/* 데이터베이스에 쿼리 전송 */
mysqli_query($dbcon, $sql);


/* 세션 삭제 */
unset($_SESSION["user_id"]);


/* DB(연결) 종료 */
mysqli_close($dbcon);


/* 리디렉션 */
echo "
    <script type=\"text/javascript\">
        alert(\"정상처리 되었습니다.\");
        location.href = \"/index.php\";
    </script>
";
?>