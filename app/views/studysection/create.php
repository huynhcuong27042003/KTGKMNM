<?php
require_once '../../controllers/StudySectionController.php';

$controller = new StudySectionController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $controller->createStudySection($_POST["MaHP"], $_POST["TenHP"], $_POST["SoTinChi"]);
    echo "<script>alert('$message'); window.location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Học Phần</title>
</head>
<body>
    <h2>Thêm Học Phần</h2>
    <form method="post">
        Mã HP: <input type="text" name="MaHP" required><br>
        Tên HP: <input type="text" name="TenHP" required><br>
        Số Tín Chỉ: <input type="number" name="SoTinChi" required><br>
        <button type="submit">Thêm</button>
    </form>
</body>
</html>
