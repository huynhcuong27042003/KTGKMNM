<?php
require_once '../../controllers/StudentController.php';
require_once __DIR__ . '/../shares/header.php';
$studentController = new StudentController();
$message = $studentController->deleteStudent($_GET["MaSV"]);
echo "<script>alert('$message'); window.location='index.php';</script>";
?>
