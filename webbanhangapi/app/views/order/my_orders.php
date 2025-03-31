<h1>Đơn hàng của tôi</h1>

<?php if (empty($orders)): ?>
    <p>Không có đơn hàng nào!</p>
<?php else: ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ngày đặt hàng</th>
                <th>Tình trạng</th>
                <th>Chi tiết</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo htmlspecialchars($order->id); ?></td>
                    <td><?php echo htmlspecialchars($order->order_date); ?></td>
                    <td><?php echo htmlspecialchars($order->status); ?></td>
                    <td><a href="/webbanhang/Order/details/<?php echo htmlspecialchars($order->id); ?>">Xem chi tiết</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>