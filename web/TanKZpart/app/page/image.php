<?php
include 'c:\xampp\htdocs\a\code_ass\web\app\lib\database.php';
session_start();
$user_id = $_SESSION["user_id"];

$picture=$_FILES["picture"]["name"];
$image_tmp=$_FILES["picture"]["tmp_name"];
$image_folder = "c:/xampp/htdocs/a/code_ass/web/app/image/" . $picture;


if (move_uploaded_file($image_tmp, $image_folder)) {
    $stmt = $conn->prepare("UPDATE user_profile SET picture=? WHERE user_id=?");
    $stmt->bind_param("si", $image_folder, $user_id);
    $stmt->execute();
    $stmt->close();
} else {
    echo "connect failed";
}
$conn->close();

?>

