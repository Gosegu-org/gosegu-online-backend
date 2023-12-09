<?php
include "../inc/dbcon.php";

// 사용자가 입력한 회원가입 정보
$user_id = $_POST["user_id"];
$user_name = $_POST["user_name"];
$user_pw = password_hash($_POST["user_pw"], PASSWORD_BCRYPT);
$user_email = $_POST["user_email"];
$user_comment = $_POST["user_comment"];

// 입력한 아이디가 이미 존재하는지 확인
$check_existing_user_query = "SELECT user_id FROM users WHERE user_id='$user_id'";
$check_existing_user_result = mysqli_query($dbcon, $check_existing_user_query);

if(mysqli_num_rows($check_existing_user_result) > 0){
    // 이미 존재하는 아이디인 경우
    echo "
        <script type=\"text/javascript\">
            alert(\"이미 존재하는 아이디입니다. 다른 아이디를 선택해주세요.\");
            history.back();
        </script>
    ";
    exit;
}

// 새로운 회원 정보 데이터베이스에 삽입
$insert_user_query = "INSERT INTO users (user_id, user_name, user_pw, user_email, user_comment) 
                      VALUES ('$user_id', '$user_name', '$user_pw', '$user_email', '$user_comment')";

if(mysqli_query($dbcon, $insert_user_query)){
    /* DB 연결 종료 */
    mysqli_close($dbcon);

    /* 페이지 이동 */
    echo "
        <script type=\"text/javascript\">
            alert(\"회원가입에 성공했습니다.\");
            location.href = \"/user/login.php\";
        </script>
    ";
} else {
    // 회원가입 실패 시
    echo "
        <script type=\"text/javascript\">
            alert(\"회원가입에 실패했습니다. 다시 시도해주세요.\");
            history.back();
        </script>
    ";
}
?>
