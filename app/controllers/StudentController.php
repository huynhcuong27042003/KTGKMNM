<?php
require_once __DIR__ . '/../models/StudentModel.php';

class StudentController {
    private $studentModel;

    public function __construct() {
        $this->studentModel = new StudentModel();
    }

    // Lấy danh sách tất cả sinh viên
    public function getAllStudents() {
        return $this->studentModel->getAllStudents();
    }

    // Lấy thông tin sinh viên theo MaSV
    public function getStudentById($maSV) {
        return $this->studentModel->getStudentById($maSV);
    }

    // Thêm sinh viên mới
    public function createStudent($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh) {
        if ($this->studentModel->checkStudentExists($maSV)) {
            return "Mã sinh viên đã tồn tại!";
        }

        $success = $this->studentModel->createStudent($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh);
        return $success ? "Thêm sinh viên thành công!" : "Thêm sinh viên thất bại!";
    }

    // Cập nhật thông tin sinh viên
    public function updateStudent($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh) {
        if (!$this->studentModel->checkStudentExists($maSV)) {
            return "Không tìm thấy sinh viên với mã: $maSV";
        }

        $success = $this->studentModel->updateStudent($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh);
        return $success ? "Cập nhật thông tin thành công!" : "Cập nhật thông tin thất bại!";
    }

    // Xóa sinh viên
    public function deleteStudent($maSV) {
        if (!$this->studentModel->checkStudentExists($maSV)) {
            return "Không tìm thấy sinh viên với mã: $maSV";
        }

        $success = $this->studentModel->deleteStudent($maSV);
        return $success ? "Xóa sinh viên thành công!" : "Xóa sinh viên thất bại!";
    }
}
?>
