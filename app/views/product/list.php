<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: #fff;
        }
        .container {
            padding: 2rem 0 4rem 0;
        }
        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #111;
            margin-bottom: 2rem;
        }
        .btn-add {
            background: #1976d2;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            padding: 10px 22px;
            font-size: 1rem;
            margin-bottom: 1.5rem;
            transition: background 0.2s;
        }
        .btn-add:hover {
            background: #125ea2;
        }
        .table {
            background: #fff;
            border-radius: 0;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 1.05rem;
        }
        .table thead th {
            border: none;
            font-weight: 600;
            font-size: 1.1rem;
            color: #222;
            background: #f7f7f7;
            padding: 18px 12px;
        }
        .table tbody td {
            border-top: 1px solid #eee;
            padding: 16px 12px;
            vertical-align: middle;
        }
        .product-image {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            object-fit: contain;
            background-color: #f9f9f9;
            border: 1px solid #eaeaea;
            padding: 5px;
        }
        .img-container {
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-action {
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 7px 18px;
            margin-right: 6px;
            transition: background 0.2s;
        }
        .btn-edit {
            background: #ffc107;
            color: #fff;
        }
        .btn-edit:hover {
            background: #e0a800;
        }
        .btn-delete {
            background: #e53935;
            color: #fff;
        }
        .btn-delete:hover {
            background: #b71c1c;
        }
        
        @media (max-width: 768px) {
            .page-title { font-size: 1.5rem; }
            .table thead { display: none; }
            .table, .table tbody, .table tr, .table td { display: block; width: 100%; }
            .table tr { margin-bottom: 1.5rem; border-bottom: 2px solid #eee; }
            .table td { padding: 10px 0; border: none; }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="/project1/">SỐP GÌ CŨNG BÁN TRỪ BÁN THÂN</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="/project1/Product/add">Thêm sản phẩm</a></li>
                <li class="nav-item"><a class="nav-link" href="/project1/Product/list">Danh sách sản phẩm</a></li>
                <li class="nav-item"><a class="nav-link" href="/project1/">Trang chủ</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="page-title">Danh sách sản phẩm</div>
        <a href="/project1/Product/add" class="btn btn-add">Thêm sản phẩm</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product->getID(); ?></td>
                        <td>
                            <div class="img-container">
                            <?php 
                                $imagePath = $product->getImage();
                                $productId = $product->getID();
                                
                                // For products 1-5, use the product_ID.jpg pattern even if image path is empty
                                if ($productId >= 1 && $productId <= 5) {
                                    $fullImagePath = "/project1/public/images/product_{$productId}.jpg";
                                } 
                                // For other products, check if they have a custom image
                                else if (!empty($imagePath)) {
                                    $fullImagePath = "/project1/public/images/{$imagePath}";
                                }
                                // Default fallback for other products without images
                                else {
                                    $fullImagePath = "/project1/public/images/product_{$productId}.jpg";
                                }
                            ?>
                                <img src="<?php echo htmlspecialchars($fullImagePath); ?>" 
                                     alt="<?php echo htmlspecialchars($product->getName()); ?>" 
                                     class="product-image">
                                <div class="no-image" style="display: none;">Không có hình ảnh</div>
                            </div>
                        </td>
                        <td style="font-weight:600; color:#222;"> <?php echo htmlspecialchars($product->getName()); ?> </td>
                        <td><?php echo htmlspecialchars($product->getDescription()); ?></td>
                        <td style="font-weight:600; color:#1976d2;"> <?php echo number_format($product->getPrice(), 0, ',', '.'); ?> VNĐ </td>
                        <td>
                            <a href="/project1/Product/edit/<?php echo $product->getID(); ?>" class="btn-action btn-edit">Sửa</a>
                            <a href="/project1/Product/delete/<?php echo $product->getID(); ?>" class="btn-action btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const images = document.querySelectorAll('.product-image');
        images.forEach(function(img) {
            img.addEventListener('error', function() {
                this.style.display = 'none';
                const noImageDiv = this.parentNode.querySelector('.no-image');
                if (noImageDiv) {
                    noImageDiv.style.display = 'flex';
                }
                console.log('Image failed to load:', this.src);
            });
        });
    });
    </script>
</body>
</html>