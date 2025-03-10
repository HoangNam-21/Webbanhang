<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <div class="card border-0 shadow-lg">
        <div class="card-header bg-gradient-primary text-white rounded-top">
            <h1 class="mb-0 fw-bold"><i class="bi bi-cart4 me-2"></i>Giỏ hàng</h1>
        </div>
        
        <div class="card-body p-4">
            <?php if (!empty($cart)): ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr class="bg-light">
                                <th>Sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $total = 0;
                            foreach ($cart as $id => $item): 
                                $subtotal = $item['price'] * $item['quantity'];
                                $total += $subtotal;
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <?php if ($item['image']): ?>
                                            <img src="/webbanhang/<?php echo htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>" 
                                                 alt="<?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>" 
                                                 class="img-thumbnail" 
                                                 style="max-width: 80px;">
                                        <?php else: ?>
                                            <span class="text-muted">Không có ảnh</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo number_format($item['price'], 0, ',', '.'); ?> VND</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="/webbanhang/Product/decreaseCart/<?php echo $id; ?>" 
                                               class="btn btn-outline-secondary btn-sm me-2">
                                                <i class="bi bi-dash"></i>
                                            </a>
                                            <span class="px-2"><?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></span>
                                            <a href="/webbanhang/Product/increaseCart/<?php echo $id; ?>" 
                                               class="btn btn-outline-secondary btn-sm ms-2">
                                                <i class="bi bi-plus"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td><?php echo number_format($subtotal, 0, ',', '.'); ?> VND</td>
                                    <td>
                                        <a href="/webbanhang/Product/removeFromCart/<?php echo $id; ?>" 
                                           class="text-danger" 
                                           onclick="return confirm('Xóa sản phẩm này khỏi giỏ hàng?');">
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Tổng tiền -->
                <div class="d-flex justify-content-between align-items-center mt-4 p-3 bg-light rounded">
                    <span class="fw-bold fs-5">Tổng cộng:</span>
                    <span class="fw-bold text-success fs-4">
                        <?php echo number_format($total, 0, ',', '.'); ?> VND
                    </span>
                </div>

                <!-- Nút hành động -->
                <div class="d-flex gap-3 mt-4">
                    <a href="/webbanhang/Product/list" 
                       class="btn btn-outline-secondary btn-lg flex-grow-1">
                        <i class="bi bi-arrow-left me-2"></i>Tiếp tục mua sắm
                    </a>
                    <a href="/webbanhang/Product/checkout" 
                       class="btn btn-primary btn-lg flex-grow-1 shadow-sm">
                        <i class="bi bi-credit-card me-2"></i>Thanh toán
                    </a>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="bi bi-cart-x text-muted" style="font-size: 4rem;"></i>
                    <p class="text-muted fs-4 mt-3">Giỏ hàng của bạn đang trống</p>
                    <a href="/webbanhang/Product/list" 
                       class="btn btn-primary btn-lg mt-3 shadow-sm">
                        <i class="bi bi-cart3 me-2"></i>Quay lại mua sắm
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 20px;
        transition: all 0.3s ease;
    }
    .card:hover {
        box-shadow: 0 15px 30px rgba(0,0,0,0.15) !important;
    }
    .bg-gradient-primary {
        background: linear-gradient(45deg, #007bff, #00b4db);
    }
    .table th, .table td {
        border: none;
        vertical-align: middle;
    }
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }
    .btn-primary {
        background: linear-gradient(45deg, #007bff, #00b4db);
        border: none;
    }
    .btn-primary:hover {
        background: linear-gradient(45deg, #0056b3, #0086b3);
    }
    .btn-outline-secondary {
        transition: all 0.2s;
    }
    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: white;
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>