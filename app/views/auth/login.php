<?php
session_start(); // Kích hoạt session
require_once '../../controllers/AuthController.php';

$authController = new AuthController();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaSV = $_POST["MaSV"];

    if ($authController->login($MaSV)) {
        $_SESSION['MaSV'] = $MaSV; // Lưu MSSV vào session
        echo "<script>alert('Đăng nhập thành công!'); window.location='../studysection/';</script>";
    } else {
        $message = "Bạn chưa đăng nhập!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>
</head>
<body>
    <h2>Đăng Nhập</h2>
    <form method="post">
        Nhập Mã Sinh Viên: <input type="text" name="MaSV" required><br>
        <button type="submit">Đăng Nhập</button>
    </form>
    <p style="color:red;"><?= $message ?></p>
</body>
</html>
