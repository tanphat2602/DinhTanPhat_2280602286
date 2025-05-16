<?php

// Lấy URL từ query string, nếu không có thì gán giá trị mặc định là ''
$url = $_GET['url'] ?? '';

// Loại bỏ dấu '/' thừa ở cuối URL
$url = rtrim($url, '/');

// Lọc URL để đảm bảo an toàn
$url = filter_var($url, FILTER_SANITIZE_URL);

// Tách URL thành mảng theo dấu '/'
$url = explode('/', $url);

// Xác định tên controller từ phần đầu tiên của URL
$controllerName = isset($url[0]) && $url[0] != '' ? ucfirst($url[0]) . 'Controller' : 'ProductController';

// Xác định action từ phần thứ hai của URL
$action = isset($url[1]) && $url[1] != '' ? $url[1] : 'index';

// Kiểm tra nếu file controller tồn tại
$controllerFile = 'app/controllers/' . $controllerName . '.php';
if (!file_exists($controllerFile)) {
    die('Controller not found: ' . htmlspecialchars($controllerName));
}

// Require file controller nếu tồn tại
require_once $controllerFile;

// Kiểm tra nếu class controller tồn tại
if (!class_exists($controllerName)) {
    die('Class not found: ' . htmlspecialchars($controllerName));
}

// Tạo đối tượng controller
$controller = new $controllerName();

// Kiểm tra nếu action tồn tại trong controller
if (!method_exists($controller, $action)) {
    die('Action not found: ' . htmlspecialchars($action));
}

// Gọi action với các tham số còn lại từ URL
call_user_func_array([$controller, $action], array_slice($url, 2));
