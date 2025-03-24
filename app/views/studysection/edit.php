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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $controller->updateStudySection($_POST["MaHP"], $_POST["TenHP"], $_POST["SoTinChi"]);
    echo "<script>alert('$message'); window.location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh Sửa Học Phần</title>
</head>
<body>
    <h2>Chỉnh Sửa Học Phần</h2>
    <form method="post">
        <input type="hidden" name="MaHP" value="<?= $studySection['MaHP'] ?>">
        Tên HP: <input type="text" name="TenHP" value="<?= $studySection['TenHP'] ?>" required><br>
        Số Tín Chỉ: <input type="number" name="SoTinChi" value="<?= $studySection['SoTinChi'] ?>" required><br>
        <button type="submit">Cập Nhật</button>
    </form>
</body>
</html>
