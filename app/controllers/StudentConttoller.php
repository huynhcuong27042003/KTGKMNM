<?php
require_once __DIR__ . '/../models/StudentModel.php';

class StudentController {
    public function index() {
        $studentModel = new StudentModel();
        $students = $studentModel->getAllStudents();
        
        // Truyền biến $students vào trang index.php
        include __DIR__ . '/../views/student/index.php';
    }
}
?>
