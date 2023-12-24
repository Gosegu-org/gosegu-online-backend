<?php
/* 이전 페이지에서 값 가져오기 */
$user_id = $_POST["user_id"];
$user_name = $_POST["user_name"];
$user_pw = password_hash($_POST["user_pw"], PASSWORD_BCRYPT);
$user_email = $_POST["user_email"];
$user_comment = $_POST["user_comment"];

/*  DB 접속 */
include "../inc/dbcon.php";

/* 쿼리 작성 */
// update 테이블명 set 필드명=값, 필드명=값, ....;
if(!$user_pw){
    $sql = "UPDATE users SET user_name='$user_name', user_email='$user_email', user_comment='$user_comment' WHERE user_id='$user_id';";
} else{
    $sql = "update users set user_name='$user_name', user_pw='$user_pw',  user_email='$user_email', user_comment='$user_comment' where user_id='$user_id';";
}


/* 데이터베이스에 쿼리 전송 */
mysqli_query($dbcon, $sql);

echo "
        <script type=\"text/javascript\">
            location.href = \"/user/my_account.php\";
        </script>
    ";

/* DB(연결) 종료 */
mysqli_close($dbcon);
?>