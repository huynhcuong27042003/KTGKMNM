<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Người Dùng</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-semibold text-center mb-4">Thêm Người Dùng</h2>

    <?php if (isset($_GET["success"])): ?>
        <p class="text-green-600 text-center mb-4">Người dùng đã được thêm thành công!</p>
    <?php endif; ?>

    <form action="../../controllers/AuthController.php" method="post" class="space-y-4">

        <div>
            <label class="block font-semibold">Email:</label>
            <input type="email" name="email" required 
                class="w-full p-2 border rounded <?php if (isset($error) && $error == 'email_exists') echo 'border-red-500'; ?>" 
                value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                placeholder="Nhập email của bạn">
            
            <?php if (isset($error) && $error == 'email_exists'): ?>
                <p class="text-red-500 text-sm mt-1">Email đã tồn tại, vui lòng nhập email khác.</p>
            <?php endif; ?>
        </div>

        <div>
            <label class="block font-semibold">Họ và Tên:</label>
            <input type="text" name="name" required class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-semibold">Số điện thoại:</label>
            <input type="text" name="phoneNumber" class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-semibold">Ngày sinh:</label>
            <input type="date" name="dayOfBirth" required class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-semibold">GPLX:</label>
            <input type="text" name="gplx" required class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-semibold ">Mật khẩu:</label>
            <input type="password" name="password" required class="w-full p-2 border rounded">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Thêm Người Dùng</button>
    </form>
</div>

</body>
</html>

