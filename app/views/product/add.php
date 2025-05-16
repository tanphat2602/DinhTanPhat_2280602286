<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
    <!-- Thêm CDN Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Thêm Google Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: #f8f9fa;
        }

        .navbar {
            background-color: #1976d2;
        }

        .navbar-brand, .nav-link {
            color: #fff !important;
        }

        .navbar-nav .nav-item .nav-link:hover {
            background-color: #1565c0;
            border-radius: 4px;
        }

        .container {
            padding: 4rem 2rem;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #111;
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
        }

        .btn-submit {
            background: #1976d2;
            color: #fff;
            border: none;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 8px;
            width: 100%;
        }

        .btn-submit:hover {
            background: #1565c0;
        }

        .form-control,
        .form-control-file {
            border-radius: 8px;
        }

        .form-text {
            font-size: 0.875rem;
            color: #6c757d;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }
    </style>
</head>

<body>
    <!-- Thanh điều hướng -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="/project1/">Shop Bán Hàng</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="/project1/Product/add">Thêm sản phẩm</a></li>
                <li class="nav-item"><a class="nav-link" href="/project1/Product/list">Danh sách sản phẩm</a></li>
                <li class="nav-item"><a class="nav-link" href="/project1/">Trang chủ</a></li>
            </ul>
        </div>
    </nav>
    
    <!-- Form thêm sản phẩm -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="page-title">Thêm sản phẩm mới</h1>
                
                <form method="POST" action="/project1/Product/add" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Nhập tên sản phẩm">
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Nhập mô tả sản phẩm"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="price">Giá (VNĐ)</label>
                        <input type="number" class="form-control" id="price" name="price" min="0" required placeholder="Nhập giá sản phẩm">
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Hình ảnh sản phẩm</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                        <small class="form-text text-muted">Chọn hình ảnh cho sản phẩm (JPG, PNG)</small>
                    </div>
                    
                    <button type="submit" class="btn-submit">Thêm sản phẩm</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Thêm CDN cho Bootstrap JS và Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyJHfXalTxVfQg2XzZZ1FmzROksNmqjX42u34Tii" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js" integrity="sha384-kY8J9fGz1fQ79xaHEpovk4VjxkQd87Rmna5xZZyA7jjHHpM7/FW9bNKwv71/tn9X" crossorigin="anonymous"></script>
    <script src
