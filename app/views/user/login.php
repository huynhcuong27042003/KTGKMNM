<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-semibold text-center mb-4">Đăng Nhập</h2>

    <?php if (isset($_GET["error"]) && $_GET["error"] == "invalid_credentials"): ?>
        <p class="text-red-500 text-center mb-4">Sai email hoặc mật khẩu!</p>
    <?php endif; ?>

    <form action="/rent-motobike-system/app/controllers/AuthController.php" method="post">
    <div>
            <label class="block font-semibold">Email:</label>
            <input type="email" name="email" required class="w-full p-2 border rounded" placeholder="Nhập email">
        </div>

        <div>
            <label class="block font-semibold">Mật khẩu:</label>
            <input type="password" name="password" required class="w-full p-2 border rounded" placeholder="Nhập mật khẩu">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Đăng Nhập</button>
    </form>
</div>

</body>
</html>
