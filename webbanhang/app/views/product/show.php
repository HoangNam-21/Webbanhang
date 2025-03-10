<?php include 'app/views/shares/header.php'; ?>

<div class="container my-4">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h2 class="mb-0">Chi tiết sản phẩm</h2>
        </div>
        
        <div class="card-body">
            <div class="row">
                <!-- Hình ảnh sản phẩm -->
                <div class="col-md-6">
                    <?php if ($product->image): ?>
                        <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                             class="img-fluid rounded mb-3" 
                             alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>"
                             style="max-height: 400px; object-fit: cover;">
                    <?php else: ?>
                        <div class="bg-light rounded text-center p-5 mb-3" style="height: 400px;">
                            <span class="text-muted">Không có hình ảnh</span>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Thông tin sản phẩm -->
                <div class="col-md-6">
                    <h3 class="mb-3"><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></h3>
                    
                    <div class="mb-3">
                        <span class="fw-bold">Giá: </span>
                        <span class="text-success fs-4">
                            <?php echo number_format($product->price, 0, ',', '.'); ?> VND
                        </span>
                    </div>

                    <div class="mb-3">
                        <span class="fw-bold">Danh mục: </span>
                        <span><?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>

                    <div class="mb-4">
                        <span class="fw-bold">Mô tả: </span>
                        <p class="text-muted">
                            <?php echo nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')); ?>
                        </p>
                    </div>

                    <!-- Nút hành động -->
                    <div class="d-flex gap-2">
                        <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" 
                           class="btn btn-warning flex-grow-1">Sửa</a>
                        <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" 
                           class="btn btn-danger flex-grow-1"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                        <a href="/webbanhang/Product/list" 
                           class="btn btn-secondary flex-grow-1">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .card:hover {
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>