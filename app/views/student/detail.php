<?php
require_once '../../controllers/StudentController.php';
require_once __DIR__ . '/../shares/header.php';
$studentController = new StudentController();
$student = $studentController->getStudentById($_GET["MaSV"]);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Sinh Viên</title>
</head>
<body>
    <h2>Chi Tiết Sinh Viên</h2>
    <p><strong>Mã SV:</strong> <?= $student['MaSV'] ?></p>
    <p><strong>Họ Tên:</strong> <?= $student['HoTen'] ?></p>
    <p><strong>Giới Tính:</strong> <?= $student['GioiTinh'] ?></p>
    <p><strong>Ngày Sinh:</strong> <?= $student['NgaySinh'] ?></p>
    <p><img src="<?= $student['Hinh'] ?>" width="100"></p>
    <p><strong>Ngành:</strong> <?= $student['MaNganh'] ?></p>
    <a href="index.php">⬅ Quay lại</a>
</body>
</html>
