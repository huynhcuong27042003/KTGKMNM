<?php
require_once '../../controllers/StudySectionController.php';
require_once __DIR__ . '/../shares/header.php';
$controller = new StudySectionController();
$studySections = $controller->getAllStudySections();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Học Phần</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center text-uppercase">Danh Sách Học Phần</h2>


    <table class="table table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>Mã HP</th>
                <th>Tên HP</th>
                <th>Số Tín Chỉ</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php foreach ($studySections as $section): ?>
            <tr>
                <td><?= $section['MaHP'] ?></td>
                <td><?= $section['TenHP'] ?></td>
                <td><?= $section['SoTinChi'] ?></td>
                <td>
                    <a href="register_study_section.php?MaHP=<?= $section['MaHP'] ?>" class="btn btn-primary btn-sm">
                        📌 Đăng Ký
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


</body>
</html>
