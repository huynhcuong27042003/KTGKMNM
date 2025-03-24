<?php
require_once __DIR__ . '/../config/database.php';

class StudentModel {
    private $conn;
    private $table_name = "sinhvien"; // Tên bảng trong DB

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Kiểm tra sinh viên có tồn tại không
    public function checkStudentExists($maSV) {
        $query = "SELECT MaSV FROM " . $this->table_name . " WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":maSV", $maSV);
        $stmt->execute();
        return $stmt->rowCount() > 0; // Trả về true nếu sinh viên đã tồn tại
    }

    // Thêm sinh viên mới
    public function createStudent($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh) {
        $sql = "INSERT INTO " . $this->table_name . " (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                VALUES (:maSV, :hoTen, :gioiTinh, :ngaySinh, :hinh, :maNganh)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":maSV", $maSV);
        $stmt->bindParam(":hoTen", $hoTen);
        $stmt->bindParam(":gioiTinh", $gioiTinh);
        $stmt->bindParam(":ngaySinh", $ngaySinh);
        $stmt->bindParam(":hinh", $hinh);
        $stmt->bindParam(":maNganh", $maNganh);

        return $stmt->execute();
    }

    // Lấy danh sách tất cả sinh viên
    public function getAllStudents() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy thông tin sinh viên theo MaSV
    public function getStudentById($maSV) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":maSV", $maSV);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cập nhật thông tin sinh viên
    public function updateStudent($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh) {
        $sql = "UPDATE " . $this->table_name . " 
                SET HoTen = :hoTen, GioiTinh = :gioiTinh, NgaySinh = :ngaySinh, Hinh = :hinh, MaNganh = :maNganh 
                WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":maSV", $maSV);
        $stmt->bindParam(":hoTen", $hoTen);
        $stmt->bindParam(":gioiTinh", $gioiTinh);
        $stmt->bindParam(":ngaySinh", $ngaySinh);
        $stmt->bindParam(":hinh", $hinh);
        $stmt->bindParam(":maNganh", $maNganh);

        return $stmt->execute();
    }

    // Xóa sinh viên
    public function deleteStudent($maSV) {
        $sql = "DELETE FROM " . $this->table_name . " WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":maSV", $maSV);
        return $stmt->execute();
    }
}
?>
