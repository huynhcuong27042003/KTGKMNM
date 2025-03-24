<?php
require_once '../../controllers/StudySectionController.php';

$controller = new StudySectionController();
$studySections = $controller->getAllStudySections();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Học Phần</title>
</head>
<body>
    <h2>Danh Sách Học Phần</h2>
    <table border="1">
        <tr>
            <th>Mã HP</th>
            <th>Tên HP</th>
            <th>Số Tín Chỉ</th>
            <th>Hành Động</th>
        </tr>
        <?php foreach ($studySections as $section): ?>
        <tr>
            <td><?= $section['MaHP'] ?></td>
            <td><?= $section['TenHP'] ?></td>
            <td><?= $section['SoTinChi'] ?></td>
            <td>
                <a href="register_study_section.php?MaHP=<?= $section['MaHP'] ?>">
                    <button>📌 Đăng Ký</button>
                </a>
            </td>

        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
