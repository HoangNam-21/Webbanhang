<?php include 'app/views/shares/header.php'; ?>
<div class="container-fluid mt-4 px-3">
    <div class="banner text-center mb-4">
        <?php 
            $banner_path = "/webbanhang/uploads/banner.jpg"; // Đường dẫn banner chính
            if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $banner_path)) {
                $banner_path = "/images/default-banner.jpg"; // Hình ảnh mặc định nếu không có banner
            }
        ?>
        <img src="<?php echo htmlspecialchars($banner_path, ENT_QUOTES, 'UTF-8'); ?>" 
             alt="Banner cửa hàng" 
             class="img-fluid rounded shadow-sm" 
             style="max-width: 100%; height: 350px; object-fit: cover;">
    </div>

    <h1 class="text-center mb-4">Danh sách sản phẩm</h1>
    <div class="d-flex justify-content-between mb-3">
        <?php if (SessionHelper::isAdmin()): ?>
            <a href="/webbanhang/Product/add" class="btn btn-success">
                 Thêm sản phẩm mới
            </a>
        <?php endif; ?>
        <a href="/webbanhang/Product/cart" class="btn btn-warning">
             Giỏ hàng   
        </a>
    </div>

    <!-- Hiển thị kết quả tìm kiếm hoặc danh sách sản phẩm -->
    <?php if (!empty($products)): ?>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm h-100">
                        <a href="/webbanhang/Product/show/<?php echo $product->id; ?>">
                            <?php if ($product->image): ?>
                                <img src="/webbanhang/<?php echo $product->image; ?>" 
                                     alt="Product Image" 
                                     class="card-img-top" 
                                     style="width: 100%; height: 200px; object-fit: contain;">
                            <?php endif; ?>
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title text-truncate">
                                <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" 
                                   class="text-decoration-none text-dark">
                                    <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </h5>
                            <p class="fw-bold text-danger mb-0">
                                 <?php echo number_format($product->price, 0, ',', '.'); ?> VND
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- Hiển thị thông báo nếu không có sản phẩm nào -->
        <div class="alert alert-warning text-center">
            Không tìm thấy sản phẩm nào.
        </div>
    <?php endif; ?>
</div>
<?php include 'app/views/shares/footer.php'; ?>