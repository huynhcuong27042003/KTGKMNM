<?php
require_once __DIR__ . '/../models/StudySectionModel.php';

class StudySectionController {
    private $studySectionModel;

    public function __construct() {
        $this->studySectionModel = new StudySectionModel();
    }

    // Lấy danh sách tất cả học phần
    public function getAllStudySections() {
        return $this->studySectionModel->getAllStudySections();
    }

    // Lấy thông tin học phần theo mã
    public function getStudySectionById($maHP) {
        return $this->studySectionModel->getStudySectionById($maHP);
    }

    // Thêm học phần mới
    public function createStudySection($maHP, $tenHP, $soTinChi) {
        if ($this->studySectionModel->getStudySectionById($maHP)) {
            return "Mã học phần đã tồn tại!";
        }

        $success = $this->studySectionModel->createStudySection($maHP, $tenHP, $soTinChi);
        return $success ? "Thêm học phần thành công!" : "Thêm học phần thất bại!";
    }

    // Cập nhật học phần
    public function updateStudySection($maHP, $tenHP, $soTinChi) {
        if (!$this->studySectionModel->getStudySectionById($maHP)) {
            return "Không tìm thấy học phần với mã: $maHP";
        }

        $success = $this->studySectionModel->updateStudySection($maHP, $tenHP, $soTinChi);
        return $success ? "Cập nhật thành công!" : "Cập nhật thất bại!";
    }

    // Xóa học phần
    public function deleteStudySection($maHP) {
        if (!$this->studySectionModel->getStudySectionById($maHP)) {
            return "Không tìm thấy học phần với mã: $maHP";
        }

        $success = $this->studySectionModel->deleteStudySection($maHP);
        return $success ? "Xóa thành công!" : "Xóa thất bại!";
    }

    // 🆕 Đăng ký học phần
    public function registerStudySection($MaSV, $MaHP) {
        return $this->studySectionModel->registerStudySection($MaSV, $MaHP);
    }

     // 🆕 Lấy danh sách học phần đã đăng ký của sinh viên
    public function getRegisteredStudySections($MaSV) {
        return $this->studySectionModel->getRegisteredStudySections($MaSV);
    }
}
?>
