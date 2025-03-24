<?php
session_start();
require_once '../../controllers/StudySectionController.php';

if (!isset($_SESSION['MaSV'])) {
    echo "<script>alert('Bạn cần đăng nhập để xem danh sách học phần đã đăng ký!'); window.location='../auth/login.php';</script>";
    exit();
}

$MaSV = $_SESSION['MaSV'];
$controller = new StudySectionController();
$registeredSections = $controller->getRegisteredStudySections($MaSV);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Học Phần Đã Đăng Ký</title>
</head>
<body>
    <h2>Danh Sách Học Phần Đã Đăng Ký</h2>
    <table border="1">
        <tr>
            <th>Mã Đăng Ký</th>
            <th>Mã Học Phần</th>
            <th>Tên Học Phần</th>
            <th>Số Tín Chỉ</th>
        </tr>
        <?php foreach ($registeredSections as $section): ?>
        <tr>
            <td><?= $section['MaDK'] ?></td>
            <td><?= $section['MaHP'] ?></td>
            <td><?= $section['TenHP'] ?></td>
            <td><?= $section['SoTinChi'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="studysection.php">⬅ Quay lại danh sách học phần</a>
</body>
</html>
