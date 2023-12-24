<?php
include "../inc/dbcon.php";

$user_id = $_POST["user_id"];
$category_id = 1;
$post_title = $_POST["post_title"];
$post_contents = $_POST["post_contents"];

$sql = "INSERT INTO posts (user_id, category_id, post_title, post_contents)
        VALUES ('$user_id', '$category_id', '$post_title', '$post_contents')";

mysqli_query($dbcon, $sql);

echo "
        <script type=\"text/javascript\">
            location.href = \"/Forum/forum.php\";
        </script>
        ";
?>