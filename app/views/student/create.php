<?php
require_once '../../controllers/StudentController.php';
require_once __DIR__ . '/../shares/header.php';
$studentController = new StudentController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $studentController->createStudent(
        $_POST["MaSV"], $_POST["HoTen"], $_POST["GioiTinh"],
        $_POST["NgaySinh"], $_POST["Hinh"], $_POST["MaNganh"]
    );
    echo "<script>alert('$message'); window.location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sinh Viên</title>
</head>
<body>
    <h2>Thêm Sinh Viên</h2>
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
        Ngành: <input type="text" name="MaNganh" required><br>
        <button type="submit">Thêm</button>
    </form>
</body>
</html>
