<?php
require_once __DIR__ . '/../config/database.php';

class StudySectionModel {
    private $conn;
    private $table_name = "HocPhan"; // Tên bảng trong DB

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Lấy danh sách tất cả học phần
    public function getAllStudySections() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy thông tin học phần theo mã HP
    public function getStudySectionById($maHP) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaHP = :maHP";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":maHP", $maHP);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm học phần mới
    public function createStudySection($maHP, $tenHP, $soTinChi) {
        $query = "INSERT INTO " . $this->table_name . " (MaHP, TenHP, SoTinChi) VALUES (:maHP, :tenHP, :soTinChi)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":maHP", $maHP);
        $stmt->bindParam(":tenHP", $tenHP);
        $stmt->bindParam(":soTinChi", $soTinChi, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Cập nhật học phần
    public function updateStudySection($maHP, $tenHP, $soTinChi) {
        $query = "UPDATE " . $this->table_name . " SET TenHP = :tenHP, SoTinChi = :soTinChi WHERE MaHP = :maHP";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":maHP", $maHP);
        $stmt->bindParam(":tenHP", $tenHP);
        $stmt->bindParam(":soTinChi", $soTinChi, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Xóa học phần
    public function deleteStudySection($maHP) {
        $query = "DELETE FROM " . $this->table_name . " WHERE MaHP = :maHP";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":maHP", $maHP);
        return $stmt->execute();
    }


    // 🆕 Đăng ký học phần vào bảng ChiTietDangKy
    public function registerStudySection($MaSV, $MaHP) {
        // Lấy MaDK của sinh viên từ bảng DangKy
        $stmt = $this->conn->prepare("SELECT MaDK FROM DangKy WHERE MaSV = ?");
        $stmt->execute([$MaSV]);
        $MaDK = $stmt->fetchColumn();

        // Nếu chưa có MaDK thì tạo mới
        if (!$MaDK) {
            $stmt = $this->conn->prepare("INSERT INTO DangKy (NgayDK, MaSV) VALUES (CURDATE(), ?)");
            $stmt->execute([$MaSV]);
            $MaDK = $this->conn->lastInsertId(); // Lấy ID vừa tạo
        }

        // Kiểm tra xem đã đăng ký học phần này chưa
        $stmt = $this->conn->prepare("SELECT * FROM ChiTietDangKy WHERE MaDK = ? AND MaHP = ?");
        $stmt->execute([$MaDK, $MaHP]);
        if ($stmt->rowCount() > 0) {
            return "Bạn đã đăng ký học phần này!";
        }

        // Đăng ký học phần vào ChiTietDangKy
        $stmt = $this->conn->prepare("INSERT INTO ChiTietDangKy (MaDK, MaHP) VALUES (?, ?)");
        if ($stmt->execute([$MaDK, $MaHP])) {
            return "Đăng ký học phần thành công!";
        }
        return "Đăng ký thất bại!";
    }

    // Lấy danh sách học phần đã đăng ký của sinh viên
public function getRegisteredStudySections($MaSV) {
    $query = "SELECT HP.MaHP, HP.TenHP, HP.SoTinChi 
              FROM ChiTietDangKy CTDK
              INNER JOIN DangKy DK ON CTDK.MaDK = DK.MaDK
              INNER JOIN HocPhan HP ON CTDK.MaHP = HP.MaHP
              WHERE DK.MaSV = :MaSV";
    
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":MaSV", $MaSV);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
?>
