<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <div class="card border-0 shadow-lg mx-auto" style="max-width: 600px;">
        <div class="card-body text-center p-5">
            <!-- Icon thành công -->
            <div class="mb-4">
                <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
            </div>

            <!-- Tiêu đề -->
            <h1 class="fw-bold text-dark mb-3">Xác nhận đơn hàng</h1>

            <!-- Thông báo -->
            <p class="text-muted fs-5 mb-4">
                Cảm ơn bạn đã đặt hàng! Đơn hàng của bạn đã được xử lý thành công.
            </p>

            <!-- Nút hành động -->
            <a href="/webbanhang/Product/list" class="btn btn-primary btn-lg w-100 shadow-sm">
                <i class="bi bi-cart3 me-2"></i>Tiếp tục mua sắm
            </a>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 20px;
        transition: transform 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15) !important;
    }
    .btn-primary {
        background: linear-gradient(45deg, #007bff, #00b4db);
        border: none;
        padding: 12px;
    }
    .btn-primary:hover {
        background: linear-gradient(45deg, #0056b3, #0086b3);
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>