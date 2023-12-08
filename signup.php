<?php
require_once("inc/db.php");

$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;
$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : null;
$user_pw = isset($_POST['user_pw']) ? $_POST['user_pw'] : null;
$user_email = isset($_POST['user_email']) ? $_POST['user_email'] : null;
$user_comment = isset($_POST['user_comment']) ? $_POST['user_comment'] : null;

if($user_id == null || $user_name == null || $user_pw == null || $user_email == null) {
    $status = [
        'code' => 403,
        'message' => 'value error'
    ];

    header('Content-Type: application/json');
    echo json_encode($status);

    exit();
}

$member_count = db_select("SELECT count(user_id) cnt FROM users WHERE user_id = ?", array($user_id));
if($member_count && $member_count[0]['cnt'] == 1) {
    $status = [
        'code' => 409,
        'message' => 'duplicate error'
    ];

    header('Content-Type: application/json');
    echo json_encode($status);

    exit();
}

$member_count = db_select("SELECT count(user_email) cnt FROM users WHERE user_email = ?", array($user_email));
if($member_count && $member_count[0]['cnt'] == 1) {
    $status = [
        'code' => 409,
        'message' => 'duplicate error'
    ];

    header('Content-Type: application/json');
    echo json_encode($status);

    exit();
}

$successful = db_insert("INSERT INTO users (user_id, user_name, user_pw, user_email, user_comment) VALUES (:user_id, :user_name, :user_pw, :user_email, :user_comment )",
    array(
        'user_id' => $user_id,
        'user_name' => $user_name,
        'user_pw' => $user_pw,
        'user_email' => $user_email,
        'user_comment' => $user_comment
    )
);

if($successful) {
    $status = [
        'code' => 201,
        'message' => 'sign up successful'
    ];
} else {
    $status = [
        'code' => 500,
        'message' => 'sign up failed'
    ];
}

header('Content-Type: application/json');
echo json_encode($status);
?>