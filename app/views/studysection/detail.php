<?php
require_once '../../controllers/StudySectionController.php';

$controller = new StudySectionController();

if (isset($_GET["MaHP"])) {
    $maHP = $_GET["MaHP"];
    $studySection = $controller->getStudySectionById($maHP);
    if (!$studySection) {
        echo "<script>alert('Học phần không tồn tại!'); window.location='index.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Mã học phần không hợp lệ!'); window.location='index.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Học Phần</title>
</head>
<body>
    <h2>Chi Tiết Học Phần</h2>
    <p><strong>Mã HP:</strong> <?= $studySection['MaHP'] ?></p>
    <p><strong>Tên HP:</strong> <?= $studySection['TenHP'] ?></p>
    <p><strong>Số Tín Chỉ:</strong> <?= $studySection['SoTinChi'] ?></p>
    <a href="index.php">⬅ Quay lại danh sách</a>
</body>
</html>

