<?php
require_once '../../config/database.php';

class RegisterModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // 🟢 Đăng ký sinh viên vào bảng SinhVien và DangKy
    public function registerStudent($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh) {
        $this->conn->beginTransaction();

        // Thêm vào bảng SinhVien
        $stmt = $this->conn->prepare("INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt->execute([$MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh])) {
            $this->conn->rollBack();
            return false;
        }

        // Thêm vào bảng DangKy
        $stmt = $this->conn->prepare("INSERT INTO DangKy (NgayDK, MaSV) VALUES (NOW(), ?)");
        if (!$stmt->execute([$MaSV])) {
            $this->conn->rollBack();
            return false;
        }

        $this->conn->commit();
        return true;
    }

    // 🟢 Kiểm tra sinh viên đã tồn tại trong bảng SinhVien chưa
    public function checkStudentExists($MaSV) {
        $stmt = $this->conn->prepare("SELECT * FROM SinhVien WHERE MaSV = ?");
        $stmt->execute([$MaSV]);
        return $stmt->rowCount() > 0;
    }

    // 🟢 Kiểm tra sinh viên đã đăng ký trong bảng DangKy chưa
    public function checkStudentRegistered($MaSV) {
        $stmt = $this->conn->prepare("SELECT * FROM DangKy WHERE MaSV = ?");
        $stmt->execute([$MaSV]);
        return $stmt->rowCount() > 0;
    }

     // 🆕 Lấy danh sách học phần đã đăng ký của sinh viên
     public function getRegisteredStudySections($MaSV) {
        $query = "
            SELECT dk.MaDK, hp.MaHP, hp.TenHP, hp.SoTinChi
            FROM ChiTietDangKy ctdk
            JOIN DangKy dk ON ctdk.MaDK = dk.MaDK
            JOIN HocPhan hp ON ctdk.MaHP = hp.MaHP
            WHERE dk.MaSV = ?
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$MaSV]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
