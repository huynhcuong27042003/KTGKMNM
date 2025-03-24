<?php
require_once '../../controllers/StudentController.php';
require_once __DIR__ . '/../shares/header.php';

$studentController = new StudentController();
$student = $studentController->getStudentById($_GET["MaSV"]);
?>

<div class="container mt-4">
    <h2 class="text-center text-uppercase">Chi Tiết Sinh Viên</h2>

    <div class="card mx-auto shadow p-4" style="max-width: 500px;">
        <div class="text-center">
            <img src="/rent-motobike-system/app/public/assets/images/<?= $student['Hinh'] ?>" 
                 class="rounded-circle img-thumbnail" width="120">
        </div>

        <table class="table mt-3">
            <tr>
                <th>Mã SV:</th>
                <td><?= $student['MaSV'] ?></td>
            </tr>
            <tr>
                <th>Họ Tên:</th>
                <td><?= $student['HoTen'] ?></td>
            </tr>
            <tr>
                <th>Giới Tính:</th>
                <td><?= $student['GioiTinh'] ?></td>
            </tr>
            <tr>
                <th>Ngày Sinh:</th>
                <td><?= $student['NgaySinh'] ?></td>
            </tr>
            <tr>
                <th>Ngành:</th>
                <td><?= $student['MaNganh'] ?></td>
            </tr>
        </table>

        <div class="text-center">
            <a href="index.php" class="btn btn-secondary">⬅ Quay Lại</a>
        </div>
    </div>
</div>
