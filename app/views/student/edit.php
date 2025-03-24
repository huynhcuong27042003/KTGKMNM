<?php
require_once '../../controllers/StudentController.php';
require_once __DIR__ . '/../shares/header.php';

$studentController = new StudentController();
$student = $studentController->getStudentById($_GET["MaSV"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maSV = $_POST["MaSV"];
    $hoTen = $_POST["HoTen"];
    $gioiTinh = $_POST["GioiTinh"];
    $ngaySinh = $_POST["NgaySinh"];
    $maNganh = $_POST["MaNganh"];

    // Kiểm tra nếu có file ảnh được tải lên
    if ($_FILES["Hinh"]["name"] != "") {
        $targetDir = "../../public/uploads/";
        $fileName = basename($_FILES["Hinh"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Kiểm tra và di chuyển file ảnh vào thư mục uploads
        if (move_uploaded_file($_FILES["Hinh"]["tmp_name"], $targetFilePath)) {
            $hinh = $fileName;
        } else {
            echo "<script>alert('Lỗi tải ảnh!');</script>";
        }
    } else {
        // Giữ nguyên ảnh cũ nếu không có ảnh mới
        $hinh = $student['Hinh'];
    }

    // Cập nhật sinh viên
    $message = $studentController->updateStudent($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh);
    echo "<script>alert('$message'); window.location='index.php';</script>";
}
?>

<div class="container mt-4">
    <h2 class="text-center text-uppercase">Sửa Thông Tin Sinh Viên</h2>

    <div class="card mx-auto shadow p-4" style="max-width: 500px;">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Mã SV:</label>
                <input type="text" name="MaSV" value="<?= $student['MaSV'] ?>" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Họ Tên:</label>
                <input type="text" name="HoTen" value="<?= $student['HoTen'] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Giới Tính:</label>
                <select name="GioiTinh" class="form-select">
                    <option value="Nam" <?= $student['GioiTinh'] == "Nam" ? "selected" : "" ?>>Nam</option>
                    <option value="Nữ" <?= $student['GioiTinh'] == "Nữ" ? "selected" : "" ?>>Nữ</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Ngày Sinh:</label>
                <input type="date" name="NgaySinh" value="<?= $student['NgaySinh'] ?>" class="form-control" required>
            </div>

            <div class="mb-3 text-center">
                <label class="form-label">Ảnh Hiện Tại:</label>
                <br>
                <img src="../../public/uploads/<?= $student['Hinh'] ?>" alt="Ảnh Sinh Viên" width="100">
            </div>

            <div class="mb-3">
                <label class="form-label">Tải Ảnh Mới:</label>
                <input type="file" name="Hinh" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Ngành:</label>
                <input type="text" name="MaNganh" value="<?= $student['MaNganh'] ?>" class="form-control" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">💾 Cập Nhật</button>
                <a href="index.php" class="btn btn-secondary">⬅ Quay Lại</a>
            </div>
        </form>
    </div>
</div>
