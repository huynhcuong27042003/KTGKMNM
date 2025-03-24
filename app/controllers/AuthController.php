<?php
require_once '../../models/RegisterModel.php';

class AuthController {
    private $model;

    public function __construct() {
        $this->model = new RegisterModel();
    }

    // 🟢 Đăng ký sinh viên (Thêm vào SinhVien và DangKy)
    public function register($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh) {
        if ($this->model->checkStudentExists($MaSV)) {
            return "Mã sinh viên đã tồn tại!";
        }
        return $this->model->registerStudent($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh) 
            ? "Đăng ký thành công! Bạn đã được thêm vào danh sách đăng ký." 
            : "Đăng ký thất bại!";
    }

    // 🟢 Đăng nhập (Kiểm tra trong bảng DangKy)
    public function login($MaSV) {
        return $this->model->checkStudentRegistered($MaSV);
    }
}
?>
