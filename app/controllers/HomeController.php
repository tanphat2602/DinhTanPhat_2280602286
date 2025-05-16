<?php

class HomeController
{
    public function index()
    {
        // Action trang chủ, có thể hiển thị thông tin giới thiệu của shop
        include 'app/views/product/home.php';  // Đảm bảo file home.php tồn tại
    }

    // Phương thức home nếu bạn muốn tách biệt
    public function home()
    {
        $this->index();
    }
}
