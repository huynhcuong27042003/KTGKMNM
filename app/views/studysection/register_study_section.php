<?php
session_start();
require_once '../../controllers/StudySectionController.php';

if (!isset($_SESSION['MaSV'])) {
    echo "<script>alert('Bạn cần đăng nhập để đăng ký học phần!'); window.location='../auth/login.php';</script>";
    exit();
}

$MaSV = $_SESSION['MaSV'];
$MaHP = $_GET['MaHP'] ?? null;

if ($MaHP) {
    $controller = new StudySectionController();
    $message = $controller->registerStudySection($MaSV, $MaHP);
    echo "<script>alert('$message'); window.location='registered_study_sections.php';</script>";
} else {
    echo "<script>alert('Mã học phần không hợp lệ!'); window.location='studysection.php';</script>";
}
?>
