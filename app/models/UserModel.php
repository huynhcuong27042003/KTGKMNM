<?php
require_once __DIR__ . '/../config/database.php';

class UserModel {
    private $conn;
    private $table_name = "user"; // Tên bảng trong DB

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function checkEmailExists($email) {
        $query = "SELECT email FROM User WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->rowCount() > 0; // Trả về true nếu email đã tồn tại
    }

    // Thêm người dùng mới
    public function createUser($email, $name, $phoneNumber, $dayOfBirth, $gplx, $avatar, $role, $password, $isHide, $isActive) {
        $sql = "INSERT INTO " . $this->table_name . " (email, name, phoneNumber, dayOfBirth, gplx, avatar, role, password, isHide, isActive) 
                VALUES (:email, :name, :phoneNumber, :dayOfBirth, :gplx, :avatar, :role, :password, :isHide, :isActive)";
        $stmt = $this->conn->prepare($sql);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phoneNumber", $phoneNumber);
        $stmt->bindParam(":dayOfBirth", $dayOfBirth);
        $stmt->bindParam(":gplx", $gplx);
        $stmt->bindParam(":avatar", $avatar);
        $stmt->bindParam(":role", $role);
        $stmt->bindParam(":password", $hashedPassword);
        $stmt->bindParam(":isHide", $isHide, PDO::PARAM_BOOL);
        $stmt->bindParam(":isActive", $isActive, PDO::PARAM_BOOL);

        return $stmt->execute();
    }

    public function loginUser($email, $password) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Trả về thông tin người dùng nếu đúng mật khẩu
        }
        
        return false; // Đăng nhập thất bại
    }
    
}
?>
