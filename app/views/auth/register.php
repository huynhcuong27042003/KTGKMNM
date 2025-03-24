<?php
require_once '../../controllers/AuthController.php';

$authController = new AuthController();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $authController->register(
        $_POST["MaSV"], $_POST["HoTen"], $_POST["GioiTinh"],
        $_POST["NgaySinh"], $_POST["Hinh"], $_POST["MaNganh"]
    );
    echo "<script>alert('$message');</script>";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Ký</title>
</head>
<body>
    <h2>Đăng Ký Sinh Viên</h2>
    <form method="post">
        Mã SV: <input type="text" name="MaSV" required><br>
        Họ Tên: <input type="text" name="HoTen" required><br>
        Giới Tính:
        <select name="GioiTinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select><br>
        Ngày Sinh: <input type="date" name="NgaySinh" required><br>
        Ảnh: <input type="text" name="Hinh" placeholder="URL ảnh"><br>
        Ngành:
        <select name="MaNganh">
            <option value="CNTT">Công nghệ thông tin</option>
            <option value="QTKD">Quản trị kinh doanh</option>
        </select><br>
        <button type="submit">Đăng Ký</button>
    </form>
</body>
</html>
