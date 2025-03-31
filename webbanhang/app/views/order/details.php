<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h2 class="mb-4"> Chi tiết đơn hàng #<?php echo $orderDetails[0]->order_id ?? ''; ?></h2>

    <?php if (empty($orderDetails)): ?>
        <div class="alert alert-warning">Không tìm thấy chi tiết đơn hàng</div>
    <?php else: ?>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $total = 0;
                            foreach ($orderDetails as $item): 
                                $subtotal = $item->quantity * $item->price;
                                $total += $subtotal;
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item->product_name); ?></td>
                                    <td>
                                        <?php if ($item->image): ?>
                                            <img src="/webbanhang/<?php echo $item->image; ?>" 
                                                 alt="Product Image" style="width: 50px;">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $item->quantity; ?></td>
                                    <td><?php echo number_format($item->price, 0, ',', '.'); ?> VNĐ</td>
                                    <td><?php echo number_format($subtotal, 0, ',', '.'); ?> VNĐ</td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4" class="text-end"><strong>Tổng cộng:</strong></td>
                                <td><strong><?php echo number_format($total, 0, ',', '.'); ?> VNĐ</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <a href="javascript:history.back()" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>
