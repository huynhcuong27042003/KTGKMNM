<?php
require_once '../../controllers/StudentController.php';
require_once __DIR__ . '/../shares/header.php';

$studentController = new StudentController();
$students = $studentController->getAllStudents();
?>

<div class="container mt-4">
    <h2 class="text-uppercase text-center">Danh Sách Sinh Viên</h2>
    <div class="text-end mb-3">
        <a href="/KTGK/app/views/auth/register.php" class="btn btn-success">➕ Thêm Sinh Viên</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark text-center">
            <tr>
                <th>Mã SV</th>
                <th>Họ Tên</th>
                <th>Giới Tính</th>
                <th>Ngày Sinh</th>
                <th>Ảnh</th>
                <th>Ngành</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr class="align-middle text-center">
                <td><?= $student['MaSV'] ?></td>
                <td><?= $student['HoTen'] ?></td>
                <td><?= $student['GioiTinh'] ?></td>
                <td><?= $student['NgaySinh'] ?></td>
                <td>
                    <img src="/rent-motobike-system/app/public/assets/images/<?= $student['Hinh'] ?>" class="img-thumbnail" width="60">
                </td>
                <td><?= $student['MaNganh'] ?></td>
                <td>
                    <a href="detail.php?MaSV=<?= $student['MaSV'] ?>" class="btn btn-info btn-sm">👁 Xem</a>
                    <a href="edit.php?MaSV=<?= $student['MaSV'] ?>" class="btn btn-warning btn-sm">✏️ Sửa</a>
                    <a href="delete.php?MaSV=<?= $student['MaSV'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">🗑 Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
