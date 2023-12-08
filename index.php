<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    echo "<script>location.replace('login.php');</script>";            
}

else {
    $username = $_SESSION['user_id'];
    $name = $_SESSION['user_pw'];
} 
?>
<body>
    <div class="base">
        <h2><?php echo "Hi, $username($name)";?></h2>
        <button type="button" class="btn" onclick="location.href='users/logout.php'">
            LOGOUT
        </button>
    </div>
</body>
