<?php
session_start();

$user_id = $_POST["user_id"];
$user_pw = $_POST["user_pw"];

include "../inc/dbcon.php";

$sql = "select user_id, user_pw from users where user_id='$user_id';";

$result = mysqli_query($dbcon, $sql);

/* DB에서 결과값 가져오기 */
// mysqli_fetch_row // 필드 순서
// mysqli_fetch_array // 필드명
// mysqli_num_rows // 결과행의 개수
$num = mysqli_num_rows($result);

if(!$num){ // 아이디가 존재하지 않으면
    // 메세지 출력 후 이전 페이지로 이동
    echo "
        <script type=\"text/javascript\">
            alert(\"일치하는 아이디가 없습니다.\");
            history.back();
        </script>
    ";
    exit;
}

$array = mysqli_fetch_array($result);
$is_match = password_verify($user_pw, $array["user_pw"]);

if($is_match === false){
    echo "
        <script type=\"text/javascript\">
            alert(\"비밀번호가 일치하지 않습니다.\");
            history.back();
        </script>
    ";
exit;
}
else {
    $_SESSION["user_id"] = $user_id;
    // $_SESSION["user_pw"] = $user_pw;
    echo $_SESSION;
    /* DB 연결 종료 */
    mysqli_close($dbcon);

    /* 페이지 이동 */
    echo "
        <script type=\"text/javascript\">
            location.href = \"/index.php\";
        </script>
    ";
}

?>