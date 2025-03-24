<?php
require_once '../../controllers/StudySectionController.php';

$controller = new StudySectionController();

if (isset($_GET["MaHP"])) {
    $maHP = $_GET["MaHP"];
    $message = $controller->deleteStudySection($maHP);
    echo "<script>alert('$message'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Mã học phần không hợp lệ!'); window.location='index.php';</script>";
}
?>
