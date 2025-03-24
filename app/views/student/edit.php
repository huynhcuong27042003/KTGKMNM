<?php
require_once '../../controllers/StudentController.php';
require_once __DIR__ . '/../shares/header.php';
$studentController = new StudentController();
$student = $studentController->getStudentById($_GET["MaSV"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $studentController->updateStudent(
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
    <title>Sửa Sinh Viên</title>
</head>
<body>
    <h2>Sửa Thông Tin Sinh Viên</h2>
    <form method="post">
        Mã SV: <input type="text" name="MaSV" value="<?= $student['MaSV'] ?>" readonly><br>
        Họ Tên: <input type="text" name="HoTen" value="<?= $student['HoTen'] ?>" required><br>
        Giới Tính: 
        <select name="GioiTinh">
            <option value="Nam" <?= $student['GioiTinh'] == "Nam" ? "selected" : "" ?>>Nam</option>
            <option value="Nữ" <?= $student['GioiTinh'] == "Nữ" ? "selected" : "" ?>>Nữ</option>
        </select><br>
        Ngày Sinh: <input type="date" name="NgaySinh" value="<?= $student['NgaySinh'] ?>" required><br>
        Ảnh: <input type="text" name="Hinh" value="<?= $student['Hinh'] ?>"><br>
        Ngành: <input type="text" name="MaNganh" value="<?= $student['MaNganh'] ?>" required><br>
        <button type="submit">Cập Nhật</button>
    </form>
</body>
</html>
