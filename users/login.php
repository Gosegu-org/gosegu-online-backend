<?php
require_once("../inc/db.php");

$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;
$user_pw = isset($_POST['user_pw']) ? $_POST['user_pw'] : null;

if($user_id == null || $user_pw == null) {
    $status = [
        'code' => 400,
        'message' => 'value error'
    ];

    header('Content-Type: application/json');
    echo json_encode($status);

    exit();
}

$user_data = db_select("SELECT * FROM users WHERE user_id = ?", array($user_id));

if ($user_data == null || count($user_data) == 0){
    $status = [
        'code' => 403,
        'message' => 'id error'
    ];

    header('Content-Type: application/json');
    echo json_encode($status);

    exit();
}

$is_match_password = $user_pw == $user_data[0]['user_pw'];

if($is_match_password) {
    $status = [
        'code' => 201,
        'message' => 'sign in successful'
    ];   
    
    header('Content-Type: application/json');
    echo json_encode($status);
} else {
    $status = [
        'code' => 403,
        'message' => 'password error'
    ];

    header('Content-Type: application/json');
    echo json_encode($status);
}

session_start();
$_SESSION['user_id'] = $user_data[0]['user_id'];
?>